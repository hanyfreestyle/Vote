<?php
require_once '../library/db-config_crm.php';
require_once './library/Members_CheckLogin.php';
require_once '../'.$AdminFolder.'/library/_Inc_Files.php';
$Members_Row  =  Members_CheckUser();
$CustId = $Members_Row['id'];
$ThisCustomerRow = $db->H_SelectOneRow("SELECT * FROM customer WHERE id = '$CustId' " );
if($ThisCustomerRow['photo_t']){
   $custImg = '<img src="'.WEBSITE_IMAGE_DIR_V.$ThisCustomerRow['photo_t'].'" class="CustLogo_img">'; 
}else{
    $custImg = '';  
}



$HomePage = 'Home';   

if($DetectMobile->isMobile() == '1') {
 $content = 'include/Inc_HomePage_mobile.php';
 $content_left = "";
}else{
 $content = 'include/Inc_HomePage_pc.php';
 $content_left = 'leftMenu/Inc_Left_empty.php';  
}



if($DetectMobile->isMobile() == '1') {
   require_once 'include/Admin_Template_mobile.php'; 
}else{
   require_once 'include/Admin_Template_Pc.php'; 
}

?>