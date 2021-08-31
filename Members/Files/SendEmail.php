<?php
require_once 'SendDefVall.php';
if(isset($_POST['SaveData'])){
        SendEmail();
}

if($DetectMobile->isMobile() == '1') {
?>

    <div class="mobile_sms_send_mass">
        <?php echo  $PrintMassView ?>
    </div>
    <div class="col-12 mt-3 FormStyle">
        <form method="post" action="#"  id="validate-form" data-parsley-validate >
            <?php
            echo '<input type="hidden" value="'.$EmployeeRow['id'].'" name="emp_id"  />';
            $MoreS = array('Col' => "col-md-12",'Placeholder'=>"البريد الالكترونى",'required' => 'required data-parsley-type="email"' );
            $Err[] = NF_PrintInput("Text","","customer_email","0","1","req",$MoreS);
            echo '<div class="form-group col-md-12 text-center" >';
            echo '<button class="btnx btn-default_x" name="SaveData" type="submit">'.$ALang['hform_add_fsend'].'</button>';
            echo '</div>';
            ?>
        </form>
    </div>
    <div class="mt-2" >
        <a href="<?php echo $PageUrl_employees ?>" class="text-center dashbord_but">عرض الموظفين</a>
        <a href="<?php echo $MembersPathHome ?>" class="text-center dashbord_but">الرئيسية</a>
    </div>
<?php
}else{

}





$EmployeeRow = $db->H_CheckTheGet("id","id","employee","2");;

?>

<div class="container-fluid employee_container" style="display: none">
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
