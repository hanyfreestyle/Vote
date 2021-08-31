<?php
if(!defined('WEB_ROOT')) {	exit;}
require_once "../_IncPage/Ajax_Country_Javascript.php";
Module_InCFile();

Clear_SESSION("ListCustomer");

if(isset($_POST['cust_clear_user'])){
    UnsetAllSession("CustUserPermission,CustUserPermission_ID");
}

if(isset($_POST['B1_Fliter'])){
    $UserPerm = CustService_Filter_Employee_From_POST($_POST['emp_id']);
    $Filter_FollowUser  = Filter_FollowUser_By_POST($_POST['emp_id']);
    $_SESSION['CustUserPermission'] = $UserPerm ;
    $_SESSION['CustUserPermission_ID'] = $_POST['emp_id'];
    $Employee_IDD = $_SESSION['CustUserPermission_ID'];
   
}else{

    if(isset($_SESSION['CustUserPermission'])){
        $UserPerm = $_SESSION['CustUserPermission'];
        $Employee_IDD = $_SESSION['CustUserPermission_ID'];
        $Filter_FollowUser  = Filter_FollowUser_By_POST($Employee_IDD);
    }else{
        $UserPerm =  CustService_Filter_Employee_By_Permission() ;
        $Filter_FollowUser  = Filter_FollowUser_By_Permission();
        $Employee_IDD = "";
    }
}

 

Permission_Alert_User("CustUserPermission_ID");
$TodayIss = TimeForToday() ;  




echo '<div class="row ShortMenu"><div class="col-md-12">';

echo '<a class="btn3d btn btn_3d-default btn-lg '.CheckSelBut("AddCustomer").'"  href="index.php?view=AddCustomer">
<i class="fa fa-plus-circle"></i>'.$ALang['cust_but_add'].'</a>';

 
echo '<a class="btn3d btn btn_3d-default btn-lg '.CheckSelBut("ListCustomer").'"  href="index.php?view=ListCustomer">
<i class="fa fa-list"></i>'.$ALang['cust_list_but'].'</a>';

echo '<a class="btn3d btn btn_3d-default btn-lg '.CheckSelBut("Search").'"  href="index.php?view=Search">
<i class="fa fa-search"></i>'.$AdminLangFile['cust_search_but'].'</a>';


/*





echo '<a class="btn3d btn btn_3d-default btn-lg '.CheckSelBut("CustomerUpdate").'"  href="index.php?view=CustomerUpdate">
<i class="fa fa-eye"></i>تحديث البيانات</a>';


echo '<a class="btn3d btn btn_3d-default btn-lg '.CheckSelBut("FilterCust").'"  href="index.php?view=FilterCust">
<i class="fa fa-filter"></i>'.$AdminLangFile['cust_filter_but'].'</a>';




if($AdminConfig['admin'] == '1'){
echo '<a class="btn3d btn btn_3d-default btn-lg '.CheckSelBut("ExportCust").'"  href="index.php?view=ExportCust">
<i class="fa fa-upload"></i>'.$AdminLangFile['customer_exportcust'].'</a>';

}



/*
 
echo '<a class="btn3d btn btn_3d-default btn-lg '.CheckSelBut("UpDate").'"  href="index.php?view=UpDate">
<i class="fa fa-refresh"></i>'.$AdminLangFile['managedate_update'].'</a>';
   


 
 
echo '<div style="clear: both!important;"></div>';

$CustMenu = $db->SelArr("SELECT * FROM f_cust_type where state = '1' ORDER BY id");
for($i = 0; $i < count($CustMenu); $i++) {
echo '<a class="btn3d btn btn_3d-default btn-lg '.CheckSelBut($CustMenu[$i]['url']).'"  href="index.php?view='.$CustMenu[$i]['url'].'">
<i class="fa">('.$CustMenu[$i]['count'].')</i>'.$CustMenu[$i][$NamePrint].'</a>';
} 


////////////////////////////////////Load
$T_ARRAY_CUST_TYPE = $db->SelArr("SELECT id,name,name_en FROM f_cust_type");
$T_ARRAY_CUST_TYPESUB = $db->SelArr("SELECT id,name,name_en FROM f_cust_subtype");
$T_ARRAY_USERS_NAME = $db->SelArr("SELECT user_id,name FROM tbl_user");

$T_ARRAY_LEAD_TYPE  =  LoadTabelData_To_Arr(F_LEAD_TYPE ,"fs_lead_type");
$T_ARRAY_LEAD_SOURS  =  LoadTabelData_To_Arr(F_LEAD_SOURS ,"fs_lead_sours");




*/

if($USER_PERMATION_Edit == '1'){
echo '<a class="btn3d btn btn_3d-default btn-lg '.CheckSelBut("Config").'"  href="index.php?view=Config">
<i class="fa fa-cogs"></i>'.$AdminLangFile['mainform_tap_section_settings'].'</a>';
}



if( $view == 'Config' or $view == 'UpdateCust' and  $AdminConfig['admin'] == '1'){
echo '<a class="btn3d btn btn_3d-default btn-lg '.CheckSelBut("UpdateCust").'"  href="index.php?view=UpdateCust">
<i class="fa fa-plus-circle"></i>'.$AdminLangFile['cust_updatecust'].'</a>';
}

////////////////////////////////////Load
$CONFIG_DATA_Arr  =  LoadTabelData_To_Arr("1","config_data");

$ConfigP['tape_view'] = "0";
 
?>
</div></div>
<div style="clear: both!important;"></div>