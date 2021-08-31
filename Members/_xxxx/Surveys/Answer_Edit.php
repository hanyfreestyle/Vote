<?php
if(!defined('WEB_ROOT')) {	exit;}
###########################################################>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
OPen_Page($PageTitle);

$row = $db->H_CheckTheGet("id","id","survey_list","2");
$surveyIDD = $row['cat_id'] ;
$cust_id = $row['cust_id'] ;


PrintFildInformation("col-md-6",$ALang['surveys_question'],GetNameFromID("survey",$surveyIDD,"name"));
echo '<div style="clear: both!important;"></div>';

$PageType = "Edit";


Form_Open();
echo '<div style="clear: both!important;"></div>';
echo '<input type="hidden" value="'.$surveyIDD.'" name="surveyIDD" />';

$MoreS = array('Col' => "col-md-12",'Placeholder'=> "",'required' => 'required','Dir'=> "Ar_Lang");
$Err[] = NF_PrintInput("TextEdit",$ALang['surveys_answer'],"name","","","req",$MoreS);

Form_Close_New("2","SurveysEdit&id=".$surveyIDD);


if(isset($_POST['B1'])){
Vall($Err,"EditAnswer",$db,"1",$USER_PERMATION_Edit);
}
 



 



###########################################################<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
Close_Page(); 
?>