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
    case 'Config':
        $content =  UserPerMatianCont('Inc_Php/Config.php',"1");
        $ThisMenuIs_li = $ThisMenuIs.'Config';
        $PageTitle = $Module_H1.$AdminLangFile['mainform_tap_section_settings'] ;
        $Short_Menu_Sel = 'Config';
        break;


#################################################################################################################################
###################################################    
#################################################################################################################################    
    case 'ComplaintList':
        $content =  UserPerMatianCont('Complaint_List.php',"1");
        $ThisMenuIs_li = $ThisMenuIs.'ComplaintList';
        $PageTitle = $Module_H1.$AdminLangFile['member_menu_list_complaint'] ;
        $Short_Menu_Sel = 'ComplaintList';
        $NewState = "";
        break;


    case 'ComplaintListNew':
        $content =  UserPerMatianCont('Complaint_List.php',"1");
        $ThisMenuIs_li = $ThisMenuIs.'ComplaintListNew';
        $PageTitle = $Module_H1.$AdminLangFile['member_menu_list_complaint'] ;
        $Short_Menu_Sel = 'ComplaintListNew';
        $NewState = " and view = '0' ";
        break;

    case 'ComplaintView':
        $content =  UserPerMatianCont('Complaint_View.php',"1");
        $ThisMenuIs_li = $ThisMenuIs.'ComplaintList';
        $PageTitle = $Module_H1.$AdminLangFile['member_menu_list_complaint'] ;
        $Short_Menu_Sel = 'ComplaintList';
        $NewState = "";
        break;

    case 'SendEmail':
        $content =  UserPerMatianCont('Complaint_SendEmail.php',"1");
        $ThisMenuIs_li = $ThisMenuIs.'ComplaintList';
        $PageTitle = $Module_H1.$AdminLangFile['member_menu_list_complaint'] ;
        $Short_Menu_Sel = 'ComplaintList';
        $NewState = "";
        break;





    case 'Filter':
        $content =  UserPerMatianCont('Complaint_Filter.php',"1");
        $ThisMenuIs_li = $ThisMenuIs.'Filter';
        $PageTitle = $Module_H1.$AdminLangFile['member_menu_complaint_filter'] ;
        $Short_Menu_Sel = 'Filter';
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