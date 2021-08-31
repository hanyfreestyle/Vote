<?php
if(!defined('WEB_ROOT')) {	exit;}
###########################################################>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
OPen_Page($PageTitle);

if($PageType == 'Edit'){
$row = $db->H_CheckTheGet("id","id","config_email","2");
$id = $row['id'];
extract($row);

$FildeType = "Edit";  
$ReqEdit_1 = "" ;
$ReqEdit_2 = "" ;
$ButType = "2";
}elseif($PageType == 'Add'){
$FildeType = "";
$ReqEdit_1 = "required" ;
$ReqEdit_2 = "req" ;
$ssl_type =PostIsset('ssl_type');
$ButType = "1";
}

 



Form_Open();

echo '<input type="hidden" name="charest"  value="UTF-8"/>';

$MoreS = array('Col' => "col-md-4",'Placeholder'=> "",'required' => 'required', 'Dir'=> "En_Lang" );
$Err[] = NF_PrintInput("Text".$FildeType,$AdminLangFile['webconfig_email_account_name'],"name","","","req",$MoreS);
echo '<div style="clear: both!important;"></div> ';
$MoreS = array('Col' => "col-md-4",'Placeholder'=> "",'required' => 'required data-parsley-type="email"', 'Dir'=> "En_Lang" );
$Err[] = NF_PrintInput("Text".$FildeType,$AdminLangFile['webconfig_email_email'],"sitemail","","","req",$MoreS);

$MoreS = array('Col' => "col-md-4",'Placeholder'=> "",'required' => 'required', 'Dir'=> "En_Lang" );
$Err[] = NF_PrintInput("Text".$FildeType,$AdminLangFile['webconfig_email_site_name'],"sitename","","","req",$MoreS);

$MoreS = array('Col' => "col-md-4",'Placeholder'=> "",'required' => 'required', 'Dir'=> "En_Lang" );
$Err[] = NF_PrintInput("Text".$FildeType,$AdminLangFile['webconfig_email_server_name'],"server","","","req",$MoreS);

echo '<div style="clear: both!important;"></div> ';
$MoreS = array('Col' => "col-md-4",'Placeholder'=> "",'required' => 'required data-parsley-type="digits" ', 'Dir'=> "En_Lang" );
$Err[] = NF_PrintInput("Text".$FildeType,$AdminLangFile['webconfig_email_port'],"port","","","req-num",$MoreS);



$MoreS = array('Col' => "col-md-4",'Placeholder'=> "",'required' => 'required', 'Dir'=> "En_Lang" );
$Err[] = NF_PrintInput("Text".$FildeType,$AdminLangFile['webconfig_email_username'],"user","","","req",$MoreS);


$MoreS = array('Col' => "col-md-4",'Placeholder'=> "",'required' => $ReqEdit_1, 'Dir'=> "En_Lang" );
$Err[] = NF_PrintInput("Text",$AdminLangFile['webconfig_email_password'],"pass","","",$ReqEdit_2,$MoreS);
echo '<div style="clear: both!important;"></div> ';


NF_PrintRadio_Active ("2_Line","col-md-4",$ALang['webconfig_email_ssl_type'],"ssl_type",$ssl_type);

$MoreS = array('Col' => "col-md-4",'Placeholder'=> "",'required' => '', 'Dir'=> "En_Lang" );
$Err[] = NF_PrintInput("Text".$FildeType,$AdminLangFile['webconfig_email_ssl_val'],"ssl_val","","","",$MoreS); 

Form_Close_New($ButType,"ConfigEmail"); 



if(isset($_POST['B1'])){
if($PageType == 'Edit'){
Vall($Err,"EditEmailConfig",$db,"1",$GroupPermation);    
}elseif($PageType == 'Add'){
Vall($Err,"AddEmailConfig",$db,"1",$GroupPermation);    
}

}

 




 
###########################################################<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
Close_Page(); 
?>
 