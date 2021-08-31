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


$Search_type = array(
'1' => $ALang['cust_search_by_name'],
'2' => $ALang['cust_search_by_name_2'],
'3' => $ALang['cust_search_by_mobile'],
'4' => $ALang['cust_search_by_email'],
//'5' => $ALang['cust_search_by_scode'],

);


echo '<div id="ErrMass" class="ErrMass_Div"></div>';
echo '<div style="clear: both!important;"></div>';
echo '<form class="FilterForm FilterFormStyle" method="POST" name="Filter" id="validate-form" data-parsley-validate >';
 

$Arr = array("StartFrom" => '1',"Label" => 'on' ,'StopListStyle'=> '1' );  
$Err[] = NF_PrintSelect_2018("ArrFrom",$ALang['cust_search_by'],"col-md-4","search_type",$Search_type,"req","",$Arr);

 
$MoreS = array('Col' => "col-md-6",'Placeholder'=> "",'required' => 'required ','Dir'=> "Ar_Lang");
$Err[] = NF_PrintInput("Text",$ALang['cust_search_name'],"name","1","1","req",$MoreS);

echo '<div style="clear: both!important;"></div>';

echo '<div style="clear: both!important;"></div>';
echo '<div class="col-md-12 col-sm-12 col-xs-12 form-group">';
echo '<input type="submit" name="CustSearch" class="ArButForm btn btn-default" value="'.$ALang['mainform_search_but'].'" />';
echo '</div>';   
 
 
echo '</form>';


$PERpage = "900";
if(isset($_POST['CustSearch'])){ 
 $Name = Clean_Mypost($_POST['name']) ;   
   
 if($_POST['search_type'] == '1'){ 
 $THESQL = "SELECT * FROM customer WHERE name like '%$Name%' ";
 }elseif($_POST['search_type'] == '2'){ 
 $THESQL = "SELECT * FROM customer WHERE name_2 like '%$Name%' ";
 
 }elseif($_POST['search_type'] == '3'){
 $THESQL = "SELECT * FROM customer WHERE ( mobile = '$Name' or  mobile_2 = '$Name' or phone = '$Name' or phone_2 = '$Name' or fax = '$Name' )";  
 }elseif($_POST['search_type'] == '4'){
   $THESQL = "SELECT * FROM customer WHERE email = '$Name' ";   
 }elseif($_POST['search_type'] == '5'){
   $THESQL = "SELECT * FROM customer WHERE s_code = '$Name' ";     
 }
 $THELINK = "view=".$view;
$already = $db->H_Total_Count($THESQL);
if($already > 0 ){
require_once 'Customer_List_Inc.php';    
}else{
Alert_NO_Content();       
}

    
    

}




 

###########################################################<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
Close_Page();
	
?>