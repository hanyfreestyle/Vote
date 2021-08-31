<?php
 
 require_once '../include/inc_reqfile.php';
 require_once 'Inc_Php/_index_config.php';
 $ConfigP = GetCatConfig($ConfigTabel);

 require_once 'Inc_Php/Persent.php';
 require_once 'Inc_Php/Process.php';
 require_once 'Inc_Php/Process_2.php';

 


 
 
if($USER_PERMATION_List == '1' ) {
$view = (isset($_GET['view']) && $_GET['view'] != '')?$_GET['view']:'';
switch($view) {


#################################################################################################################################
###################################################    Config
#################################################################################################################################
        case 'Config':
            $content =  UserPerMatianCont('Inc_Php/Config.php',$USER_PERMATION_Edit);
            $ThisMenuIs_li = $ThisMenuIs.'Config';
            $PageTitle = $Module_H1.$AdminLangFile['mainform_tap_section_settings'] ;
            $Short_Menu_Sel = 'Config';
            break;
            
#################################################################################################################################
################################################### AddCustomer
#################################################################################################################################
        case 'AddCustomer':
            $content =  UserPerMatianCont('Customer_Add.php',$USER_PERMATION_Add);
            $ThisMenuIs_li = $ThisMenuIs.'AddCustomer';
            $PageTitle = $Module_H1.$ALang['cust_but_add'] ;
            $Short_Menu_Sel = 'AddCustomer';
            $PageType = "Add";
            break;
        case 'EditCustomer':
            $content =   UserPerMatianCont('Customer_Add.php',$USER_PERMATION_Edit);
            $ThisMenuIs_li = $ThisMenuIs.'Edit';
            $PageTitle = $Module_H1.$AdminLangFile['cust_but_edit'] ;
            $Short_Menu_Sel = 'Edit';
            $PageType = "Edit";
            $PopUpPageS = '1';
            $PopUpPage_Name = "Customer_Add_More.php";
            $DirURL = "EditCustomer";
            break;

        case 'BranchManage':
            $content =   UserPerMatianCont('Customer_Branch_Manage.php',$USER_PERMATION_Edit);
            $ThisMenuIs_li = $ThisMenuIs.'Edit';
            $PageTitle = $Module_H1.$AdminLangFile['cust_manage_branch'] ;
            $Short_Menu_Sel = 'Edit';
            break;


        case 'BranchEdit':
            $content =   UserPerMatianCont('Customer_Branch_Edit.php',$USER_PERMATION_Edit);
            $ThisMenuIs_li = $ThisMenuIs.'Edit';
            $PageTitle = $Module_H1.$AdminLangFile['cust_manage_branch'] ;
            $Short_Menu_Sel = 'Edit';
            break;
            
            
        case 'BranchDell':
            $content =   UserPerMatianCont('Customer_Branch_Dell.php',$USER_PERMATION_Dell);
            $ThisMenuIs_li = $ThisMenuIs.'Edit';
            $PageTitle = $Module_H1.$AdminLangFile['cust_manage_branch'] ;
            $Short_Menu_Sel = 'Edit';
            break;
                                
        case 'CustomerQR':
            $content =   UserPerMatianCont('Customer_Branch_QR.php',$USER_PERMATION_List);
            $ThisMenuIs_li = $ThisMenuIs.'Edit';
            $PageTitle = $Module_H1.$AdminLangFile['cust_manage_branch'] ;
            $Short_Menu_Sel = 'Edit';
            break;
                                                           
                  
                   
 
      

#################################################################################################################################
###################################################    ListCustomer
#################################################################################################################################
        case 'ListCustomer':
            $content =  UserPerMatianCont('Customer_List.php',$USER_PERMATION_List);
            $ThisMenuIs_li = $ThisMenuIs.'ListCustomer';
            $PageTitle = $Module_H1.$ALang['cust_list_but']  ;
            $Short_Menu_Sel = 'ListCustomer';
            break;    
            
         case 'Profile':
            $content =  UserPerMatianCont('Customer_Profile.php',$USER_PERMATION_List);
            $ThisMenuIs_li = $ThisMenuIs.'List';
            $PageTitle = $Module_H1.$AdminLangFile['cust_profile_h1'] ;
            $Short_Menu_Sel = 'ListCustomer';
            $PageType = "Profile";
            $PopUpPageS = '1';
            $PopUpPage_Name = "Customer_Add_More.php";
            $DirURL = "Profile";
            break;
    
    
    
#################################################################################################################################
###################################################    
#################################################################################################################################

        case 'SurveyList':
            $content =  UserPerMatianCont('Survey_List.php',$USER_PERMATION_List);
            $ThisMenuIs_li = $ThisMenuIs.'SurveyList';
            $PageTitle = $Module_H1." عرض "  ;
            $Short_Menu_Sel = 'SurveyList';
            break;  

        case 'SurveyAdd':
            $content =  UserPerMatianCont('Survey_Add.php',$USER_PERMATION_Add);
            $ThisMenuIs_li = $ThisMenuIs.'SurveyAdd';
            $PageTitle = $Module_H1." اضافة "  ;
            $Short_Menu_Sel = 'SurveyAdd';
            break;  
            
        case 'SurveySort':
            $content =  UserPerMatianCont('Survey_Sort.php',$USER_PERMATION_Edit);
            $ThisMenuIs_li = $ThisMenuIs.'SurveyAdd';
            $PageTitle = $Module_H1." ترتيب المحتوى "  ;
            $Short_Menu_Sel = 'SurveyAdd';
            break;  
                                    
        case 'SurveyListSort':
            $content =  UserPerMatianCont('Survey_List_Sort.php',$USER_PERMATION_Edit);
            $ThisMenuIs_li = $ThisMenuIs.'SurveyAdd';
            $PageTitle = $Module_H1." ترتيب المحتوى "  ;
            $Short_Menu_Sel = 'SurveyAdd';
            break;    

        case 'EditSurvey':
            $content =  UserPerMatianCont('Survey_Edit.php',$USER_PERMATION_Edit);
            $ThisMenuIs_li = $ThisMenuIs.'EditSurvey';
            $PageTitle = $Module_H1." تعديل "  ;
            $Short_Menu_Sel = 'EditSurvey';
            break;   
                                    
        case 'SurveyListEdit':
            $content =  UserPerMatianCont('SurveyList_Edit.php',$USER_PERMATION_Edit);
            $ThisMenuIs_li = $ThisMenuIs.'SurveyListEdit';
            $PageTitle = $Module_H1." تعديل "  ;
            $Short_Menu_Sel = 'SurveyListEdit';
            break;   
                                    
        case 'AddNewSurveyList':
            $content =  UserPerMatianCont('SurveyList_Add.php',$USER_PERMATION_Add);
            $ThisMenuIs_li = $ThisMenuIs.'AddNewSurveyList';
            $PageTitle = $Module_H1." اضافة "  ;
            $Short_Menu_Sel = 'AddNewSurveyList';
            break;   
                                 


        case 'SurveyListDelete':
            $content =  UserPerMatianCont('SurveyList_Delete.php',$USER_PERMATION_Dell);
            $ThisMenuIs_li = $ThisMenuIs.'SurveyListDelete';
            $PageTitle = $Module_H1." حذف "  ;
            $Short_Menu_Sel = 'SurveyListDelete';
            break;  




                     
                                   
                        
  /*          
        case 'UpdateCust':
            $content =  UserPerMatianCont('Config_UpdateCust.php',$AdminConfig['admin']);
            $ThisMenuIs_li = $ThisMenuIs.'UpdateCust';
            $PageTitle = $Module_H1.$AdminLangFile['cust_updatecust'] ;
            $Short_Menu_Sel = 'UpdateCust';
            break;       
            
            
  
            
        case 'CustomerUpdate':
            $content =  UserPerMatianCont('Customer_List.php',$USER_PERMATION_List);
            $ThisMenuIs_li = $ThisMenuIs.'CustomerUpdate';
            $PageTitle = $Module_H1.$ALang['cust_list_but']  ;
            $Short_Menu_Sel = 'CustomerUpdate';
            break;



            
#################################################################################################################################
###################################################    Profile
#################################################################################################################################

                                          
            
          
            



 
#################################################################################################################################
###################################################  ExportCust
#################################################################################################################################
        case 'ExportCust':
            $content =  UserPerMatianCont('Customer_Export.php',$AdminConfig['admin']);
            $ThisMenuIs_li = $ThisMenuIs.'ExportCust';
            $PageTitle = $Module_H1.$AdminLangFile['customer_exportcust'] ;
            $Short_Menu_Sel = 'ExportCust';
            break;

#################################################################################################################################
################################################### FilterCust
#################################################################################################################################
        case 'FilterCust':
            $content =  UserPerMatianCont('Customer_Filter.php',$USER_PERMATION_List);
            $ThisMenuIs_li = $ThisMenuIs.'FilterCust';
            $PageTitle = $Module_H1.$AdminLangFile['cust_filter_but'] ;
            $Short_Menu_Sel = 'FilterCust';
            break;




*/

#################################################################################################################################
###################################################  CustomerDelete
#################################################################################################################################
        case 'CustomerDelete':
            $content =  UserPerMatianCont('Customer_Delete.php',$USER_PERMATION_Dell);
            $ThisMenuIs_li = $ThisMenuIs.'CustomerDell';
            $PageTitle = $Module_H1.$AdminLangFile['cust_customerdell'] ;
            $Short_Menu = '_Short_Menu.php';
            $Short_Menu_Sel = 'CustomerDell';
            break;
#################################################################################################################################
###################################################  Search
#################################################################################################################################
        case 'Search':
            $content =  UserPerMatianCont('Customer_Search.php',$USER_PERMATION_List);
            $ThisMenuIs_li = $ThisMenuIs.'Search';
            $PageTitle = $Module_H1.$AdminLangFile['cust_search_but'] ;
            $Short_Menu_Sel = 'Search';
            break;
            
            

        default:
            $content =  '../include/Page_Empty.php';
            $PageTitle = $Module_H1.$AdminLangFile['mainform_emptypage'];
            $Short_Menu = '_Short_Menu.php';
break; 
   }
} else {
   SendMassgeforuser2();
}
require_once $TemplatePhth;

?>