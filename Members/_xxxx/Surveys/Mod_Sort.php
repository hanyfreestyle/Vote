<?php
if(!defined('WEB_ROOT')) {	exit;}
###########################################################>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
OPen_Page($PageTitle);

$cust_id = $Members_Row['id'] ;
$SQL_Line = "SELECT * FROM survey where cust_id = '$cust_id' ORDER BY postion" ;

$already = $db->H_Total_Count($SQL_Line);
if($already > '0'){

    ListPostion_File();
    if(isset($_POST["submit"])) {
        $id_ary = explode(",",$_POST["row_order"]);
        for($i=0;$i<count($id_ary);$i++) {
            $id = $id_ary[$i] ;
            $server_data = array (
                'postion'=> $i
            );
            $db->AutoExecute("survey",$server_data,AUTO_UPDATE,"id = $id");
        }
        Redirect_Page_2(LASTREFFPAGE);
    }

    echo '<form name="frmQA" method="POST" />';
    echo '<input type = "hidden" name="row_order" id="row_order" /> ';
    echo '<ul id="sortable-row">';

    $Name = $db->SelArr($SQL_Line);
    for($i = 0; $i < count($Name); $i++) {
        echo '<li id="'.$Name[$i]["id"].'">'.$Name[$i][$NamePrint].'</li>';
    }

    echo '</ul>';
    echo '<input type="submit" class="btnSave" name="submit" value="'.$ALang['mainform_save_order_but'].'" onClick="saveOrder();" />';
    echo '</form>';

}else{
    Alert_NO_Content();
}


###########################################################<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
Close_Page();
?>
