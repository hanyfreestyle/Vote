<?php
if(!defined('WEB_ROOT')) {	exit;}
###########################################################>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
OPen_Page($PageTitle);

$row = $db->H_CheckTheGet("id","id","survey_list","2");
$surveyIDD = $row['cat_id'] ;
$cust_id = $row['cust_id'] ;

 
$Cust_Info = $db->H_SelectOneRow("select * from customer where id = '$cust_id' ");
Print_Top_Survey_Menu($Cust_Info['id']);

echo '<div style="clear: both!important;"></div>';
PrintFildInformation("col-md-3",$ALang['cust_name'],$Cust_Info['name']);
PrintFildInformation("col-md-3",$ALang['cust_name_2'],$Cust_Info['name_2']);
PrintFildInformation("col-md-6","الاستبيان",GetNameFromID("survey",$surveyIDD,"name"));
echo '<div style="clear: both!important;"></div>';

$PageType = "Edit";


Form_Open();
echo '<div style="clear: both!important;"></div>';
echo '<input type="hidden" value="'.$surveyIDD.'" name="surveyIDD" />';

$MoreS = array('Col' => "col-md-12",'Placeholder'=> "",'required' => 'required','Dir'=> "Ar_Lang");
$Err[] = NF_PrintInput("TextEdit","الاجابة","name","","","req",$MoreS);

Form_Close_New("2","EditSurvey&id=".$surveyIDD);


if(isset($_POST['B1'])){
Vall($Err,"Edit_SurveyList",$db,"1",$USER_PERMATION_Edit);
}

echo '<div style="clear: both!important;"></div>';






#################################################################################################################################
###################################################   Add_Survey 
#################################################################################################################################
function Edit_SurveyList($db){
    $ThIsIsTest = '0';
    $id = $_GET['id'];
    
    $surveyIDD = PostIsset_Intval('surveyIDD');
    $server_data = array (
        'name'=> PostIsset('name'),
    );
 
    if($ThIsIsTest == '1'){
        print_r3($server_data);
    }else{
        $db->AutoExecute("survey_list",$server_data,AUTO_UPDATE,"id = $id");
        Redirect_Page_2("index.php?view=EditSurvey&id=".$surveyIDD);
    }
}






  



###########################################################<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
Close_Page(); 
?>