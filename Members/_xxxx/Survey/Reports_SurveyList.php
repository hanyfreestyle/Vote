<?php
if(!defined('WEB_ROOT')) {	exit;}
###########################################################>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
OPen_Page($PageTitle);

 

$CustIId = $Members_Row['id'];


$T_ARRAY_CONFIG_DATA = $db->SelArr("SELECT id,name FROM survey_list where cust_id = '$CustIId' ");
#print_r3($T_ARRAY_CONFIG_DATA);
 
#################################################################################################################################
###################################################    
#################################################################################################################################
$ChartMoreConfig = array("Limit_View"=>"10","StopViewOneRecord"=>'0');

$List_Survey_SQL = "SELECT * FROM survey WHERE cust_id = '$CustIId' "; 
$already = $db->H_Total_Count($List_Survey_SQL);
if($already > 0) {

    $Name = $db->SelArr($List_Survey_SQL);
    for($i = 0; $i < count($Name); $i++) {
    # echo $Name[$i]['name'].BR;    
        $SurveyId = $Name[$i]['id'];
        $FilterSqlLine = "select * from survey_vote where cust_id = '$CustIId' and cat_id = '$SurveyId' ";
        $TotalCount = $db->H_Total_Count($FilterSqlLine);
        $Name_2 = $db->SelArr($FilterSqlLine);
        $FilterFilde = "vote";
        $ChartTitel = $ALang['member_list_complaint'];
        $TabelArr =  GetChartVallFromArr_2018($Name_2,$FilterFilde,$T_ARRAY_CONFIG_DATA);
        $Arr = array("Tabel"=>$TabelArr,"TotalCount"=>$TotalCount,"RowCount"=>$RowCount,"Col"=> "col-md-4" ,"DefClear"=>'3');
        $RowCount = CharPrintArr_2019($FilterFilde."_".$SurveyId,$Name[$i]['name'].' ('.$TotalCount.')',$Arr+$ChartMoreConfig);
    } 

}

###########################################################<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
Close_Page();
?>