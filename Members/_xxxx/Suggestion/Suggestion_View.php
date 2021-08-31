<?php
###########################################################>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
OPen_Page($PageTitle);
if(isset($_GET['id'])){
   
$id = Url_Slug($_GET['id']);     
$SqlLine =  "select * from complaint_suggestion where state = '1' and  cust_id = '$CustMembers_Id' and id = '$id' ";

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
PrintFildComplaint("col-md-12","المقترح ",nl2br($row['des']));

echo '<div style="clear: both!important;"></div>';


Update_Suggestion_View($row);  
}else{
    Alert_NO_Content();
}
    
}

###########################################################<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
Close_Page();
 
 


function Update_Suggestion_View($row){
    global $db ;
    
    if($row['view'] == '0'){
    $id = $row['id'];
    $server_data = array ('view'=> "1" );
    $db->AutoExecute("complaint_suggestion",$server_data,AUTO_UPDATE,"id = $id");
    }
    
}
 
	
?>