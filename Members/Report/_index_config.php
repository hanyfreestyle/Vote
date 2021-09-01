<?php
if(!defined('WEB_ROOT')) {	exit;}

define('USERPERMATION',"report");
define('USERPERMATION_ADD',"1");
define('USERPERMATION_EDIT',"1");
define('USERPERMATION_DELL',"1");

$USER_PERMATION_List = USERPERMATION;
$USER_PERMATION_Add  = USERPERMATION_ADD;
$USER_PERMATION_Edit = USERPERMATION_EDIT;
$USER_PERMATION_Dell = USERPERMATION_DELL;


define('F_PATH', WEBSITE_IMAGE_DIR); 
define('F_PATH_D',WEBSITE_IMAGE_DIR_D);
define('F_PATH_V',WEBSITE_IMAGE_DIR_V);



define('CONFIGTABEL',"report_config");

$ThisMenuIs = strtoupper('Employees');

$ConfigTabel = CONFIGTABEL;
$CatTabel_Type = '0';

##############################################################################################################################################################
################################ Page H1
##############################################################################################################################################################
$Module_H1 = "  ادارة التقارير "." | " ;  #********* Edit *********#

$Short_Menu = '_Short_Menu.php';

$GoogleCode = new GoogleAuthenticator();
$All_City_Arr = $db->SelArr("SELECT * FROM sa_cities");

?>