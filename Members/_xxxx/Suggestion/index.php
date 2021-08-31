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
    case 'SuggestionList':
        $content =  UserPerMatianCont('Suggestion_List.php',"1");
        $ThisMenuIs_li = $ThisMenuIs.'SuggestionList';
        $PageTitle = $Module_H1."عرض المقترحات " ;
        $Short_Menu_Sel = 'SuggestionList';
        $NewState = "";
        break;


    case 'SuggestionListNew':
        $content =  UserPerMatianCont('Suggestion_List.php',"1");
        $ThisMenuIs_li = $ThisMenuIs.'SuggestionListNew';
        $PageTitle = $Module_H1." عرض المقترحات الجديدة " ;
        $Short_Menu_Sel = 'SuggestionListNew';
        $NewState = " and view = '0' ";
        break;

    case 'SuggestionView':
        $content =  UserPerMatianCont('Suggestion_View.php',"1");
        $ThisMenuIs_li = $ThisMenuIs.'SuggestionView';
        $PageTitle = $Module_H1." عرض التفاصيل " ;
        $Short_Menu_Sel = 'SuggestionView';
        $NewState = "";
        break;

    case 'SendEmailXXXXXXXXXXXXXXXX':
        $content =  UserPerMatianCont('Complaint_SendEmail.php',"1");
        $ThisMenuIs_li = $ThisMenuIs.'ComplaintList';
        $PageTitle = $Module_H1.$AdminLangFile['member_menu_list_complaint'] ;
        $Short_Menu_Sel = 'ComplaintList';
        $NewState = "";
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