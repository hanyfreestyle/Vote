<?php
 require_once '../include/inc_reqfile.php';
 require_once '_index_config.php';
 require_once 'Process.php';
 
 
 $ConfigP = GetCatConfig($ConfigTabel);

 $AdminConfig = checkUser();
 $USER_PERMATION_List = $AdminConfig[USERPERMATION];
 $USER_PERMATION_Add = $AdminConfig[USERPERMATION_ADD];
 $USER_PERMATION_Edit = $AdminConfig[USERPERMATION_EDIT];
 $USER_PERMATION_Dell = $AdminConfig[USERPERMATION_DELL];
 
$Short_Menu = '_Short_Menu.php';

if($AdminConfig[USERPERMATION] == '1') {
$view = (isset($_GET['view']) && $_GET['view'] != '')?$_GET['view']:'';
switch($view) {

#################################################################################################################################
################################################### Config
#################################################################################################################################
    case 'Config':
        $content =  UserPerMatianCont('Config.php',$USER_PERMATION_Edit);
        $ThisMenuIs_li = $ThisMenuIs.'Config';
        $PageTitle = $Module_H1.$AdminLangFile['mainform_tap_section_settings'] ;
        $Short_Menu = '_Short_Menu.php';
        $Short_Menu_Sel = 'Config';
        break;

    case 'MoveData':
        $content =  UserPerMatianCont('MoveData.php',$USER_PERMATION_Edit);
        $ThisMenuIs_li = $ThisMenuIs.'MoveData';
        $PageTitle = $Module_H1."تحويل البيانات" ;
        $Short_Menu = '_Short_Menu.php';
        $Short_Menu_Sel = 'MoveData';
        break;


#################################################################################################################################
###################################################   $SecArr_City
#################################################################################################################################
        case 'List'.$SecArr_City['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_City);
            $content =  UserPerMatianCont('CatId_Data_List.php',$USER_PERMATION_List);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Add'.$SecArr_City['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_City);
            $content =  UserPerMatianCont('CatId_Data_Add.php',$USER_PERMATION_Add);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Edit'.$SecArr_City['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_City);
            $content =  UserPerMatianCont('CatId_Data_Edit.php',$USER_PERMATION_Edit);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Dell'.$SecArr_City['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_City);
            $content =  UserPerMatianCont_2('CatId_Data_Dell.php',$USER_PERMATION_Dell,$PageVarList['Dell_S']);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Order'.$SecArr_City['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_City);
            $content =  UserPerMatianCont('CatId_Data_Order.php',$USER_PERMATION_Edit);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;



#################################################################################################################################
###################################################   $SecArr_Area
#################################################################################################################################
        case 'List'.$SecArr_Area['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_Area);
            $content =  UserPerMatianCont('CatId_Data_List.php',$USER_PERMATION_List);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Add'.$SecArr_Area['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_Area);
            $content =  UserPerMatianCont('CatId_Data_Add.php',$USER_PERMATION_Add);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Edit'.$SecArr_Area['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_Area);
            $content =  UserPerMatianCont('CatId_Data_Edit.php',$USER_PERMATION_Edit);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Dell'.$SecArr_Area['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_Area);
            $content =  UserPerMatianCont_2('CatId_Data_Dell.php',$USER_PERMATION_Dell,$PageVarList['Dell_S']);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Order'.$SecArr_Area['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_Area);
            $content =  UserPerMatianCont('CatId_Data_Order.php',$USER_PERMATION_Edit);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;



