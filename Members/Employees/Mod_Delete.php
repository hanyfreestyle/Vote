<div class="page_h1"><?php echo $PageTitle ?></div>
<div style="clear: both!important;"></div>
<?php
if(!defined('WEB_ROOT')) {	exit;}
###########################################################>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
OPen_Page($PageTitle);
$row = $db->H_CheckTheGet("id","id","employee","2");
$cat_id = $row['id'];

#$count_survey_list = $db->H_Total_Count("select id from survey_list where cat_id = '$cat_id'");



if(isset($_GET['Confirm'])){
    /*
        if($count_survey_list != '0'){
            $db->H_DELETE_Filte_With_Filde("survey_list","cust_id",$cat_id);
        }
    */

    Image_Dell("2",$row['id'],F_PATH_D,"employee","photo","photo_t");
    
    $db->H_DELETE_Filte_With_Filde("employee","id",$row['id']);
   
    
    Redirect_Page_2("index.php?view=EmployeesList");
}else{
    #PrintConfMass($count_survey_list,"من قائمة الاجابات ");
    New_Print_Alert("4",$AdminLangFile['mainform_confirm_dell_mass']." ".$row['name']);
    PrintDeleteButConfirm("EmployeesList","EmployeesDelete&id=".$row['id']);
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