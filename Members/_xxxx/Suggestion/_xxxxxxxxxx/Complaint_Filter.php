<?php
###########################################################>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
OPen_Page($PageTitle);

$ThisTabelName = "complaint";
$ConfigP['datatabel'] ="0";
$PERpage = $ConfigP['perpage'] ;
$orderby = RterunOrder($ConfigP['order']) ;
$ViewPageing = "1";


$ArrTOForm = array('LabelView'=>"on","DateOff"=>'0',"Members_Row"=>$Members_Row);
Etman_Customer_FilterForm($ArrTOForm);
if(isset($_GET['Clear'])){
UnsetAllSession('Complaint_Filter_SQL');
}





if(isset($_POST['CustFliter'])){
    $EndLine =  Etman_Customer_Filter_SQl_Line() ;
    $THESQL = "SELECT * FROM $ThisTabelName where state = '1' and cust_id = '$CustMembers_Id' $EndLine $orderby";
    $THELINK = "view=".$view;
    $_SESSION['Complaint_Filter_SQL'] = $THESQL ;
}else{
    if(isset($_SESSION['Complaint_Filter_SQL'])){
        $THESQL = $_SESSION['Complaint_Filter_SQL'] ;
        $THELINK = "view=".$view;
    }else{
       $THESQL = "SELECT * FROM $ThisTabelName where id = '0' and state = '1' and cust_id = '$CustMembers_Id'  $orderby";
       $THELINK = "view=".$view;
    }
}



$already = $db->H_Total_Count($THESQL);
if($already > '0'){
Report_Block_Resulte($already,$Members_Row);

echo '<form name="myform" action="Complaint_ExportPage.php" method="post">';
echo '<input type="hidden" name="sql_line" value="'.$THESQL.'" />';
echo '<button type="submit"  name="Export_File" class="mb-sm btn btn-danger">'.$AdminLangFile['mainform_export_but'].'</button> ';
echo '</form>';


$TableView = array('Date'=> "1",'CustName'=> "1",'CustMobile'=> "1",'Complaint'=> "1",'City'=> "1",'Area'=> "1");
require_once "../_Page/List_Complaints_Inc.php";
}else{
    echo '<div style="clear: both!important;"></div>'.BR.BR;
    Alert_NO_Content();
}
   




###########################################################<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
Close_Page();	

?>