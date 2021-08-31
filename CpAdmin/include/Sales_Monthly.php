<?php
$ThSisUser = "user_".$RowUsreInfo['user_id'] ; 

 
$ConfigP['report_period'] = '2';
$ConfigP['cust_cat'] = "2";
 
if(isset($_POST['B1_Fliter'])){ 
$Start_Date = strtotime($_POST['date_from']); 
$End_Date =  strtotime($_POST['date_to']); 
}else{
UnsetAllSession('date_from,date_to');
$Report_period =  ReportPeriod($ConfigP['report_period']);
$Start_Date = $Report_period['start']; 
$End_Date = $Report_period['end']; 
$row['date_from'] = ConvertDateToCalender_3($Start_Date) ;   
$row['date_to'] = ConvertDateToCalender_3($End_Date) ; 
}

if($RowUsreInfo['user_id'] == '1'){
$arr = array('GroupCat'=> $ConfigP['cust_cat']);
//FormFilter_CustService($arr);
}










 
if($End_Date < $Start_Date  ){
echo '<div style="clear: both!important;"></div>';
New_Print_Alert("4",$AdminLangFile['leads_date_err']);
$ErrDate = '1' ;
} 
    
  
if($ErrDate != '1'){
$UserPerm = "";    
## @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@   التجميع   
$UserSQlFilter = $UserPerm ;
$Countdayforloop =  CountDayForLoop($Start_Date,$End_Date) ; 

$ThISDay  = FULLDate_ForToday();
  


$TodayISS = $ThISDay['Stamp'];
$MonthIss = $ThISDay['Month']."-".$ThISDay['Year'];

## @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@   تقرير التذاكر     
echo '<div style="clear: both!important;"></div>'; 
$CountCustomer = $db-> H_Total_Count("SELECT id FROM customer ");
$CountCustomer_Today = $db-> H_Total_Count("SELECT id FROM customer where date_add = '$TodayISS' ");
$CountCustomer_Month = $db-> H_Total_Count("SELECT id FROM customer where date_month = '$MonthIss' ");  
ReportBlockPrint("col-md-3","عدد العملاء",intval($CountCustomer),"fa-file-text","alert-info");
ReportBlockPrint("col-md-3","ادخال اليوم",intval($CountCustomer_Today),"fa-bell-o","alert-warning");
ReportBlockPrint("col-md-3","ادخال الشهر",intval($CountCustomer_Month),"fa-calendar","alert-success");
echo '<div style="clear: both!important;"></div>';





}

 

 
?>    