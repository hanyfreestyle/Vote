<div class="DeletePageDiv">
<?php
if(!defined('WEB_ROOT')) {	exit;}
###########################################################>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#OPen_Page($PageTitle);
$row = $db->H_CheckTheGet("id","id","survey","2");
$cat_id = $row['id'];

$count_survey_list = $db->H_Total_Count("select id from survey_list where cat_id = '$cat_id'");



if(isset($_GET['Confirm'])){

    if($count_survey_list != '0'){
        $db->H_DELETE_Filte_With_Filde("survey_list","cust_id",$cat_id);
    }

    $db->H_DELETE_Filte_With_Filde("survey","id",$row['id']);
    Redirect_Page_2("index.php?view=SurveysList");
}else{
    PrintConfMass($count_survey_list,"من قائمة الاجابات ");
    New_Print_Alert("4",$AdminLangFile['mainform_confirm_dell_mass']." ".$row['name']);
    PrintDeleteButConfirm("SurveysList","SurveysDelete&id=".$row['id']);
}



function PrintConfMass($Vall,$SendMass){
    if(intval($Vall) != '0'){
        $Mass = " سيتم حذف عدد "." ".$Vall." ".$SendMass ;
        New_Print_Alert("2",$Mass);
    }
}
###########################################################<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
#Close_Page();
?>
</div>

