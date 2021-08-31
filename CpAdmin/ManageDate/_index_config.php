<?php
if(!defined('WEB_ROOT')) {	exit;}
 

define('USERPERMATION',"managedate");
define('USERPERMATION_ADD',"managedate_add");
define('USERPERMATION_EDIT',"managedate_edit");
define('USERPERMATION_DELL',"managedate_dell");
define('CONFIGTABEL',"managedate_config");
$ThisMenuIs = strtoupper('managedate');

$ConfigTabel = CONFIGTABEL;
 


define('ADD_EN',ADMIN_ADD_EN_FILDE);

$Module_H1 = $AdminLangFile['managedate_main_h1']." | " ;  #********* Edit *********#


$SecArr_City = array(
    "H1"=>$ALang['managedate_city_but'],
    "MainUrl"=> "City",
    'Fs_CatId'=> "City",
    "Fs_Subtabel"=> 'customer',
    "Fs_Subtabel_Filde" => 'branch',
);
$SecArr_Area = array(
    "H1"=>$ALang['managedate_area_but'],
    "MainUrl"=>"Area",
    'Fs_CatId'=> "Area", 
    "Dell_S"=>'1',
    "Fs_Subtabel"=>'complaint',
    "Fs_Subtabel_Filde"=>'area_id',
    'SubTabelType'=> "1",
    'SubTabelName'=> "config_data",
    'Filter_Filde'=> "cat_id",
    'SubTabel_CatId'=> "City",
);




#################################################################################################################################
###################################################    Payment
#################################################################################################################################

// $ALang['managedate_complaint_but']

$SecArr_Complaint = array(
    "H1"=> "الشكاوى",
    "MainUrl"=> "Complaint",
    'Fs_CatId'=> "Complaint",
    "Fs_Subtabel" => 'customer',
    "Fs_Subtabel_Filde"=> 'complaint_id',
);

