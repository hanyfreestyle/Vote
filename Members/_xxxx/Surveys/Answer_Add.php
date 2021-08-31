<?php
if(!defined('WEB_ROOT')) {	exit;}
###########################################################>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
OPen_Page($PageTitle);

$row = $db->H_CheckTheGet("id","id","survey","2");
$surveyIDD = $row['id'] ;
$cust_id = $row['cust_id'] ;


PrintFildInformation("col-md-6",$ALang['surveys_question'],GetNameFromID("survey",$surveyIDD,"name"));
echo '<div style="clear: both!important;"></div>';

Form_Open();
echo '<div style="clear: both!important;"></div>';
echo '<input type="hidden" value="'.$surveyIDD.'" name="cat_id" />';
echo '<input type="hidden" value="'.$cust_id.'" name="cust_id" />';

$MoreS = array('Col' => "col-md-12",'Placeholder'=> "",'required' => 'required','Dir'=> "Ar_Lang");
$Err[] = NF_PrintInput("Text",$ALang['surveys_answer'],"name","","","req",$MoreS);

Form_Close_New("1","SurveysEdit&id=".$surveyIDD);


if(isset($_POST['B1'])){
    Vall($Err,"AddNewAnswer",$db,"1",$USER_PERMATION_Add);
}


###########################################################<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
Close_Page();
?>