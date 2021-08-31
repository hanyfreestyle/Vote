<?php
if(!defined('WEB_ROOT')) {	exit;}
###########################################################>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
OPen_Page($PageTitle);

$PageType = "Add";

if($PageType == 'Add'){
    $row = array();
    $EditFilde = "";
}elseif($PageType == 'Edit'){
    $EditFilde = "Edit";
}

$Def_Form_Arr = array( "PageType" => $PageType, 'EditRow' => $row);


Form_Open();

echo '<input type="hidden" value="'.$Members_Row['id'].'" name="cust_id" />';
echo '<div style="clear: both!important;"></div>';

$MoreS = array('Col' => "col-md-12",'Placeholder'=> "",'required' => 'required','Dir'=> "Ar_Lang");
$Err[] = NF_PrintInput("Text".$EditFilde,$ALang['surveys_question'],"name","","","req",$MoreS);

for ($i = 1; $i <= 7; $i++) {

    if($i >= '3'){
        $req1 = '';
        $req2 = '';
    }else{
        $req1 = 'required';
        $req2 = 'req';
    }

    $MoreS = array('Col' => "col-md-6",'Placeholder'=> "",'required' => $req1 ,'Dir'=> "Ar_Lang");
    $Err[] = NF_PrintInput("Text".$EditFilde,$ALang['surveys_answer_number']." ".$i,"optin".$i,"","",$req2,$MoreS);

}

echo '<div style="clear: both!important;"></div>';

Form_Close_New("1","SurveysList");

if(isset($_POST['B1'])){
    Vall($Err,"Add_Survey",$db,"1",USERPERMATION_ADD);
}


###########################################################<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
Close_Page();
?>