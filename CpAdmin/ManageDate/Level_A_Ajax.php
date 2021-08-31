<?php
require_once '../include/inc_reqfile.php';


if(isset($_GET["level_1ID"]) && !empty($_GET["level_1ID"])){

    $level_1ID =  $_GET["level_1ID"] ;
    $TabelName = $_GET["tabelName"];
    $leavel2_Catid = $_GET['leavel2_Catid'];

    echo '<option value="">'.$ALang['mainform_pls']." ".$_GET['leavel2_Name'].'</option>';
    $Name = $db->SelArr("SELECT * FROM $TabelName where cat_id = '$leavel2_Catid' and state = '1' and  level_1 = '$level_1ID' ");
    for($i = 0; $i < count($Name); $i++) {
        echo '<option value="'.$Name[$i]['id'].'">'.$Name[$i][$NamePrint].'</option>';
    }

}


if(isset($_GET["level_2ID"]) && !empty($_GET["level_2ID"])){

    $level_2ID =  $_GET["level_2ID"] ;
    $TabelName = $_GET["tabelName"];
    $leavel3_Catid = $_GET['leavel3_Catid'];

    echo '<option value="">'.$ALang['mainform_pls']." ".$_GET['leavel3_Name'].'</option>';
    $Name = $db->SelArr("SELECT * FROM $TabelName where cat_id = '$leavel3_Catid' and state = '1' and  level_2 = '$level_2ID' ");
    for($i = 0; $i < count($Name); $i++) {
        echo '<option value="'.$Name[$i]['id'].'">'.$Name[$i][$NamePrint].'</option>';
    }

}

if(isset($_GET["level_3ID"]) && !empty($_GET["level_3ID"])){

    $level_3ID =  $_GET["level_3ID"] ;
    $TabelName = $_GET["tabelName"];
    $leavel4_Catid = $_GET['leavel4_Catid'];

    echo '<option value="">'.$ALang['mainform_pls']." ".$_GET['leavel4_Name'].'</option>';
    $Name = $db->SelArr("SELECT * FROM $TabelName where cat_id = '$leavel4_Catid' and state = '1' and  level_3 = '$level_3ID' ");
    for($i = 0; $i < count($Name); $i++) {
        echo '<option value="'.$Name[$i]['id'].'">'.$Name[$i][$NamePrint].'</option>';
    }

}


?>