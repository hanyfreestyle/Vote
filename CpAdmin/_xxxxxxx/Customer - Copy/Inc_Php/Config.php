<?php
if(!defined('WEB_ROOT')) {	exit;}
 
 
 /*
AddFildeToTabel("customer","persent","sub_count","int");
AddFildeToTabel("customer","review","persent","int");
AddFildeToTabel("customer","a_review","review","int");


$TabelName = "customer";
CHANGE_Filde($TabelName,"persent","int","0");
CHANGE_Filde($TabelName,"review","int","0");
CHANGE_Filde($TabelName,"a_review","int","0");

EmptyFildes("customer","review","1");
EmptyFildes("customer","product","");
EmptyFildes("customer","product","");
*/
//


// EmptyFildes("customer","a_review","0");



###########################################################>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
OPen_Page($PageTitle);

$row = $db->H_SelectOneRow("SELECT * FROM  config_cat where cat_id = '$ConfigTabel' ");
$row =  unserialize($row['des']);
extract($row);

Form_Open();



New_Print_Alert("5",$AdminLangFile['mainform_config_h1']); 
$Err = MainConfigSection("cust","1",array('ActiveMode'=>'1')) ;
 
/*
$protype_view_Arr = array('1'=>$ALang['cust_config_protype_arr1'],"2"=>$ALang['cust_config_protype_arr2']);
$Arr = array("StartFrom" => '1',"Label" => 'on' );  


$Err[] = NF_PrintSelect_2018("ArrFrom",$ALang['cust_config_protype_add'],"col-md-3","protype_view",$protype_view_Arr,"req",$protype_view,$Arr);

NF_PrintRadio_Active ("2_Line","col-md-3",$ALang['cust_config_tape_view'],"tape_view",$tape_view);



echo '<div style="clear: both!important;"></div>'.BR.BR;
New_Print_Alert("5",$ALang['cust_config_persent_h1']); 

NF_PrintRadio_Active ("2_Line","col-md-3",$ALang['cust_ch_name'],"ch_name",$ch_name);
NF_PrintRadio_Active ("2_Line","col-md-3",$ALang['cust_ch_religion'],"ch_religion",$ch_religion);
NF_PrintRadio_Active ("2_Line","col-md-3",$ALang['cust_ch_mobile'],"ch_mobile",$ch_mobile);
NF_PrintRadio_Active ("2_Line","col-md-3",$ALang['cust_ch_address'],"ch_address",$ch_address);
NF_PrintRadio_Active ("2_Line","col-md-3",$ALang['cust_ch_product_cat'],"ch_product_cat",$ch_product_cat);

echo '<div style="clear: both!important;"></div>'.BR;



$MoreS = array('Col' => "col-md-3",'Placeholder'=> "",'required' => 'required data-parsley-type="digits" ', 'Dir'=> "En_Lang" );
$Err[] = NF_PrintInput("TextEdit",$ALang['cust_config_namecount'],"cust_namecount","","","req",$MoreS);
$Err[] = NF_PrintInput("TextEdit",$ALang['cust_address_count'],"address_count","","","req",$MoreS);


$MoreS = array('Col' => "col-md-3",'Placeholder'=> "",'required' => 'required data-parsley-type="digits" data-parsley-min="0" data-parsley-max="99" ', 'Dir'=> "En_Lang" );
$Err[] = NF_PrintInput("TextEdit",$ALang['cust_config_persent_quality'],"quality","","","req",$MoreS);

echo '<div style="clear: both!important;"></div>'.BR;


NF_PrintRadio_Active ("2_Line","col-md-3",$ALang['cust_config_active_only'],"active_only",$active_only);


echo '<div style="clear: both!important;"></div>'.BR.BR;
New_Print_Alert("5",$ALang['cust_content_view_h1']); 

NF_PrintRadio_Active ("2_Line","col-md-3",$ALang['cust_name'],"cust_name",$cust_name);
NF_PrintRadio_Active ("2_Line","col-md-3",$ALang['cust_name_2'],"cust_name_2",$cust_name_2);
NF_PrintRadio_Active ("2_Line","col-md-3",$ALang['cust_branch'],"cust_branch",$cust_branch);
NF_PrintRadio_Active ("2_Line","col-md-3",$ALang['cust_custfilter_1'],"cust_custfilter_1",$cust_custfilter_1);
NF_PrintRadio_Active ("2_Line","col-md-3",$ALang['cust_payment'],"cust_payment",$cust_payment);
NF_PrintRadio_Active ("2_Line","col-md-3",$ALang['cust_empl_name'],"cust_empl_name",$cust_empl_name);
NF_PrintRadio_Active ("2_Line","col-md-3",$ALang['cust_config_persent'],"persent",$persent);

 */



Form_Close_New("2","List");


if(isset($_POST['B1'])){
Vall($Err,"Config_Cat_only",$db,"1",$USER_PERMATION_Edit);
}

###########################################################<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
Close_Page();

?>