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




define('CONFIGTABEL',"report_config");

$ThisMenuIs = strtoupper('Surveys');

$ConfigTabel = CONFIGTABEL;
$CatTabel_Type = '0';

##############################################################################################################################################################
################################ Page H1
##############################################################################################################################################################
$Module_H1 = $AdminLangFile['surveys_h1']." | " ;  #********* Edit *********#

$Short_Menu = '_Short_Menu.php';

?>