<?php
 
require_once 'library/db-config_crm.php';
require_once $AdminFolder.'library/_Inc_Files_Home.php';
 
 
if(isset($_POST["city_id"]) && !empty($_POST["city_id"])){

$CityId =  $_POST["city_id"] ;
$Cust_id = $_POST["cust_id"];

$Area_List = $_POST["area_list"];
$Area_Arr = explode('-',$Area_List);
$Area_Arr =  array_filter($Area_Arr);



/*
echo $CityId.BR;  
echo $Cust_id.BR;
echo $Area_List.BR;
print_r3($Area_Arr);
*/

echo '<option value="">الفرع</option>';  

$Name = $db->SelArr("SELECT * FROM config_data where cat_id = 'Area' and pro_id = '$CityId' ");  
for($i = 0; $i < count($Name); $i++) {
   if(in_array($Name[$i]['id'], $Area_Arr)){
    echo '<option value="'.$Name[$i]['id'].'">'.$Name[$i]['name'].'</option>';
   }
}

 
}

?>
