<?php
if(!defined('WEB_ROOT')) {	exit;}
###########################################################>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
OPen_Page($PageTitle);



if($PageType == 'Add'){
    $row = array();
    $EditFilde = "";
    $photo_t = "";
    $ButType = "1";
}elseif($PageType == 'Edit'){
    $row = $db->H_CheckTheGet("id","id","employee","2");
    $EditFilde = "Edit";
    $photo_t = $row['photo_t'];
    $ButType = "2";
}

$Def_Form_Arr = array( "PageType" => $PageType, 'EditRow' => $row);


Form_Open();

echo '<input type="hidden" value="'.$Members_Row['id'].'" name="cust_id" />';
echo '<div style="clear: both!important;"></div>';
echo '<div class="row">';
$MoreS = array('Col' => "col-md-4",'Placeholder'=> "",'required' => 'required','Dir'=> "Ar_Lang");
$Err[] = NF_PrintInput("Text".$EditFilde,$ALang['employees_f_name'],"name","","","req",$MoreS);

$MoreS = array('Col'=> "col-md-4",'required' => 'required data-parsley-type="digits" '.MOBILE_REQUIRED_TYPE , 'Dir'=> "En_Lang" );
$Err[] = NF_PrintInput("Text".$EditFilde,$ALang['employees_f_mobile'],"mobile","0","0","optin-num",$MoreS);

$MoreS = array('Col' => "col-md-4",'Placeholder'=> "",'required' => 'required' ,'Dir'=> "Ar_Lang");
$Err[] = NF_PrintInput("Text".$EditFilde,$ALang['employees_f_jop'],"jop","0","0","req",$MoreS);


echo '</div>';
#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #    Photo


#New_Print_Alert("5",$ALang['employees_photo']);
echo '<input type="hidden" value="2" name="upload_type" />';
echo '<div class="row">';
$Arr= array("Col"=> "col-md-6" ,"name"=> "photo" ,"photo"=> $photo_t ,"path"=> F_PATH_V ,'required' => '',"StopView"=>1) ;
New_PrintFilePhoto($PageType,$Arr);
echo '</div>';
echo '<div style="clear: both!important;"></div>';

echo '<div class="row">';
Form_Close_New($ButType,"index.php?view=EmployeesList");
echo '</div>';

if(isset($_POST['B1'])){
    if($PageType == 'Add'){
        Vall($Err,"EmployeesAdd",$db,"1",USERPERMATION_ADD);     
    }elseif($PageType == 'Edit'){
        Vall($Err,"EmployeesEdit",$db,"1",USERPERMATION_ADD);
    }
}


###########################################################<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
Close_Page();
?>