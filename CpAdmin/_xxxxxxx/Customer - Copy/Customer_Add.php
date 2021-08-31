<?php
#AddFildeToTabel("customer","member_type","id",'int','0','1');
#CHANGE_Filde("customer",'member_type','int','0');
if(!defined('WEB_ROOT')) {	exit;}

if($PageType == "Edit"){
    $PageView = "0";
    $row = $db->H_CheckTheGet("id","id","customer","2");
    $Page_credentials  =   CustService_Page_credentials($row);
    if($Page_credentials['View'] == '1' and $Page_credentials['Add'] == '1'){
    $PageView = "1";    
    }
}elseif($PageType == "Add"){
    $row = "";
    $PageView = "1";
}




 

###########################################################>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
OPen_Page($PageTitle);

if($PageView == '1'){
 
$Err = array();
Form_Open();
 
    
//hidden
echo '<input type="hidden" value="'.$RowUsreInfo['user_id'].'" name="user_id" />';

Cust_Print_TabsUl($PageType); 
 
Cust_Print_Info($PageType,$row);
Cust_Print_LoginInfo($PageType,$row);  
Cust_Print_SMS_Config($PageType,$row);
Cust_Print_Complain($PageType,$row);
Cust_Print_CityList($PageType,$row);
 
Print_Cust_Photo($PageType,$row);
 
 
Cust_Print_TabsClosedDiv();
 
echo '<div style="clear: both!important;"></div>'.BR.BR.BR.BR;


if($PageType == "Edit"){
    Form_Close_New("2","ListCustomer");
    if(isset($_POST['B1'])){
        Vall($Err,"Etman_CustomerEdit",$db,"1",$USER_PERMATION_Edit);
    }
}elseif($PageType == "Add"){
    Form_Close_New("1","ListCustomer");
    if(isset($_POST['B1'])){
        Vall($Err,"Etman_CustomerAdd",$db,"1",$USER_PERMATION_Add);
    }
}

 
}else{
echo '<div class="alert alert-danger alert-dismissable Arr_Mass">';
echo $AdminLangFile['mainform_no_user_per'];
echo '</div>';    
}
 
###########################################################<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
Close_Page(); 
?>