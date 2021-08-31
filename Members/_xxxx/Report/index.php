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
        case 'General':
            $content =  UserPerMatianCont('Reports_General.php',"1");
            $ThisMenuIs_li = $ThisMenuIs.'General';
            $PageTitle = $Module_H1.$AdminLangFile['member_general_report'] ;
            $Short_Menu_Sel = 'General';
            break;
            
        case 'Monthly':
            $content =  UserPerMatianCont('Reports_Monthly.php',"1");
            $ThisMenuIs_li = $ThisMenuIs.'Monthly';
            $PageTitle = $Module_H1.$AdminLangFile['member_monthly_report'] ;
            $Short_Menu_Sel = 'Monthly';
            break;
                        
        case 'Annual':
            $content =  UserPerMatianCont('Reports_Annual.php',"1");
            $ThisMenuIs_li = $ThisMenuIs.'Annual';
            $PageTitle = $Module_H1.$AdminLangFile['member_annual_report'] ;
            $Short_Menu_Sel = 'Annual';
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