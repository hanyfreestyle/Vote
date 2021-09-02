<?php
require_once '../include/inc_reqfile.php';
require_once '_index_config.php';
require_once '_Process.php';
require_once '_Process_Report.php';


$Members_Row  =  Members_CheckUser();
$CustMembers_Id = $Members_Row['id'];
$ConfigP = Get_Customer_Config($CustMembers_Id);

$ViewPageing = "";


if($DetectMobile->isMobile() == '1') {
    $Mobile_CenterDiv = " MobileForm_CenterDiv ";
}else{
    $ViewDivStyle = "";
    $Pc_CenterDiv = " MainTableViewList_PC ";
}


$Back_Pc = "Pc_MainDiv_Back_New";

$view = (isset($_GET['view']) && $_GET['view'] != '')?$_GET['view']:'';
switch($view) {

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #   EmployeesList
    case 'EmployeesList':
        $content =  UserPerMatianCont('Mod_List.php',"1");
        $PageTitle = $Module_H1.$AdminLangFile['employees_list'] ;
        $Pc_CenterDiv = " Report_Pc_Center";
        #$Mobile_CenterDiv = " MobileForm_CenterDiv_with_photo ";
        #$Mobile_CenterDiv = " Mobile_Report_CenterDiv ";
        break;

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #   EvaluationList
    case 'EvaluationList':
        $content =  UserPerMatianCont('Evaluation_List.php',"1");
        $PageTitle = $Module_H1." تقييم الموظفين خلال فترة" ;
        $Pc_CenterDiv = " Report_Pc_Center";
        #$Mobile_CenterDiv = " MobileForm_CenterDiv_with_photo ";
        #$Mobile_CenterDiv = " Mobile_Report_CenterDiv ";
        break;


#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #   EmployeesList
    case 'EmployeesView':
        $content =  UserPerMatianCont('EmployeesView.php',"1");
        $PageTitle = $Module_H1.$AdminLangFile['employees_list'] ;
        $Pc_CenterDiv = " Report_Pc_Center";
        break;


#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #   SurveysAdd
    case 'SelDateConfig':
        $PageType = "Add";
        $content =  UserPerMatianCont('SelDateConfig.php',"1");
        $PageTitle = $Module_H1." تحديد فترة عرض التقارير " ;
        break;



#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #
    default:
        $content =  'Mod_List.php';
        $PageTitle = $Module_H1.$AdminLangFile['mainform_emptypage'];
        $Short_Menu = '_Short_Menu.php';
}


$content_left = "../leftMenu/Inc_Left_ListPage.php";


if($DetectMobile->isMobile() == '1') {
    require_once '../include/Admin_Template_mobile.php';
}else{
    require_once '../include/Admin_Template_Pc.php';
}

?>