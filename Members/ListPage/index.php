<?php
require_once '../include/inc_reqfile.php';
$view = (isset($_GET['view']) && $_GET['view'] != '')?$_GET['view']:'';

if($DetectMobile->isMobile() == '1') {
    $ViewDivStyle = "PageListMobile";
}else{
    $ViewDivStyle = "PageListPc";
}

switch($view) {


#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #   SurveysList
    case 'SurveysList':
        $content =  UserPerMatianCont('SurveysList.php',"1");
        $PageTitle = "" ;
        break;


    case 'EmployeesList':
        $content =  UserPerMatianCont('EmployeesList.php',"1");
        $PageTitle = "" ;
        break;

    case 'ReportList':
        $content =  UserPerMatianCont('ReportList.php',"1");
        $PageTitle = "" ;
        break;

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #
    default:
        $content =  UserPerMatianCont('SurveysList.php',"1");
        $PageTitle = "";
       
}


$content_left = "../leftMenu/Inc_Left_ListPage.php";
 


#require_once $TemplatePhth;

 
if($DetectMobile->isMobile() == '1') {
   require_once '../include/Admin_Template_mobile.php'; 
}else{
   require_once '../include/Admin_Template_Pc.php'; 
}
?>