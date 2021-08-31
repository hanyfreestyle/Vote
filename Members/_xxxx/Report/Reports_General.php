<?php
if(!defined('WEB_ROOT')) {	exit;}
###########################################################>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
OPen_Page($PageTitle);

 

$CustIId = $Members_Row['id'];



#################################################################################################################################
###################################################    
#################################################################################################################################
$ChartMoreConfig = array("Limit_View"=>"10","StopViewOneRecord"=>'0');

$ArrTOForm = array('LabelView'=>"on","DateOff"=>'0',"Members_Row"=>$Members_Row);
Etman_Customer_FilterForm($ArrTOForm);

$EndLine =  Etman_Customer_Filter_SQl_Line() ;

$SQLFiter = "select * from complaint where cust_id = '$CustIId' $EndLine " ;

$TotalCount = $db->H_Total_Count($SQLFiter) ;
 
if($TotalCount > 0) {

    $Name = $db->H_SelArrOnlyRow($SQLFiter);
    Report_Block_Resulte($TotalCount,$Members_Row);

    echo '<div style="clear: both!important;"></div>';


        $FilterFilde = "complaint_id";
        $ChartTitel = $ALang['member_list_complaint'];
        $TabelArr =  GetChartVallFromArr_2018($Name,$FilterFilde,$T_ARRAY_CONFIG_DATA);
        $Arr = array("Tabel"=>$TabelArr,"TotalCount"=>$TotalCount,"RowCount"=>$RowCount );
        $RowCount = CharPrintArr_2019($FilterFilde."_id",$ChartTitel,$Arr+$ChartMoreConfig);
       
       
        $FilterFilde = "city_id";
        $ChartTitel = $ALang['member_list_city'];
        $TabelArr =  GetChartVallFromArr_2018($Name,$FilterFilde,$T_ARRAY_CONFIG_DATA);
        $Arr = array("Tabel"=>$TabelArr,"TotalCount"=>$TotalCount,"RowCount"=>$RowCount );
        $RowCount = CharPrintArr_2019($FilterFilde."_id",$ChartTitel,$Arr+$ChartMoreConfig);
   
   
        $FilterFilde = "area_id";
        $ChartTitel = $ALang['member_list_area'];
        $TabelArr =  GetChartVallFromArr_2018($Name,$FilterFilde,$T_ARRAY_CONFIG_DATA);
        $Arr = array("Tabel"=>$TabelArr,"TotalCount"=>$TotalCount,"RowCount"=>$RowCount );
        $RowCount = CharPrintArr_2019($FilterFilde."_id",$ChartTitel,$Arr+$ChartMoreConfig);
        
                
}

###########################################################<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
Close_Page();
?>