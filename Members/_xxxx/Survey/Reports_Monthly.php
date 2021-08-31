<?php 

###########################################################>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
OPen_Page($PageTitle);


$ArrTOForm = array('LabelView'=>"on","DateOff"=>'0',"Members_Row"=>$Members_Row);
Etman_FilterMonth($ArrTOForm);


if(isset($_POST['MonthFliter'])){
    $ThisMonth = date(intval($_POST['thismonthe']));
    $ThisYear = date('Y');
    $Report_period = ReportPeriod_Month($ThisMonth,$ThisYear);   
}else{
    $ThisYear = date('Y');
    $ThisMonth = date('m');
    $Report_period = ReportPeriod_Month($ThisMonth,$ThisYear);
}





    $Start_Date = $Report_period['start'];
    $End_Date = $Report_period['end'];
    $Countdayforloop =  $Report_period['Loop'];
    $MonthName = GetMonthName($ThisMonth);
  
  
  New_Print_Alert("5",$ALang['member_report_m_h1']." ".$MonthName ." ".$ThisYear ); 
  $MonthFilter = intval($ThisMonth)."-".$ThisYear ;
  $MonthCount  = $db->H_Total_Count("SELECT * FROM complaint WHERE state = '1' and cust_id = '$CustMembers_Id' and  date_month  = '$MonthFilter' ");
 
  if($MonthCount > '0'){
    
#################################################################################################################################
###################################################    
#################################################################################################################################
  
  $Start_Date_Print = $Start_Date ; $TotalCount = "0"; $MonthData_Send = array();
  for ($x = 1; $x <= $Countdayforloop ; $x++) {
  $SQL = "SELECT * FROM complaint WHERE state = '1' and cust_id = '$CustMembers_Id' and  date_add = '$Start_Date_Print'  ";
 
  $already = $db->H_Total_Count($SQL);
 
  $MonthData =  array(ConvertDateToCalender_chart($Start_Date_Print), $already); 
  array_push($MonthData_Send,$MonthData);  
  $Start_Date_Print = ($Start_Date_Print + 86400 ) ;  
  $TotalCount = $TotalCount +  $already ;
  }
  
  if($TotalCount != '0'){
  $Arr = array('F_Name'=> 'Monthly'.$x,'Color'=> "#7cbf69" ,'Label'=>"الاجمالى", 'M_Send' => $MonthData_Send,'Total'=> $TotalCount );
  $Chart_Count_Follow = Chart2019_One_Arr($Arr);
  Chart30_View($Chart_Count_Follow['jsonFile']);
  }
  
  
  }else{
        echo '<div style="clear: both!important;"></div>'.BR.BR;
        Alert_NO_Content();
  }
     
  






###########################################################<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
Close_Page();

?>