#################################################################################################################################
###################################################    Payment
#################################################################################################################################
        case 'List'.$SecArr_Complaint['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_Complaint);
            $content =  UserPerMatianCont('CatId_Data_List.php',$USER_PERMATION_List);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Add'.$SecArr_Complaint['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_Complaint);
            $content =  UserPerMatianCont('CatId_Data_Add.php',$USER_PERMATION_Add);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Edit'.$SecArr_Complaint['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_Complaint);
            $content =  UserPerMatianCont('CatId_Data_Edit.php',$USER_PERMATION_Edit);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Dell'.$SecArr_Complaint['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_Complaint);
            $content =  UserPerMatianCont_2('CatId_Data_Dell.php',$USER_PERMATION_Dell,$PageVarList['Dell_S']);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Order'.$SecArr_Complaint['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_Complaint);
            $content =  UserPerMatianCont('CatId_Data_Order.php',$USER_PERMATION_Edit);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;



  /*     
#################################################################################################################################
###################################################    ListBranch
#################################################################################################################################
        case 'List'.$SecArr_Branch['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_Branch);
            $content =  UserPerMatianCont('CatId_Data_List.php',$USER_PERMATION_List);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Add'.$SecArr_Branch['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_Branch);
            $content =  UserPerMatianCont('CatId_Data_Add.php',$USER_PERMATION_Add);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Edit'.$SecArr_Branch['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_Branch);
            $content =  UserPerMatianCont('CatId_Data_Edit.php',$USER_PERMATION_Edit);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Dell'.$SecArr_Branch['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_Branch);
            $content =  UserPerMatianCont_2('CatId_Data_Dell.php',$USER_PERMATION_Dell,$PageVarList['Dell_S']);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Order'.$SecArr_Branch['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_Branch);
            $content =  UserPerMatianCont('CatId_Data_Order.php',$USER_PERMATION_Edit);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;




#################################################################################################################################
###################################################    ListSalesEmpl
#################################################################################################################################
        case 'List'.$SecArr_SalesEmpl['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_SalesEmpl);
            $content =  UserPerMatianCont('CatId_Data_List.php',$USER_PERMATION_List);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Add'.$SecArr_SalesEmpl['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_SalesEmpl);
            $content =  UserPerMatianCont('CatId_Data_Add.php',$USER_PERMATION_Add);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Edit'.$SecArr_SalesEmpl['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_SalesEmpl);
            $content =  UserPerMatianCont('CatId_Data_Edit.php',$USER_PERMATION_Edit);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Dell'.$SecArr_SalesEmpl['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_SalesEmpl);
            $content =  UserPerMatianCont_2('CatId_Data_Dell.php',$USER_PERMATION_Dell,$PageVarList['Dell_S']);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Order'.$SecArr_SalesEmpl['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_SalesEmpl);
            $content =  UserPerMatianCont('CatId_Data_Order.php',$USER_PERMATION_Edit);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;


#################################################################################################################################
###################################################    ProductCat
#################################################################################################################################
        case 'List'.$SecArr_ProductCat['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_ProductCat);
            $content =  UserPerMatianCont('CatId_Data_List.php',$USER_PERMATION_List);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Add'.$SecArr_ProductCat['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_ProductCat);
            $content =  UserPerMatianCont('CatId_Data_Add.php',$USER_PERMATION_Add);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Edit'.$SecArr_ProductCat['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_ProductCat);
            $content =  UserPerMatianCont('CatId_Data_Edit.php',$USER_PERMATION_Edit);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Dell'.$SecArr_ProductCat['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_ProductCat);
            $content =  UserPerMatianCont_2('CatId_Data_Dell.php',$USER_PERMATION_Dell,$PageVarList['Dell_S']);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Order'.$SecArr_ProductCat['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_ProductCat);
            $content =  UserPerMatianCont('CatId_Data_Order.php',$USER_PERMATION_Edit);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;



#################################################################################################################################
###################################################    Product
#################################################################################################################################
        case 'List'.$SecArr_Product['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_Product);
            $content =  UserPerMatianCont('CatId_Data_List.php',$USER_PERMATION_List);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Add'.$SecArr_Product['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_Product);
            $content =  UserPerMatianCont('CatId_Data_Add.php',$USER_PERMATION_Add);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Edit'.$SecArr_Product['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_Product);
            $content =  UserPerMatianCont('CatId_Data_Edit.php',$USER_PERMATION_Edit);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Dell'.$SecArr_Product['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_Product);
            $content =  UserPerMatianCont_2('CatId_Data_Dell.php',$USER_PERMATION_Dell,$PageVarList['Dell_S']);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Order'.$SecArr_Product['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_Product);
            $content =  UserPerMatianCont('CatId_Data_Order.php',$USER_PERMATION_Edit);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;


#################################################################################################################################
###################################################   Customer Type
#################################################################################################################################
        case 'List'.$SecArr_Customer['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_Customer);
            $content =  UserPerMatianCont('CatId_Data_List.php',$USER_PERMATION_List);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Add'.$SecArr_Customer['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_Customer);
            $content =  UserPerMatianCont('CatId_Data_Add.php',$USER_PERMATION_Add);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Edit'.$SecArr_Customer['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_Customer);
            $content =  UserPerMatianCont('CatId_Data_Edit.php',$USER_PERMATION_Edit);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Dell'.$SecArr_Customer['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_Customer);
            $content =  UserPerMatianCont_2('CatId_Data_Dell.php',$USER_PERMATION_Dell,$PageVarList['Dell_S']);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Order'.$SecArr_Customer['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_Customer);
            $content =  UserPerMatianCont('CatId_Data_Order.php',$USER_PERMATION_Edit);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;


        case 'List'.$SecArr_SubCustomer['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_SubCustomer);
            $content =  UserPerMatianCont('CatId_Data_List.php',$USER_PERMATION_List);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Add'.$SecArr_SubCustomer['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_SubCustomer);
            $content =  UserPerMatianCont('CatId_Data_Add.php',$USER_PERMATION_Add);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Edit'.$SecArr_SubCustomer['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_SubCustomer);
            $content =  UserPerMatianCont('CatId_Data_Edit.php',$USER_PERMATION_Edit);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Dell'.$SecArr_SubCustomer['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_SubCustomer);
            $content =  UserPerMatianCont_2('CatId_Data_Dell.php',$USER_PERMATION_Dell,$PageVarList['Dell_S']);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Order'.$SecArr_SubCustomer['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_SubCustomer);
            $content =  UserPerMatianCont('CatId_Data_Order.php',$USER_PERMATION_Edit);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;





#################################################################################################################################
###################################################  Customer Filter
#################################################################################################################################
        case 'List'.$SecArr_CustFilter_1['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_CustFilter_1);
            $content =  UserPerMatianCont('CatId_Data_List.php',$USER_PERMATION_List);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Add'.$SecArr_CustFilter_1['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_CustFilter_1);
            $content =  UserPerMatianCont('CatId_Data_Add.php',$USER_PERMATION_Add);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Edit'.$SecArr_CustFilter_1['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_CustFilter_1);
            $content =  UserPerMatianCont('CatId_Data_Edit.php',$USER_PERMATION_Edit);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Dell'.$SecArr_CustFilter_1['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_CustFilter_1);
            $content =  UserPerMatianCont_2('CatId_Data_Dell.php',$USER_PERMATION_Dell,$PageVarList['Dell_S']);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Order'.$SecArr_CustFilter_1['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_CustFilter_1);
            $content =  UserPerMatianCont('CatId_Data_Order.php',$USER_PERMATION_Edit);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

            #$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$#

        case 'List'.$SecArr_CustFilter_2['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_CustFilter_2);
            $content =  UserPerMatianCont('CatId_Data_List.php',$USER_PERMATION_List);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Add'.$SecArr_CustFilter_2['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_CustFilter_2);
            $content =  UserPerMatianCont('CatId_Data_Add.php',$USER_PERMATION_Add);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Edit'.$SecArr_CustFilter_2['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_CustFilter_2);
            $content =  UserPerMatianCont('CatId_Data_Edit.php',$USER_PERMATION_Edit);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Dell'.$SecArr_CustFilter_2['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_CustFilter_2);
            $content =  UserPerMatianCont_2('CatId_Data_Dell.php',$USER_PERMATION_Dell,$PageVarList['Dell_S']);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Order'.$SecArr_CustFilter_2['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_CustFilter_2);
            $content =  UserPerMatianCont('CatId_Data_Order.php',$USER_PERMATION_Edit);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;



        #$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$#

        case 'List'.$SecArr_CustFilter_3['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_CustFilter_3);
            $content =  UserPerMatianCont('CatId_Data_List.php',$USER_PERMATION_List);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Add'.$SecArr_CustFilter_3['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_CustFilter_3);
            $content =  UserPerMatianCont('CatId_Data_Add.php',$USER_PERMATION_Add);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Edit'.$SecArr_CustFilter_3['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_CustFilter_3);
            $content =  UserPerMatianCont('CatId_Data_Edit.php',$USER_PERMATION_Edit);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Dell'.$SecArr_CustFilter_3['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_CustFilter_3);
            $content =  UserPerMatianCont_2('CatId_Data_Dell.php',$USER_PERMATION_Dell,$PageVarList['Dell_S']);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Order'.$SecArr_CustFilter_3['MainUrl']:
            $PageVarList = Get_PageVarList($SecArr_CustFilter_3);
            $content =  UserPerMatianCont('CatId_Data_Order.php',$USER_PERMATION_Edit);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;





#################################################################################################################################
###################################################   Country
#################################################################################################################################

        case 'List'.$SecArr_Country['MainUrl']:
            $PageVarList = Get_PageVarList_Levels($SecArr_Country);
            $content =  UserPerMatianCont('Level_Data_List.php',$USER_PERMATION_List);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Add'.$SecArr_Country['MainUrl']:
            $PageVarList = Get_PageVarList_Levels($SecArr_Country);
            $content =  UserPerMatianCont('Level_Data_Add.php',$USER_PERMATION_Add);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Edit'.$SecArr_Country['MainUrl']:
            $PageVarList = Get_PageVarList_Levels($SecArr_Country);
            $content =  UserPerMatianCont('Level_Data_Edit.php',$USER_PERMATION_Edit);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Dell'.$SecArr_Country['MainUrl']:
            $PageVarList = Get_PageVarList_Levels($SecArr_Country);
            $content =  UserPerMatianCont_2('Level_Data_Dell.php',$USER_PERMATION_Dell,$PageVarList['Dell_S']);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Order'.$SecArr_Country['MainUrl']:
            $PageVarList = Get_PageVarList_Levels($SecArr_Country);
            $content =  UserPerMatianCont('Level_Data_Order.php',$USER_PERMATION_Edit);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;


        #$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$#

        case 'List'.$SecArr_City['MainUrl']:
            $PageVarList = Get_PageVarList_Levels($SecArr_City);
            $content =  UserPerMatianCont('Level_Data_List.php',$USER_PERMATION_List);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Add'.$SecArr_City['MainUrl']:
            $PageVarList = Get_PageVarList_Levels($SecArr_City);
            $content =  UserPerMatianCont('Level_Data_Add.php',$USER_PERMATION_Add);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Edit'.$SecArr_City['MainUrl']:
            $PageVarList = Get_PageVarList_Levels($SecArr_City);
            $content =  UserPerMatianCont('Level_Data_Edit.php',$USER_PERMATION_Edit);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Dell'.$SecArr_City['MainUrl']:
            $PageVarList = Get_PageVarList_Levels($SecArr_City);
            $content =  UserPerMatianCont_2('Level_Data_Dell.php',$USER_PERMATION_Dell,$PageVarList['Dell_S']);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Order'.$SecArr_City['MainUrl']:
            $PageVarList = Get_PageVarList_Levels($SecArr_City);
            $content =  UserPerMatianCont('Level_Data_Order.php',$USER_PERMATION_Edit);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        #$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$#

        case 'List'.$SecArr_Area['MainUrl']:
            $PageVarList = Get_PageVarList_Levels($SecArr_Area);
            $content =  UserPerMatianCont('Level_Data_List.php',$USER_PERMATION_List);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Add'.$SecArr_Area['MainUrl']:
            $PageVarList = Get_PageVarList_Levels($SecArr_Area);
            $content =  UserPerMatianCont('Level_Data_Add.php',$USER_PERMATION_Add);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Edit'.$SecArr_Area['MainUrl']:
            $PageVarList = Get_PageVarList_Levels($SecArr_Area);
            $content =  UserPerMatianCont('Level_Data_Edit.php',$USER_PERMATION_Edit);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Dell'.$SecArr_Area['MainUrl']:
            $PageVarList = Get_PageVarList_Levels($SecArr_Area);
            $content =  UserPerMatianCont_2('Level_Data_Dell.php',$USER_PERMATION_Dell,$PageVarList['Dell_S']);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;

        case 'Order'.$SecArr_Area['MainUrl']:
            $PageVarList = Get_PageVarList_Levels($SecArr_Area);
            $content =  UserPerMatianCont('Level_Data_Order.php',$USER_PERMATION_Edit);
            $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
            break;




#################################################################################################################################
###################################################
#################################################################################################################################


#################################################################################################################################
###################################################
#################################################################################################################################


#################################################################################################################################
###################################################
#################################################################################################################################


#################################################################################################################################
###################################################
#################################################################################################################################

/*




    case 'List'.$SecArr_AreaSub['MainUrl']:
        $PageVarList = Get_PageVarList_Levels($SecArr_AreaSub);
        $content =  UserPerMatianCont('Level_Data_List.php',$USER_PERMATION_List);
        $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
        break;
                
    case 'Add'.$SecArr_AreaSub['MainUrl']:
        $PageVarList = Get_PageVarList_Levels($SecArr_AreaSub);
        $content =  UserPerMatianCont('Level_Data_Add.php',$USER_PERMATION_Add);
        $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
        break;

    case 'Edit'.$SecArr_AreaSub['MainUrl']:
        $PageVarList = Get_PageVarList_Levels($SecArr_AreaSub);
        $content =  UserPerMatianCont('Level_Data_Edit.php',$USER_PERMATION_Edit);
        $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
        break;
        
    case 'Dell'.$SecArr_AreaSub['MainUrl']:
        $PageVarList = Get_PageVarList_Levels($SecArr_AreaSub);
        $content =  UserPerMatianCont_2('Level_Data_Dell.php',$USER_PERMATION_Dell,$PageVarList['Dell_S']);
        $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
        break;

    case 'Order'.$SecArr_AreaSub['MainUrl']:
        $PageVarList = Get_PageVarList_Levels($SecArr_AreaSub);
        $content =  UserPerMatianCont('Level_Data_Order.php',$USER_PERMATION_Edit);
        $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
        break;  
    #################################################################################################################################
    ################################################### List CustType
    #################################################################################################################################
    case 'List'.$SecArr_Street['MainUrl']:
        $PageVarList = Get_PageVarList_Levels($SecArr_Street);
        $content =  UserPerMatianCont('Level_Data_List.php',$USER_PERMATION_List);
        $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
        break;
                
    case 'Add'.$SecArr_Street['MainUrl']:
        $PageVarList = Get_PageVarList_Levels($SecArr_Street);
        $content =  UserPerMatianCont('Level_Data_Add.php',$USER_PERMATION_Add);
        $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
        break;
       
    case 'Edit'.$SecArr_Street['MainUrl']:
        $PageVarList = Get_PageVarList_Levels($SecArr_Street);
        $content =  UserPerMatianCont('Level_Data_Edit.php',$USER_PERMATION_Edit);
        $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
        break;         
        
     case 'Dell'.$SecArr_Street['MainUrl']:
        $PageVarList = Get_PageVarList_Levels($SecArr_Street);
        $content =  UserPerMatianCont_2('Level_Data_Dell.php',$USER_PERMATION_Dell,$PageVarList['Dell_S']);
        $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
        break;

    case 'Order'.$SecArr_Street['MainUrl']:
        $PageVarList = Get_PageVarList_Levels($SecArr_Street);
        $content =  UserPerMatianCont('Level_Data_Order.php',$USER_PERMATION_Edit);
        $Fs_ListUrl = $PageVarList['Fs_ListUrl']; $ThisMenuIs_li  = $ThisMenuIs.$Fs_ListUrl; $Short_Menu_Sel = $Fs_ListUrl ;
        break;                       
*/




default:
       $content =  '../include/Page_Empty.php';
       $PageTitle = $Module_H1.$AdminLangFile['mainform_emptypage'];
       $Short_Menu = '_Short_Menu.php';
   }
} else {
   SendMassgeforuser2();
}
require_once $TemplatePhth;

?>