/*
#################################################################################################################################
###################################################    Branch
#################################################################################################################################
$SecArr_Branch = array(
    "H1"=>$ALang['managedate_branch_but'],
    "MainUrl"=> "Branch",
    'Fs_CatId'=> "f_branch",
    "Fs_Subtabel"=> 'customer',
    "Fs_Subtabel_Filde" => 'branch',
);

#################################################################################################################################
###################################################    Sales Empl
################################################################################################################################# 
$SecArr_SalesEmpl = array(
    "H1"=> $ALang['managedate_sales_empl'] , 
    "MainUrl"=>"SalesEmpl",
    'Fs_CatId'=> "sales_empl", 
    "Dell_S"=>'0',
    "Fs_Subtabel"=>'customer',
    "Fs_Subtabel_Filde"=>'',
);


#################################################################################################################################
###################################################    SecArr ProductCat
#################################################################################################################################
$SecArr_ProductCat = array(
    "H1"=> $ALang['managedate_but_pro_cat'] , 
    "MainUrl"=>"ProductCat",
    'Fs_CatId'=> "product_cat",
    "Dell_S"=>'0',
    "Fs_Subtabel"=>'customer',
    "Fs_Subtabel_Filde"=>'id',
);

$SecArr_Product = array(
    "H1"=> $ALang['managedate_but_pro'] ,
    "MainUrl"=>"Product",
    'Fs_CatId'=> "product", 
    "Dell_S"=>'0',
    "Fs_Subtabel"=>'customer',
    "Fs_Subtabel_Filde"=>'id',
    'SubTabelType'=> "1",
    'SubTabelName'=> "config_data",
    'Filter_Filde'=> "cat_id",
    'SubTabel_CatId'=> "product_cat",
);

#################################################################################################################################
###################################################    Customer Type
#################################################################################################################################
$SecArr_Customer = array(
    "H1"=> "انوع العملاء",
    "MainUrl"=>"CustType",
    'Tabel_Type'=>'No',
    'TabelName'=> 'fd_cust_type',
    "Dell_S"=>'0',
    "Fs_Subtabel"=>'customer',
    "Fs_Subtabel_Filde"=>'cust_type',
);
$SecArr_SubCustomer = array(
    "H1"=> "تصنيف العملاء",
    "MainUrl"=>"SubCustType",
    'Fs_CatId'=> "cust_type_2", 
    'SubTabelType'=> "1",
    'SubTabelName'=> "fd_cust_type",
    'Filter_Filde'=> "",
    'SubTabel_CatId'=> "",
    "Dell_S"=>'0',
    "Fs_Subtabel"=>'customer',
    "Fs_Subtabel_Filde"=>'cust_type_2',
);

#################################################################################################################################
###################################################    Customer Filter
#################################################################################################################################
$SecArr_CustFilter_1 = array(
    "H1"=>$ALang['cust_custfilter_1'],
    "MainUrl"=>"CustFilter1",
    'Fs_CatId'=> "filter_1",
    "Fs_Subtabel"=>'customer',
    "Fs_Subtabel_Filde"=>'filter_1',
);

$SecArr_CustFilter_2 = array(
    "H1"=>$ALang['cust_custfilter_2'],
    "MainUrl"=>"CustFilter2",
    'Fs_CatId'=> "filter_2",
    "Fs_Subtabel"=>'customer',
    "Fs_Subtabel_Filde"=>'filter_2',
);

$SecArr_CustFilter_3 = array(
    "H1"=>$ALang['cust_custfilter_3'],
    "MainUrl"=>"CustFilter3",
    'Fs_CatId'=> "filter_3",
    "Fs_Subtabel"=>'customer',
    "Fs_Subtabel_Filde"=>'filter_3',
);
  
#################################################################################################################################
###################################################    Country 
#################################################################################################################################
$LevelNames =array('1'=> $ALang['managedate_country_h1'] ,'2'=> $ALang['managedate_city_h1'],'3'=> $ALang['managedate_area_h1'],'4'=> "المنطقة الفرعية",);
$LevelCatId =array('1'=> "Country" ,'2'=> "City",'3'=> "Area",'4'=> "AreaSub");

$SecArr_Country = array(
    "H1"=> $ALang['managedate_country_but'],
    "MainUrl" => "Country",
    'Fs_CatId' => "Country",
    "ThisLevel"=>"0", 
    "LevelNames" => $LevelNames ,
    "LevelCatId" => $LevelCatId ,
    "Dell_S"=>'1',
    "Fs_Subtabel"=>'customer',
    "Fs_Subtabel_Filde"=>'country_id',
);

$SecArr_City = array(
    "H1"=>$ALang['managedate_city_but'] ,  
    "MainUrl"=>"City",  
    'Fs_CatId'=> "City",   
    "ThisLevel"=>"1",  
    "LevelNames" => $LevelNames ,
    "LevelCatId" => $LevelCatId ,
    "Dell_S"=>'1',
    "Fs_Subtabel"=>'customer',
    "Fs_Subtabel_Filde"=>'city_id',
    
);
$SecArr_Area = array(
    "H1"=>$ALang['managedate_area_but'] ,  
    "MainUrl"=>"Area",  
    "Fs_CatId" => "Area",   
       
    
   
   
    "ThisLevel"=>"2", // Main Url
    "LevelNames" => $LevelNames , 
    "LevelCatId" => $LevelCatId ,

);







#################################################################################################################################
###################################################    
#################################################################################################################################


#################################################################################################################################
###################################################    
#################################################################################################################################


#################################################################################################################################
###################################################    
#################################################################################################################################








/*
 








$SecArr_AreaSub = array(
    "H1"=>"مناطق فرعة" , ///$ALang[''],

    'Fs_CatId'=> "AreaSub",  //
        // Url
    "MainUrl"=>"AreaSub", // Main Url 
   
   
    "ThisLevel"=>"3", // Main Url
    "LevelNames" => $LevelNames , 
    "LevelCatId" => $LevelCatId ,

);

$SecArr_Street = array(
    "H1"=>"الشارع" , ///$ALang[''],

    'Fs_CatId'=> "Street",  //
        // Url
    "MainUrl"=>"Street", // Main Url 
   
   
    "ThisLevel"=>"4", // Main Url
    "LevelNames" => $LevelNames , 
    "LevelCatId" => $LevelCatId ,

); 
 */
 
?>