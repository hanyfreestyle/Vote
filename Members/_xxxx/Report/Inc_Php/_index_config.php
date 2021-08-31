<?php
if(!defined('WEB_ROOT')) {	exit;}
 

define('USERPERMATION',"report");
define('USERPERMATION_ADD',"report_add");
define('USERPERMATION_EDIT',"report_edit");
define('USERPERMATION_DELL',"report_dell");

define('CONFIGTABEL',"report_config");
$ThisMenuIs = strtoupper('report');

$ConfigTabel = CONFIGTABEL;
$CatTabel_Type = '0';

##############################################################################################################################################################
################################ Page H1
##############################################################################################################################################################
$Module_H1 = $AdminLangFile['report_h1']." | " ;  #********* Edit *********#

$Short_Menu = '_Short_Menu.php';

?>