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
#|||||||||||||||||||||||||||||||||||||| #   EmployeesList
    case 'EmployeesList':
        $content =  UserPerMatianCont('Mod_List.php',"1");
        $PageTitle = $Module_H1.$AdminLangFile['employees_list'] ;
        break;

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #    EmployeesSort
    case 'EmployeesSort':
        $content =  UserPerMatianCont('Mod_Sort.php',"1");
        $PageTitle = $Module_H1.$AdminLangFile['employees_sort'] ;
        break;

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #   EmployeesAdd
    case 'EmployeesAdd':
        $content =  UserPerMatianCont('Mod_Add.php',"1");
        $PageTitle = $Module_H1.$AdminLangFile['employees_add'] ;
        $PageType = "Add";
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
#|||||||||||||||||||||||||||||||||||||| #
    default:
        $content =  '../include/Page_Empty.php';
        $PageTitle = $Module_H1.$AdminLangFile['mainform_emptypage'];
        $Short_Menu = '_Short_Menu.php';
}


require_once $TemplatePhth;

?>