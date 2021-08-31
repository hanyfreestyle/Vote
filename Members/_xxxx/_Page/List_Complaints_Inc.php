<?php
if(!defined('WEB_ROOT')) {	exit;}

 
////////////////////////////////////Load
$CONFIG_DATA_Arr  =  LoadTabelData_To_Arr("1","config_data");

$TaBelArr = array('Tabel'=>$ThisTabelName, "But"=>'0');        
TableOpen_Header($TaBelArr);


Table_TH_Print('1',"ID","20");

Table_TH_Print($TableView['Date'],$ALang['member_list_date_add'],"50");
Table_TH_Print($TableView['CustName'],$ALang['member_list_custname'],"100");
Table_TH_Print($TableView['CustMobile'],$ALang['member_list_cust_mobiel'],"70");
Table_TH_Print($TableView['Complaint'],$ALang['member_list_complaint_2'],"50");
Table_TH_Print($TableView['City'],$ALang['member_list_city'],"70");
Table_TH_Print($TableView['Area'],$ALang['member_list_area'],"70"); 
Table_TH_Print('1',"","20");
Table_TH_Print('1',"","30");  

///// TableClose_Header
TableClose_Header();
 
   
$NOPAGE = GETTHEPAGE ($THESQL ,$PERpage);
if ($NOPAGE != 1){
    

if($ConfigP['datatabel'] == '1' and DATATABELVIEW == '1'  ){
$Name = $db->SelArr($THESQL);
}else{
$Name = $db->SelArr($THESQL ,true,$PERpage,PAGING_NEXT_PREV_NUM,$THELINK,5); 
}

  
            

for($i = 0; $i < count($Name); $i++) {
$id = $Name[$i]['id']; 

       
echo '<tr>';
Table_TD_Print("1",$Name[$i]['id'],"C"); 

$DateAdd = ConvertDateToCalender_2($Name[$i]['date_add']);
Table_TD_Print($TableView['Date'],$DateAdd,"C"); 
Table_TD_Print($TableView['CustName'],$Name[$i]['cust_name'],"C"); 
Table_TD_Print($TableView['CustMobile'],$Name[$i]['cust_mobile'],"C"); 

$complaint_id =  findValue_FromArr($CONFIG_DATA_Arr,"id",$Name[$i]['complaint_id'],"name");
$Full_Url = $MembersPathHome."Complaint/index.php?view=ComplaintList&CatId=".$Name[$i]['complaint_id'];
$Complaint = '<a href="'.$Full_Url.'">'.$complaint_id.'</a>';

$city_id =  findValue_FromArr($CONFIG_DATA_Arr,"id",$Name[$i]['city_id'],"name");
$Full_Url = $MembersPathHome."Complaint/index.php?view=ComplaintList&CityId=".$Name[$i]['city_id'];
$City = '<a href="'.$Full_Url.'">'.$city_id.'</a>';



$area_id =  findValue_FromArr($CONFIG_DATA_Arr,"id",$Name[$i]['area_id'],"name");
$Full_Url = $MembersPathHome."Complaint/index.php?view=ComplaintList&AreaId=".$Name[$i]['area_id'];
$Area = '<a href="'.$Full_Url.'">'.$area_id.'</a>';

Table_TD_Print($TableView['Complaint'],$Complaint,"C"); 
Table_TD_Print($TableView['City'],$City,"C"); 
Table_TD_Print($TableView['Area'],$Area,"C"); 


$Full_Url = $MembersPathHome."Complaint/index.php?view=ComplaintView&id=".$Name[$i]['name_m'] ;
$Oth = array('OtherStyle'=>"NewButStyle");
Table_TD_Print_Option('1',NF_PrintBut_TD('Full_Url',$ALang['mainform_list'],$Full_Url,"btn-info","fa-search",'0'),"C",$Oth);

$Full_Url = $MembersPathHome."Complaint/index.php?view=SendEmail&id=".$Name[$i]['name_m'] ;
$Oth = array('OtherStyle'=>"NewButStyle");
$TT_X = "ارسل الشكاوى ";
Table_TD_Print_Option('1',NF_PrintBut_TD('Full_Url',$TT_X,$Full_Url,"btn-info","fa-envelope",'0'),"C",$Oth);
 
echo '</tr>';
} 
}

///// CloseTabel


if($ViewPageing == "1"){
CloseTabel();    
}else{
CloseTabel_2();    
}   




?>

