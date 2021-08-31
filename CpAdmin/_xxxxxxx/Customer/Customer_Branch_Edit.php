<?php
if(!defined('WEB_ROOT')) {	exit;}

###########################################################>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
OPen_Page($PageTitle);

$row = $db->H_CheckTheGet("id","id","customer_data","2");

$BranchId = $row['id'] ;
$cust_id = $row['cust_id'] ;
 
$row_cust = $db->H_SelectOneRow("select * from customer where id = $cust_id ");

PrintFildInformation("col-md-6",$ALang['cust_name'],$row_cust['name']);
PrintFildInformation("col-md-6",$ALang['cust_name_2'],$row_cust['name_2']);
echo '<div style="clear: both!important;"></div>';

$Err = array();
Form_Open();
 
 
//hidden
echo '<input type="hidden" value="'.$cust_id.'" name="cust_id" />';


$Arr = array("Label" => 'on',"Active" => '1', 'Order'=> "order by postion" ,"Filter_Filde"=> "cat_id" ,"Filter_Vall"=> "Area");
$Err[] = NF_PrintSelect_2018("Chosen",$ALang['cust_branch_area'],"col-md-3","area_id","config_data","req",$row['area_id'],$Arr);   
    

$MoreS = array('Col' => "col-md-6",'Placeholder'=> "",'required' => 'required ','Dir'=> "Ar_Lang");
$Err[] = NF_PrintInput("TextEdit",$ALang['cust_branch_name'],"name","1","1","req",$MoreS);
    
     

Form_Close_New("2","BranchManage&id=".$cust_id);    


if(isset($_POST['B1'])){
        Vall($Err,"Edit_Branch",$db,"1",$USER_PERMATION_Add);
}



#################################################################################################################################
###################################################    
#################################################################################################################################
function Edit_Branch($db){
    global $AdminLangFile ;
    $id = $_GET['id'];
    $ThIsIsTest = '0';
    $cust_id = PostIsset('cust_id') ;
 
    $server_data = array (
        'name'=> PostIsset('name') ,
        'area_id'=> PostIsset('area_id') ,
    );
 

    if($ThIsIsTest == '1'){
        print_r3($server_data);
    }else{
            $add_server = $db->AutoExecute("customer_data",$server_data,AUTO_UPDATE,"id = $id");
            Redirect_Page_2("index.php?view=BranchManage&id=".$cust_id);
    }
}
  



###########################################################<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
Close_Page(); 
?>