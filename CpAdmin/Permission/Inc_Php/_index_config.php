<?php
if(!defined('WEB_ROOT')) {	exit;}


define('F_PATH', USERPROFILE_IMAGE_DIR); 
define('F_PATH_D',USERPROFILE_IMAGE_DIR_D);
define('F_PATH_V',USERPROFILE_IMAGE_DIR_V);


define('USERPERMATION',"admin");
define('USERPERMATION_ADD',"admin");
define('USERPERMATION_EDIT',"admin");
define('USERPERMATION_DELL',"admin");



$ThisMenuIs = strtoupper('permission');
define('CONFIGTABEL',"permission_config");
$ConfigTabel = CONFIGTABEL;


##############################################################################################################################################################
################################ Page H1
##############################################################################################################################################################
$Module_H1 = $AdminLangFile['users_h1']." | " ;  #********* Edit *********#

$Mod_Customers_Service = "0";
$Mod_Sales = "0";
$Mod_User_Follow = "0";


$Short_Menu = '_Short_Menu.php';
?>