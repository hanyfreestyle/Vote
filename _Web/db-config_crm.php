<?php
ob_start();
date_default_timezone_set('Asia/Riyadh');

$StopErr = '0';
if($StopErr == '1'){
error_reporting(0);
}
define('H_DEMO_SITE_NAME',"ftahx");
$ThisHomePage ="";
#################################################################################################################################
###################################################    Db Connection
#################################################################################################################################
@session_start();
@$pfw_host = 'localhost';
@$pfw_user = 'frhmyqpwdc';
@$pfw_pw = 't9tmTSQeB6';
@$pfw_db = 'frhmyqpwdc';


$SiteName_SESSION = $pfw_db ;
$AdminUserKey_SESSION = $pfw_db.$pfw_user ;
$adminusername = 'adminusername'.$pfw_pw ;
$adminusergroup = 'adminusergroup'.$pfw_pw ;


$MembersSName_SESSION = "Members".$pfw_db ;
$MembersKey_SESSION = "Members".$pfw_db.$pfw_user ;

$con = mysqli_connect($pfw_host,$pfw_user, $pfw_pw ,$pfw_db );
mysqli_set_charset($con,"utf8");


#################################################################################################################################
###################################################   Google Seo
#################################################################################################################################
define('MOD_GOOGLE_SEO', "1");
define('MAX_GOOGLE_COUNT_PAGE', "70");
define('MAX_GOOGLE_COUNT_DES', "160");
define('MAX_GOOGLE_COUNT_META', "256");
define('MIN_GOOGLE_COUNT_PAGE', "35");
define('MIN_GOOGLE_COUNT_DES', "80");
define('MIN_GOOGLE_COUNT_META', "130");

define('MOBILE_REQUIRED_TYPE', ' data-parsley-minlength="10" data-parsley-maxlength="10" ' );
define('PHONE_REQUIRED_TYPE', ' data-parsley-minlength="7" ' );


#################################################################################################################################
###################################################    Admin Setting
#################################################################################################################################
define('CREATION_DATE',"2004" );

/////// UserS
define('GOOGLE_AUTH_SITE_NAME',"Diar Crm");
define('GOOGLE_AUTH',"0");
define('GOOGLE_AUTH_MESSAGE',"1");
define('GOOGLE_AUTH_TIME',"2");
define('EXPIRED_PASS_STATE',"1");
define('EXPIRED_PASS_DAYS',"30");
define('USER_TIME_OUT',"30");
define('USER_PROFILE_UPDATE_IMG',"1");

/////// Var
define('BR',"<br/>");
define('ENLANG'," En");

/////// Admin View
define('ADMINCPANELLANG',"1");
define('ADMINPANEL_LANG',"1");
define('ADMINPANEL_LANG_MODULE',"1");
define('DATATABELVIEW',"1");
define('FREESTYLE4U_EDIT',"1");
define('PRELOADER',"0");
define('ADMIN_ADD_EN_FILDE',"0");

$ViewAdminTopMenu = '1';

#################################################################################################################################
###################################################    BACK UP Setting
#################################################################################################################################
define('DROPBOX_BACK_UP',"1");
define('IMAGES_BACK_UP',"0");


#################################################################################################################################
###################################################    Admin Paths
#################################################################################################################################
define('LPDIRFOLDER',"lp/");
define('CONFIG_LIBRARY_F',"library");
define('ADMIN_LIBRARY_F',"library");
define('CONFIG_FILE_NAME',"db-config_crm.php");

$thisFile = str_replace('\\', '/', __FILE__);
$docRoot = $_SERVER['DOCUMENT_ROOT'];
$webRoot  = str_replace(array($docRoot, CONFIG_LIBRARY_F.'/'.CONFIG_FILE_NAME), '', $thisFile);
if(trim($webRoot)==''){
    $webRoot = '\\' ;
};
$srvRoot  = str_replace(CONFIG_LIBRARY_F.'/'.CONFIG_FILE_NAME, '', $thisFile);
define('INCLUDE_CHECK',true);
define('WEB_ROOT', $webRoot);
define('SRV_ROOT', $srvRoot);
define('LANGFILEPATH', SRV_ROOT);





$actual_link = 'http://'.$_SERVER['HTTP_HOST'].WEB_ROOT.'Evaluation/';
define('EVALUATION_URL', $actual_link);
 
$actual_link = 'http://'.$_SERVER['HTTP_HOST'].WEB_ROOT.'ComplaintV/';
define('COMPLAINT_VALIDATION_URL', $actual_link);
 

$actual_link = 'http://'.$_SERVER['HTTP_HOST'].WEB_ROOT.'Receiving/';
define('COMPLAINT_RECEIVING_URL', $actual_link);
 
 
/////// Phats
$AdminFolder = "CpAdmin/";
$AdminPath = WEB_ROOT.$AdminFolder."include/";
$AdminPathHome = WEB_ROOT.$AdminFolder;
$TemplatePhth = "../include/Admin_Template.php" ; 
$CatFolderPath = '../'.ADMIN_LIBRARY_F.'/Inc_Cat/';
$Mydir = "rtl";
 
$MembersFolder = "Members/"; 
$MembersPathHome = WEB_ROOT.$MembersFolder; 


//// Admin Lang Varibal
define('ADMIN_LANG_FILEPATH', $AdminFolder.ADMIN_LIBRARY_F.'/LangFile/' );
define('AR_FILE_NAME', "Lang_Admin_Ar.php" );
define('EN_FILE_NAME', "Lang_Admin_En.php" );


//// Web Lang Varibal New_Lang
define('WEB_LANG_FILEPATH', ADMIN_LIBRARY_F.'/' );
define('WEB_AR_FILE_NAME', "New_Lang_Ar.php" );
define('WEB_EN_FILE_NAME', "New_Lang_En.php" );


//// Photo Paths
require_once 'Inc_Photo_Path_Crm.php';
$AdminNoPhoto = $AdminPath."img/NoPhoto.jpg";
$NoPhotoNo = "images/NoPhotoB.JPG";


#################################################################################################################################
###################################################    Admin Modules
#################################################################################################################################
$AdminGroup['config'] = '1';
$AdminGroup['admin_menu'] = '1';
$AdminGroup['admin_lang'] = '1';
$AdminGroup['permission'] = '1';  
$AdminGroup['userprofile'] = '1'; 
$AdminGroup['managedate'] = '1';

$AdminGroup['customer'] = '1';


/*

$AdminGroup['teamleader'] = '1';
$AdminGroup['custservleader'] = '1';
$AdminGroup['subercustserv'] = '1';


$AdminGroup['custserv'] = '1';
$AdminGroup['report'] = '1';
$AdminGroup['sendsms'] = '1';



/*
$AdminGroup['web_lang'] = '1x';
$AdminGroup['leads'] = '1X';
$AdminGroup['lppage'] = '1';

$AdminGroup['sendsms'] = '1';
$AdminGroup['leads'] = '1';
$AdminGroup['project'] = '1';
$AdminGroup['contract'] = '1';
$AdminGroup['hotline'] = '1';
$AdminGroup['salesdep'] = '1';
$AdminGroup['closedticket'] = '1';
*/

#################################################################################################################################
###################################################   Mobile_Detect
#################################################################################################################################
require_once 'License.php'; 
require_once 'Mobile_Detect.php';
$DetectMobile = new Mobile_Detect;
 
$TableView = array('Date'=> "1",'CustName'=> "0",'CustMobile'=> "0",'Complaint'=> "0",'City'=> "1",'Area'=> "0");

?>