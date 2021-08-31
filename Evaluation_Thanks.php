<?php
$Emp_ID = intval($WebMeta['emp_id']);


$SQL_Line = "SELECT * FROM employee WHERE id = '$Emp_ID' " ;
$EmployeeRow = $db->H_SelectOneRow($SQL_Line);

$CustId = $EmployeeRow['cust_id'];
$CustomerRow = $db->H_SelectOneRow("SELECT * FROM customer WHERE id = '$CustId' " );
 
$MobileErr = "";


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
        <div class="col-12 text-center mb-4 mt-3 welcomeText">
            <?php echo nl2br($ALang['evl_form_thanks_mass']); ?>
        </div>
        
        <div class="col-12 text-center mb-4 mt-3 welcomeText">
            <img src="<?php echo WEB_ROOT ?>assets/thanks.png" />
        </div>

    </div>
</div>

 
<div class="bodyborderfooter"></div>
