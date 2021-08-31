<?php

$Emp_ID = intval($WebMeta['id']);	
$SQL_Line = "SELECT * FROM employee WHERE id = '$Emp_ID' " ;
$EmployeeRow = $db->H_SelectOneRow($SQL_Line);

$CustId = $EmployeeRow['cust_id'];
$CustomerRow = $db->H_SelectOneRow("SELECT * FROM customer WHERE id = '$CustId' " );
 
$MobileErr = "";

if(isset($_POST['SaveData'])){

    $PhoneNumber = Clean_Mypost($_POST['cust_mobile']) ;
    $PhoneValidate =  $PhoneNumber[0].$PhoneNumber[1];

    if($PhoneValidate == '05'){
        SaveVote();
    }else{
        $MobileErr = $ALang['hform_add_mobileerr'];
    }
   # Redirect_Page_2(WEB_ROOT."EvaluationConfirm");
} 


if($CustomerRow['photo_t']){
   $custImg = '<img src="'.WEBSITE_IMAGE_DIR_V.$CustomerRow['photo_t'].'" class="CustLogo_img">'; 
}else{
    $custImg = '';  
}

 


?>

<div class="container-fluid logo_container"><div class="row">
<div class="col-7 py-3 LogoDiv"><img src="<?php echo $SitePhoto['photo_logo']?>" class="Logo_img"></div>

<div class="col-5 py-3 align-middle CustLogoDiv">

    <?php echo $custImg ?>

</div>
</div></div>

<div class="container-fluid afterLogo"></div>


<div class="container-fluid employee_container">
    <div class="row">
        <div class="col-7 py-4">
            <div class="emp_info pr-2 mb-2"><?php echo $ALang['evl_form_emp_name'] ?>  : <span><?php echo $EmployeeRow['name'] ?></span></div>
            <div class="emp_info pr-2 mb-2"><?php echo $ALang['evl_form_emp_jop'] ?>  : <span><?php echo $EmployeeRow['jop'] ?></span></div>
            <div class="emp_info pr-2 mb-2"><?php echo $ALang['evl_form_emp_mobile'] ?>  : <span class="MobileNum"><?php echo ChangeToArUnmber($EmployeeRow['mobile']) ?></span></div>
        </div>
        <div class="col-5 py-3 employeePhotoDiv">
            <img src="<?php echo WEBSITE_IMAGE_DIR_V.$EmployeeRow['photo_t'] ?>" class="employee_photo">
        </div>
    </div>
</div>


<div class="container-fluid bodyborder">
    <div class="row py-4">
        <div class="col-12 mb-4 welcomeText">
            <?php echo $ALang['evl_form_welcome_text']; ?>
        </div>

        <div class="col-12 FormStyle">
            <form method="post" action="#"  id="validate-form" data-parsley-validate >
                <?php
                echo '<input type="hidden" value="'.$CustId.'" name="cust_id" id="Cust_id" />';
                echo '<input type="hidden" value="'.$CustomerRow['name_m'].'" name="cust_url" id="cust_url" />';

                echo '<div class="form-group col-md-12" ><span class="NameMass">'.$ALang['evl_form_fname_mass'].'</span></div>';
                $MoreS = array('Col' => "col-md-12",'Placeholder'=> $ALang['evl_form_add_fname'],'required' => '');
                $Err[] = NF_PrintInput("Text","","cust_name","0","1","optin",$MoreS);

                $MoreS = array('Col' => "col-md-12",'Placeholder'=> $ALang['evl_form_add_fmobile'],'required' => 'required data-parsley-type="number" '.MOBILE_REQUIRED_TYPE );
                $Err[] = NF_PrintInput("Numbers","","cust_mobile","0","1","req",$MoreS);
                echo '<div class="col-md-12"><span class="MobileErr ">'.$MobileErr.'</span></div>';


   
            $SqlLineSurvey = "select * from survey where state = '1' and  cust_id = '$CustId' order by postion";
            $already = $db->H_Total_Count($SqlLineSurvey);
            if ($already > 0){
                $Name = $db->SelArr($SqlLineSurvey);
                for($i = 0; $i < count($Name); $i++) {
                    $ThisId = $Name[$i]['id'];
                    if(isset($_POST['evaluation_id'.$ThisId])){
                        if($_POST['evaluation_id'.$ThisId] == '0'){
                            $selThis_0 = " selected ";
                        }else{
                            $selThis_0 = " ";
                        }
                        if($_POST['evaluation_id'.$ThisId] == '1'){
                            $selThis_1 = " selected ";
                        }else{
                            $selThis_1 = " ";
                        }
                    }else{
                        $selThis = " selected ";
                    }
                    echo '<div class="col-md-12 col-sm-12 col-xs-12 form-group DirRight">';
                    echo '<select name="evaluation_id'.$ThisId.'" id="evaluation_id'.$ThisId.'" class="input-md chosen-select_2" required="">';
                    echo ' <option value="">'.$Name[$i]['name'].'</option>';
                    echo ' <option value="1" '.$selThis_1.' >'.$ALang['evl_form_yes'].'</option>';
                    echo ' <option value="0" '.$selThis_0.'>'.$ALang['evl_form_no'].'</option>';
                    echo '</select>';
                    echo '</div>';
                }
            }


                echo '<div class="form-group col-md-12 text-center" >';
                echo '<button class="btnx btn-default_x" name="SaveData" type="submit">'.$ALang['hform_add_fsend'].'</button>';
                echo '</div>';


                ?>
            </form>
        </div>
    </div>
</div>

 

 