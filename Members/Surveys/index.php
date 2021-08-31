<?php
require_once '../include/inc_reqfile.php';
require_once '_index_config.php';
require_once '_Process.php';


$Members_Row  =  Members_CheckUser();
$CustMembers_Id = $Members_Row['id'];
$ConfigP = Get_Customer_Config($CustMembers_Id);


if($DetectMobile->isMobile() == '1') {
    $Mobile_CenterDiv = " MobileForm_CenterDiv ";
}else{
    $ViewDivStyle = "";
    $Pc_CenterDiv = " MainTableViewList_PC ";
}

$ViewPageing = "";

$view = (isset($_GET['view']) && $_GET['view'] != '')?$_GET['view']:'';
switch($view) {


#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #   SurveysAdd
    case 'SurveysAdd':
        $PageType = "Add";
        $content =  UserPerMatianCont('Mod_Add.php',"1");
        $PageTitle = $Module_H1.$AdminLangFile['surveys_add'] ;

        break;

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #    SurveysEdit
    case 'SurveysEdit':
        $PageType = "Edit";
        $content =  UserPerMatianCont('Mod_Add.php',"1");
        $PageTitle = $Module_H1.$AdminLangFile['surveys_edit'] ;
        break;


#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #   SurveysList
    case 'SurveysList':
        $content =  UserPerMatianCont('Mod_List.php',"1");
        $PageTitle = $Module_H1.$AdminLangFile['surveys_list'] ;
        break;



#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #    SurveysDelete
    case 'SurveysDelete':
        $content =  UserPerMatianCont('Mod_Delete.php',"1");
        $PageTitle = $Module_H1.$AdminLangFile['surveys_delete_survey'] ;
        break;


#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #    SurveysSort
    case 'SurveysSort':
        $content =  UserPerMatianCont('Mod_Sort.php',"1");
        $PageTitle = $Module_H1.$AdminLangFile['surveys_sort_surveys'] ;
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