<?php
if(!defined('WEB_ROOT')) {	exit;}

###########################################################>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
OPen_Page($PageTitle);

 
$row = $db->H_CheckTheGet("id","id","customer","2");


if(isset($_POST['Customer_AddMore'])){
$Err = array();
Vall($Err,"CustomerAddMore",$db,"1",$USER_PERMATION_Add);
} 

if(isset($_POST['DelUnit'])) {
	if($USER_PERMATION_Dell == '1') {
       DellMoreCustInfo($row['id'],"Profile",$row['id']);
	} else {
		SendMassgeforuser();
	}
}

 
 
$ConfigP['tape_view'] = "1";
    
    
Cust_Print_TabsUl($PageType);    

Cust_Print_Info_Profile($row);
Cust_Print_MoreInfo($PageType,$row);
Cust_Print_Complaint_Profile($row); 
Cust_Print_Branch_Profile($row); 
/*

Cust_Print_SystemInfo_Profile($row);

Cust_Print_Address_Profile($row); 
Cust_Print_Product_Profile($row); 
    
*/
 
Cust_Print_TabsClosedDiv();

echo '<div style="clear: both!important;"></div>'.BR.BR.BR.BR;


###########################################################<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
Close_Page(); 




?>