<?php
$EmployeeRow = $db->H_CheckTheGet("id","id","employee","2");;

$Emp_ID ="";
/*
$SQL_Line = "SELECT * FROM employee WHERE id = '$Emp_ID' " ;
$EmployeeRow = $db->H_SelectOneRow($SQL_Line);
*/
?>

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
