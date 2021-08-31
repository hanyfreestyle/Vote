<?php
if(!defined('WEB_ROOT')) {	exit;}

###########################################################>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
OPen_Page($PageTitle);

$row = $db->H_CheckTheGet("id","id","customer","2");
$cust_id = $row['id'] ;

PrintFildInformation("col-md-6",$ALang['cust_name'],$row['name']);
PrintFildInformation("col-md-6",$ALang['cust_name_2'],$row['name_2']);
echo '<div style="clear: both!important;"></div>';


 
 
$CityList_Arr = explode('-',$row['citylist_id']);
$CityList_Arr =  array_filter($CityList_Arr);


$SQl_Filter_City =  UnitTypeFilter_Form_From_One($CityList_Arr);
 
 

 
Form_Open();

$BranchList_Id = $row['branchlist_id'];
$MySQL = "SELECT * FROM config_data where cat_id = 'City' $SQl_Filter_City ";

 

$ArrData = array('Req'=> 'req','MinReq'=> '1','GroupTabelName'=> 'config_data','GroupTabelFilde'=>'pro_id');
$Err = Checkbox_2019("SQLWithGroup","branchlist_id",$MySQL,$BranchList_Id,$ArrData);
        
        


Form_Close_New("1","ListCustomer");    


 
if(isset($_POST['B1'])){
Vall($Err,"Branch_Upadte",$db,"1",$USER_PERMATION_Edit);
}



#################################################################################################################################
###################################################    
#################################################################################################################################
function Branch_Upadte($db){
    global $AdminLangFile ;
    $id = $_GET['id'];
    $ThIsIsTest = '0';
    $TabelName = 'customer';
 
    $server_data = array (
        'branchlist_id'=> SendArrToSql("branchlist_id"),
       
    );

    if($ThIsIsTest == '1'){
        print_r3($server_data);
    }else{
      $db->AutoExecute($TabelName,$server_data,AUTO_UPDATE,"id = $id");
      Redirect_Page_2(LASTREFFPAGE);
        
    }
} 


  



###########################################################<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
Close_Page(); 
?>