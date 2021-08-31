<?php
if(!defined('WEB_ROOT')) {	exit;}
###########################################################>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

#OPen_Page($PageTitle);
?>
<div class="page_h1"><?php echo $PageTitle ?></div>
<div style="clear: both!important;"></div>
<?php
if($PageType == 'Add'){
    $row = array();
    $EditFilde = "";
    $buttype= '1';
}elseif($PageType == 'Edit'){
    $EditFilde = "Edit";
    $row = $db->H_CheckTheGet("id","id","survey","2");
    $buttype= '2';
}

$Def_Form_Arr = array( "PageType" => $PageType, 'EditRow' => $row);



Form_Open();

echo '<input type="hidden" value="'.$Members_Row['id'].'" name="cust_id" />';
echo  '<div class="row">';
$MoreS = array('Col' => "col-md-12",'Placeholder'=> "",'required' => 'required','Dir'=> "Ar_Lang");
$Err[] = NF_PrintInput("Text".$EditFilde,$ALang['surveys_question'],"name","","","req",$MoreS);

$MoreS = array('Col' => "col-md-6",'Placeholder'=> "",'required' => 'required','Dir'=> "Ar_Lang");
$Err[] = NF_PrintInput("Text".$EditFilde,"التقييم الايجابى","vote_1","","","req",$MoreS);

$MoreS = array('Col' => "col-md-6",'Placeholder'=> "",'required' => 'required','Dir'=> "Ar_Lang");
$Err[] = NF_PrintInput("Text".$EditFilde,"التقييم السلبى","vote_0","","","req",$MoreS);
echo  '</div>';

Form_Close_New($buttype,"index.php?view=SurveysList");





if(isset($_POST['B1'])){
    if($PageType == 'Add'){
        Vall($Err,"Add_Survey",$db,"1",USERPERMATION_ADD);
    }elseif($PageType == 'Edit'){
        Vall($Err,"Edit_Survey",$db,"1",USERPERMATION_ADD);
    }
}


#Close_Page();
?>