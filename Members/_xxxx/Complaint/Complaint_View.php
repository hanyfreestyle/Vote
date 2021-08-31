<?php
###########################################################>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
OPen_Page($PageTitle);
if(isset($_GET['id'])){
    
$name_m = Url_Slug($_GET['id']);     
$SqlLine =  "select * from complaint where state = '1' and  cust_id = '$CustMembers_Id' and name_m = '$name_m' ";

$already = $db->H_Total_Count($SqlLine);
if($already == '1'){
    

$row = $db->H_SelectOneRow($SqlLine);


////////////////////////////////////Load
$CONFIG_DATA_Arr  =  LoadTabelData_To_Arr("1","config_data");
  

New_Print_Alert("5",$ALang['member_view_complaint_h1']); 

$FullTime = PrintFullTime($row['date_time']);
PrintFildComplaint("col-md-12",$ALang['member_list_date_add'],$FullTime);

PrintFildComplaint("col-md-12",$ALang['member_list_custname'],$row['cust_name']);
PrintFildComplaint("col-md-12",$ALang['member_list_cust_mobiel'],$row['cust_mobile']);


$complaint_id =  findValue_FromArr($CONFIG_DATA_Arr,"id",$row['complaint_id'],"name");
$city_id =  findValue_FromArr($CONFIG_DATA_Arr,"id",$row['city_id'],"name");
$area_id =  findValue_FromArr($CONFIG_DATA_Arr,"id",$row['area_id'],"name");


PrintFildComplaint("col-md-12",$ALang['member_list_complaint_2'],$complaint_id);
PrintFildComplaint("col-md-12",$ALang['member_list_city'],$city_id);
PrintFildComplaint("col-md-12",$ALang['member_list_area'],$area_id);
 

echo '<div style="clear: both!important;"></div>';


Update_Complaint_View($row);  
}
    
}

###########################################################<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
Close_Page();
 
	
?>