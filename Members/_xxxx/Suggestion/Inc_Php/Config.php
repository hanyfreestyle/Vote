<?php
###########################################################>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
OPen_Page($PageTitle);
if(!defined('WEB_ROOT')) {	exit;}

 

$row = Get_Customer_Config($CustMembers_Id);
extract($row);

Form_Open();
//
echo '<input type="hidden" value="'.$CustMembers_Id.'" name="cust_id" />';

$MoreS = array('Col' => "col-md-3",'Placeholder'=> "",'required' => 'required data-parsley-type="digits" ', 'Dir'=> "En"  ,'OnLine'=> '0');
$Err[] = NF_PrintInput("TextEdit",$ALang['mainconfig_count_unit_per_page'],"perpage","1","1","req",$MoreS);

$Arr = array("StartFrom" => '1',"Label" => 'on');
$Err[] = NF_PrintSelect_2018("ArrFrom",$ALang['mainconfig_view_content_by'],"col-md-3","order",$Order_ByList,"req",$row['order'],$Arr);


Form_Close_New("2","ComplaintList");

if(isset($_POST['B1'])){
Vall($Err,"Update_Customer_Config",$db,"1","1");
}

###########################################################<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
Close_Page();



function Update_Customer_Config($db){
    $id = $_POST['cust_id'];
    $Data = serialize($_POST);
    $server_data = array ('config'=> $Data );
    $db->AutoExecute("customer",$server_data,AUTO_UPDATE,"id = '$id'");
    Redirect_Page_2(LASTREFFPAGE);
}


?>
 