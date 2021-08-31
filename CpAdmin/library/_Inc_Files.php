<?php   
if(!defined('WEB_ROOT')) {	exit;}
 
    if(isset($_SESSION['adminusername'.$pfw_db])){
        $ThisCountUserID = $_SESSION['adminusername'.$pfw_db] ;
        $sql = "SELECT * FROM tbl_user  where user_name = '$ThisCountUserID'";
        $result = mysqli_query($con,$sql);
        $RowUsreInfo = mysqli_fetch_array($result);
    
           if($RowUsreInfo['lang'] == '2'){
           define('ADMIN_WEB_LANG', "En" ); 
           }else{
           define('ADMIN_WEB_LANG', "Ar" ); 
           }  
    }else{
    define('ADMIN_WEB_LANG', "Ar" );     
    }
    require_once  'LangFile/Lang_Admin_'.ADMIN_WEB_LANG.'.php';  
    
    
    $ALang = $AdminLangFile ;
    require_once '_Inc_Files_Var.php';   
    require_once '_Inc_Files_FType.php'; 
 
    /** Class */

    require_once 'Class/Class_DB.php';
    require_once 'Class/Class_Upload.php';
    require_once 'Class/Class_FormValidator_2.php';
    require_once 'Class/Class_DownLoadFile.php';
    require_once 'Class/GoogleAuthenticator.php';
   
    /*
    require_once 'Class/SMTP_Phpmailer.php';
    require_once 'Class/class.smtp.php';
    */
    
    #require_once 'Class/PHPMailer/PHPMailerAutoload.php';

    

    $db = new DB($pfw_host,$pfw_user,$pfw_pw,$pfw_db);
     
    /** Form */
    require_once 'Form/FormTools.php';
    require_once 'Form/NewForm_2018.php';
    require_once 'Form/Form_Filter.php';
    require_once 'Form/UpLoadFile.php';
   
 
 
    
    require_once 'Tools/Php_Datetime.php';
    require_once 'Tools/Php_Table_Function.php';
    require_once 'Tools/Php_Array_Functions.php';
    require_once 'Tools/Php_LetterFunction.php';
 
    require_once 'Tools/Module_Admin.php';
    require_once 'Tools/Module_Chart.php';
   
 
    require_once 'Tools/Module_Users.php';
    require_once 'Tools/Module_Permission.php';
    
    
    //require_once 'Tools/Module_Customer_Etman.php';
    require_once 'Tools/Module_Customer_JSR.php';
    require_once 'Tools/Module_Customer_JSR_Report.php';
 
     
 

    define('ADMINPRINT_S',"0");
    $UnsetAllSession = "cat_id,youtube";
 

    if(!isset($_POST['B1'])){
    UnsetAllSession($UnsetAllSession);
    }
    if(ADMIN_WEB_LANG == 'En'){$NamePrint = 'name_en' ;  }else{ $NamePrint = 'name' ;}	
   

?>