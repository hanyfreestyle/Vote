<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">
<style>
body{
background-color:#3f6c91;
color: #fff!important;
font-family: 'Tajawal', sans-serif!important;
}
.NameMass{
  color: #fff!important;  
}
.Customer_Mass{
line-height: 40px!important;    
font-family: 'Tajawal', sans-serif!important;
}
</style>
<?php
$Customer_ID = intval($WebMeta['id']);	

$SQL_Line = "SELECT * FROM customer WHERE id = '$Customer_ID' " ;
$CustomerRow = $db->H_SelectOneRow($SQL_Line);
 
$MobileErr = "";


if(isset($_POST['SaveData'])){
    $PhoneNumber = Clean_Mypost($_POST['cust_mobile']) ;
    $PhoneValidate =  $PhoneNumber[0].$PhoneNumber[1];

    if($PhoneValidate == '05'){
        SendFormData();
    }else{
        $MobileErr = $ALang['hform_add_mobileerr'];
    }
} 




#################################################################################################################################
###################################################    Customer Info
#################################################################################################################################
echo '<div class="container NewStyle"><div class="row">';
#echo '<div class="col-md-12 Customer_Name Font01">'.$CustomerRow['name'].'</div>';


####################################################################### View Logo 
if($CustomerRow['photo']){
$Path = WEBSITE_IMAGE_DIR_V.$CustomerRow['photo'] ;
echo '<div class="col-md-12 Customer_Logo">';
echo '<img src="'.$Path.'" />';
echo ' </div>';    
}

####################################################################### View Mass
echo '<div style="clear: both!important;"></div>';
echo '<div class="col-md-12 Customer_Mass Font01 ">';
echo $ALang['hform_add_mainmass'];
echo '</div>';


echo '</div></div>';



#################################################################################################################################
###################################################    Start Form
#################################################################################################################################
echo '<div style="clear: both!important;"></div>';
 
echo '<form method="post" action="#"  id="validate-form" data-parsley-validate >';

//hidden
echo '<input type="hidden" value="'.$Customer_ID.'" name="cust_id" id="Cust_id" />';
echo '<input type="hidden" value="'.$CustomerRow['name_m'].'" name="cust_url" id="cust_url" />';
 
#################################################################################################################################
###################################################    Complaint Id
#################################################################################################################################
$Complaint_Type = explode('-',$CustomerRow['complaint_id']);
$Complaint_Type =  array_filter($Complaint_Type);
$Complaint_Sql =  UnitTypeFilter_Form_From_One($Complaint_Type);

$Lsit_SQL_Line = "SELECT id,name FROM config_data where cat_id  = 'Complaint' $Complaint_Sql " ;
$Arr = array("Label" => 'off' ,'SQL_Line_Send'=> $Lsit_SQL_Line );      
$Err[] = NF_PrintSelect_2018("Chosen",$ALang['hform_add_fcomplaint'],"col-md-12","complaint_id","","req",0,$Arr);	



#################################################################################################################################
###################################################    City ID
#################################################################################################################################
$City_Type = explode('-',$CustomerRow['citylist_id']);
$City_Type =  array_filter($City_Type);
$City_Sql =  UnitTypeFilter_Form_From_One($City_Type);

$Lsit_SQL_Line = "SELECT * FROM config_data where cat_id = 'City' $City_Sql" ;
$Arr = array("Label" => 'off' ,'SQL_Line_Send'=> $Lsit_SQL_Line );      
$Err[] = NF_PrintSelect_2018("Chosen",$ALang['hform_add_fcity'],"col-md-12","city_id","","req",0,$Arr);	



#################################################################################################################################
###################################################    Area ID
#################################################################################################################################
echo '<input type="hidden" value="'.$CustomerRow['branchlist_id'].'" name="area_list" id="Area_List" />';


if(isset($_POST['area_id']) and  intval($_POST['area_id'])!= '0' and intval($_POST['city_id'])!= '0' ){
$IDList = intval($_POST['area_id']) ;    
}else{
$IDList = "0";
}

$Lsit_SQL_Line = " SELECT * FROM config_data where id = '$IDList'  " ; 
$Arr = array("Label" => 'off' ,'SQL_Line_Send'=> $Lsit_SQL_Line );      
$Err[] = NF_PrintSelect_2018("Chosen",$ALang['hform_add_f_area'],"col-md-12","area_id","","req",0,$Arr);	
echo '<div class="form-group col-md-12" ><div id="area_text"></div></div>';

 

#################################################################################################################################
###################################################    Customer Mobile
#################################################################################################################################
$MoreS = array('Col' => "col-md-12",'Placeholder'=> $ALang['hform_add_fmobile'],'required' => 'required data-parsley-type="number" '.MOBILE_REQUIRED_TYPE );
$Err[] = NF_PrintInput("Numbers","","cust_mobile","0","1","req",$MoreS);
echo '<div class="form-group col-md-12" ><span class="MobileErr">'.$MobileErr.'</span></div>';
 



#################################################################################################################################
###################################################     Customer Name
#################################################################################################################################
echo '<div class="form-group col-md-12" ><span class="NameMass">'.$ALang['hform_add_fname_mass'].'</span></div>';
$MoreS = array('Col' => "col-md-12",'Placeholder'=> $ALang['hform_add_fname'],'required' => '');
$Err[] = NF_PrintInput("Text","","cust_name","0","1","optin",$MoreS);

 
echo '<div class="form-group col-md-12">';
echo '<button class="btnx btn-default_x" name="SaveData" type="submit">'.$ALang['hform_add_fsend'].'</button>';
echo '</div>';


echo '</div></div></form> ';








?>
