<?php
require_once '../include/inc_reqfile.php';


if(isset($_POST["country_id"]) && !empty($_POST["country_id"])){

$Country_Id =  $_POST["country_id"] ;
echo '<option value="">'.$ALang['cust_city_op'].'</option>';   
$Name = $db->SelArr("SELECT * FROM config_data where cat_id = 'City' and state = '1' and  level_1 = '$Country_Id' ");  
for($i = 0; $i < count($Name); $i++) {
    echo '<option value="'.$Name[$i]['id'].'">'.$Name[$i][$NamePrint].'</option>';
}
    
}


if(isset($_POST["city_id"]) && !empty($_POST["city_id"])){

$City_Id =  $_POST["city_id"] ;
echo '<option value="">'.$ALang['cust_area_op'].'</option>';   
$Name = $db->SelArr("SELECT * FROM config_data where cat_id = 'Area' and state = '1' and level_2 = '$City_Id' ");  
for($i = 0; $i < count($Name); $i++) {
    echo '<option value="'.$Name[$i]['id'].'">'.$Name[$i][$NamePrint].'</option>';
}
    
}





?>