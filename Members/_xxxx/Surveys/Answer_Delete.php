<?php
if(!defined('WEB_ROOT')) {	exit;}
###########################################################>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
OPen_Page($PageTitle);
$row = $db->H_CheckTheGet("id","id","survey_list","2");
$CatId = $row['cat_id'];
$THESQL = "select * from survey_list where cat_id = '$CatId' ";
$countAnswer = $db->H_Total_Count($THESQL);
 

if($countAnswer > '2'){
    if(isset($_GET['Confirm'])){
        $db->H_DELETE_Filte_With_Filde("survey_list","id",$row['id']);
        Redirect_Page_2("index.php?view=SurveysEdit&id=".$row['cat_id']);
    }else{
        New_Print_Alert("4",$AdminLangFile['mainform_confirm_dell_mass']." ".$row['name']);
        PrintDeleteButConfirm("SurveysEdit&id=".$row['cat_id'],"DeleteAnswer&id=".$row['id']);
    }

}else{
    New_Print_Alert("4",$AdminLangFile['surveys_dell_can_not']." ".$countAnswer);
    echo '<a class="ArButForm_Dell mb-sm btn btn-warning" href="index.php?view=SurveysEdit&id='.$row['cat_id'].'">'.$AdminLangFile['mainform_canceled_but'].'</a>';
}


function PrintConfMass($Vall,$SendMass){
    if(intval($Vall) != '0'){
        $Mass = " سيتم حذف عدد "." ".$Vall." ".$SendMass ;
        New_Print_Alert("2",$Mass);
    }
}
###########################################################<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
Close_Page();
?>