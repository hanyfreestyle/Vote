<?php
if(!defined('WEB_ROOT')) {	exit;}

###########################################################>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
OPen_Page($PageTitle);

$SectionName = "cust";
$ThisTabelName = "customer";
$ConfigP['datatabel'] = $ConfigP['datatabel_'.$SectionName];
$PERpage = $ConfigP['perpage_'.$SectionName] ;
$orderby = RterunOrder($ConfigP['order_'.$SectionName]) ;
$DataTabelId = RterunOrder_DataTabel($ConfigP['order_'.$SectionName]) ;
$ActiveMode =  Rterun_ActiveMode($ConfigP['activemode_'.$SectionName])  ;
 

$THESQL = "SELECT * FROM $ThisTabelName where id != '0'  $orderby ";
$THELINK = "view=".$view;



$already = $db->H_Total_Count($THESQL);
if ($already > 0){
  
 

    
    if($already > $ConfigP['datamax_'.$SectionName]){
            $ConfigP['datatabel'] = '0';
    }
    
require_once 'Customer_List_Inc.php';

}else{ 
Alert_NO_Content();         
}


###########################################################<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
Close_Page();
?>
