<?php
require_once '../include/inc_reqfile.php';
require_once '_index_config.php';
require_once '_Process.php';


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
#|||||||||||||||||||||||||||||||||||||| #   EmployeesAdd
    case 'EmployeesAdd':
        $content =  UserPerMatianCont('Mod_Add.php',"1");
        $PageTitle = $Module_H1.$AdminLangFile['employees_add'] ;
        $PageType = "Add";
        break;

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #   EmployeesList
    case 'EmployeesList':
        $content =  UserPerMatianCont('Mod_List.php',"1");
        $PageTitle = $Module_H1.$AdminLangFile['employees_list'] ;
        break;

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #    EmployeesEdit
    case 'EmployeesEdit':
        $content =  UserPerMatianCont('Mod_Add.php',"1");
        $PageTitle = $Module_H1.$AdminLangFile['employees_edit'] ;
        $PageType = "Edit";

        break;

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #    EmployeesDelete
    case 'EmployeesDelete':
        $content =  UserPerMatianCont('Mod_Delete.php',"1");
        $PageTitle = $Module_H1.$AdminLangFile['employees_delete'] ;
        break;

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #    SendSMS
    case 'SendSMS':
        $content =  UserPerMatianCont('../Files/SendSMS.php',"1");
        $PageTitle = $Module_H1." ارسال رسالة نصيه" ;
        $Mobile_CenterDiv = " MobileForm_CenterDiv_with_photo ";
        $HomeBack_mobile = "HomeBack_mobile_with_photo";
        break;
#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #    SendEmail
    case 'SendEmail':
        $content =  UserPerMatianCont('../Files/SendEmail.php',"1");
        $PageTitle = $Module_H1." ارسال بريد الكترونى ";
        $Mobile_CenterDiv = " MobileForm_CenterDiv_with_photo ";
        $HomeBack_mobile = "HomeBack_mobile_with_photo";
        break;


#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #
    default:
        $content =  'Mod_List.php';
        $PageTitle = $Module_H1.$AdminLangFile['employees_list'] ;;
        $Short_Menu = '_Short_Menu.php';
}


$content_left = "../leftMenu/Inc_Left_ListPage.php";


if($DetectMobile->isMobile() == '1') {
    require_once '../include/Admin_Template_mobile.php';
}else{
    require_once '../include/Admin_Template_Pc.php';
}

?>