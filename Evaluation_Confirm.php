<?php
#print_r3($WebMeta);

$Emp_ID = intval($WebMeta['emp_id']);
$SQL_Line = "SELECT * FROM employee WHERE id = '$Emp_ID' " ;
$EmployeeRow = $db->H_SelectOneRow($SQL_Line);

$CustId = $EmployeeRow['cust_id'];
$CustomerRow = $db->H_SelectOneRow("SELECT * FROM customer WHERE id = '$CustId' " );
 
$MobileErr = "";

if(isset($_POST['ConfirmCode'])){

    $v_code_Send = intval($_POST['v_code']);
    if($v_code_Send == $WebMeta['v_code']){
        ConfirmEvaluationVote();
    }else{
        $MobileErr = "برجاء التأكد من ادخال كود التفعيل بصورة صحيحة";
    }
}

if($CustomerRow['photo_t']){
   $custImg = '<img src="'.WEBSITE_IMAGE_DIR_V.$CustomerRow['photo_t'].'" class="CustLogo_img">'; 
}else{
    $custImg = '';  
}

 


?>

<div class="container-fluid logo_container"><div class="row">
<div class="col-7 py-3 text-center LogoDiv"><img src="<?php echo $SitePhoto['photo_logo']?>" class="Logo_img"></div>
<div class="col-5 py-3 align-middle CustLogoDiv"><?php echo $custImg ?></div>
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

 
<div class="container-fluid ">
    <div class="row py-4">
        <div class="col-12 mb-4 welcomeText">
            <?php echo $ALang['evl_form_confirm_mass']; ?>
        </div>

        <div class="col-12 FormStyle">
            <form method="post" action="#"  id="validate-form" data-parsley-validate >
                <?php
                //hidden
                echo '<input type="hidden" value="'.$WebMeta['vote_key'].'" name="vote_key"  />';

                $MoreS = array('Col' => "col-md-12",'Placeholder'=> "",'required' => 'required data-parsley-type="number"' );
                $Err[] = NF_PrintInput("Numbers","","v_code","0","1","req",$MoreS);
                echo '<div class="col-md-12"><span class="MobileErr ">'.$MobileErr.'</span></div>';

                echo '<div class="form-group col-md-12 text-center" >';
                echo '<button class="btnx btn-default_x" name="ConfirmCode" type="submit">'.$ALang['hform_add_fsend'].'</button>';
                echo '</div>';


                ?>
            </form>
        </div>
    </div>
</div>

 
<div class="bodyborderfooter"></div>
