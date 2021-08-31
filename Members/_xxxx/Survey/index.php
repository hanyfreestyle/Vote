<?php
 
 require_once '../include/inc_reqfile.php';
 require_once 'Inc_Php/_index_config.php';
 require_once 'Inc_Php/Process.php';
 $Members_Row  =  Members_CheckUser();

 $CustMembers_Id = $Members_Row['id'];
 $ConfigP = Get_Customer_Config($CustMembers_Id);
 

 $ViewPageing = "";
 
$view = (isset($_GET['view']) && $_GET['view'] != '')?$_GET['view']:'';
switch($view) {
    

#################################################################################################################################
###################################################    
#################################################################################################################################    
        case 'SurveyList':
            $content =  UserPerMatianCont('Reports_SurveyList.php',"1");
            $ThisMenuIs_li = $ThisMenuIs.'SurveyList';
            $PageTitle = $Module_H1.$AdminLangFile['member_menu_list_survey'] ;
            $Short_Menu_Sel = 'SurveyList';
            break;
            



#################################################################################################################################
###################################################    
#################################################################################################################################    
default:
       $content =  '../include/Page_Empty.php';
       $PageTitle = $Module_H1.$AdminLangFile['mainform_emptypage'];
       $Short_Menu = '_Short_Menu.php';
   }
 
require_once $TemplatePhth;

?>