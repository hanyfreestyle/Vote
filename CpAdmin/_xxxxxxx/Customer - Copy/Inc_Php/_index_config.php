<?php
if(!defined('WEB_ROOT')) {	exit;}
$AdminConfig = checkUser();


$USER_PERMATION_List = UserPermission_2019("customer");
$USER_PERMATION_Add  = UserPermission_2019("customer_add");
$USER_PERMATION_Edit = UserPermission_2019("customer_edit") ;
$USER_PERMATION_Dell = UserPermission_2019("customer_dell");


define('CONFIGTABEL',"customer_config");
$ThisMenuIs = strtoupper('customer');

$ConfigTabel = CONFIGTABEL;
$CatTabel_Type = '0';


define('F_PATH', WEBSITE_IMAGE_DIR); 
define('F_PATH_D',WEBSITE_IMAGE_DIR_D);
define('F_PATH_V',WEBSITE_IMAGE_DIR_V);


##############################################################################################################################################################
################################ Page H1
##############################################################################################################################################################
$Module_H1 = $AdminLangFile['cust_main_h1']." | " ;  #********* Edit *********#

$Short_Menu = '_Short_Menu.php';

$GoogleCode = new GoogleAuthenticator();
?>