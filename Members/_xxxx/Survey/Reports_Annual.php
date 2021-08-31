<?php

###########################################################>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
OPen_Page($PageTitle);


$ThisYear = date("Y"); 
/*
$Complaint_For_Year_SQL = "SELECT * FROM `complaint` WHERE cust_id = '$CustId' and state = '1' and date_year = '$ThisYear' $orderby " ;
$Complaint_For_Year = $db->H_Total_Count($THESQL);
*/
 

New_Print_Alert("5",$ALang['member_report_for_year']." ".$ThisYear); 



$Countdayforloop = '12';
$YearFilter = $ThisYear;
$ThSisUser = $CustMembers_Id;

#$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ التذاكر الجديدة
  $Arr_NewTickets = array();
  
  $TotalCount = "0";
  $MonthData_Send = array();
  for ($x = 1; $x <= $Countdayforloop ; $x++) {
   $DateFiterLike = $x.'-'.$YearFilter ;   
  $already = $db->H_Total_Count("SELECT id FROM complaint WHERE cust_id = '$CustMembers_Id' and state = '1' and  date_month = '$DateFiterLike'  ");
  
 
  $MonthData =  array(GetMonthName_For_chart($x), $already); 
  array_push($MonthData_Send,$MonthData);  
    
  $TotalCount = $TotalCount +  $already ;
  }
  $NewData_01 =  array(
     'label' => "اجمالى عدد الشكاوى ". $TotalCount,
     'color' =>  "#5ab1ef",
     'data' => $MonthData_Send
   );

array_push($Arr_NewTickets,$NewData_01);   
$fp = fopen('json/'.$ThisYear."_".$ThSisUser.'_complaint.json', 'w');
fwrite($fp, json_encode($Arr_NewTickets));
fclose($fp);

echo '<div class="row">';
echo '<div class="col-lg-12">';
echo '<div data-source="json/'.$ThisYear."_".$ThSisUser.'_complaint.json" class="chart-line flot-chart"></div>';
echo '</div>';
echo '</div>';
echo '<div style="clear: both!important;"></div>'.BR.BR;    
#$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ التذاكر الجديدة



 
 
###########################################################<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
Close_Page();
	
?>