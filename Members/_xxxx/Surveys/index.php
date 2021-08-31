<?php
require_once '../include/inc_reqfile.php';
require_once '_index_config.php';
require_once '_Process.php';


$Members_Row  =  Members_CheckUser();
$CustMembers_Id = $Members_Row['id'];
$ConfigP = Get_Customer_Config($CustMembers_Id);




$ViewPageing = "";

$view = (isset($_GET['view']) && $_GET['view'] != '')?$_GET['view']:'';
switch($view) {


#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #   SurveysList
    case 'SurveysList':
        $content =  UserPerMatianCont('Mod_List.php',"1");
        $PageTitle = $Module_H1.$AdminLangFile['surveys_list'] ;
        break;

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #    SurveysSort
    case 'SurveysSort':
        $content =  UserPerMatianCont('Mod_Sort.php',"1");
        $PageTitle = $Module_H1.$AdminLangFile['surveys_sort_surveys'] ;
        break;

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #   SurveysAdd
    case 'SurveysAdd':
        $content =  UserPerMatianCont('Mod_Add.php',"1");
        $PageTitle = $Module_H1.$AdminLangFile['surveys_add'] ;
        break;
        
#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #    SurveysEdit
    case 'SurveysEdit':
        $content =  UserPerMatianCont('Mod_Edit.php',"1");
        $PageTitle = $Module_H1.$AdminLangFile['surveys_edit'] ;
        break;

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #    SurveysDelete
    case 'SurveysDelete':
        $content =  UserPerMatianCont('Mod_Delete.php',"1");
        $PageTitle = $Module_H1.$AdminLangFile['surveys_delete_survey'] ;
        break;


#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #    AddNewAnswers
    case 'AddNewAnswers':
        $content =  UserPerMatianCont('Answer_Add.php',"1");
        $PageTitle = $Module_H1.$AdminLangFile['surveys_sort_answer'] ;
        break;

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #    EditAnswer
    case 'EditAnswer':
        $content =  UserPerMatianCont('Answer_Edit.php',"1");
        $PageTitle = $Module_H1.$AdminLangFile['surveys_edit_answer'] ;
        break;

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #    SortAnswer
    case 'SortAnswer':
        $content =  UserPerMatianCont('Answer_Sort.php',"1");
        $PageTitle = $Module_H1.$AdminLangFile['surveys_add_new_answer'] ;
        break;

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #    DeleteAnswer
    case 'DeleteAnswer':
        $content =  UserPerMatianCont('Answer_Delete.php',"1");
        $PageTitle = $Module_H1.$AdminLangFile['surveys_delete_answer'] ;
        break;







#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #
    default:
        $content =  '../include/Page_Empty.php';
        $PageTitle = $Module_H1.$AdminLangFile['mainform_emptypage'];
        $Short_Menu = '_Short_Menu.php';
}


require_once $TemplatePhth;

?>