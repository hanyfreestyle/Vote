<?php
###########################################################>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
OPen_Page($PageTitle);
if(isset($_GET['id'])){
    
$name_m = Url_Slug($_GET['id']);     
$SqlLine =  "select * from complaint where state = '1' and  cust_id = '$CustMembers_Id' and name_m = '$name_m' ";

$already = $db->H_Total_Count($SqlLine);
if($already == '1'){
$row = $db->H_SelectOneRow($SqlLine);
////////////////////////////////////Load
$CONFIG_DATA_Arr  =  LoadTabelData_To_Arr("1","config_data");

New_Print_Alert("5",$ALang['member_view_complaint_h1']); 


Form_Open();

$FullTime = PrintFullTime($row['date_time']);
PrintFildComplaint("col-md-12",$ALang['member_list_date_add'],$FullTime);

PrintFildComplaint("col-md-12",$ALang['member_list_custname'],$row['cust_name']);
PrintFildComplaint("col-md-12",$ALang['member_list_cust_mobiel'],$row['cust_mobile']);


$complaint_id =  findValue_FromArr($CONFIG_DATA_Arr,"id",$row['complaint_id'],"name");
$city_id =  findValue_FromArr($CONFIG_DATA_Arr,"id",$row['city_id'],"name");
$area_id =  findValue_FromArr($CONFIG_DATA_Arr,"id",$row['area_id'],"name");


PrintFildComplaint("col-md-12",$ALang['member_list_complaint_2'],$complaint_id);
PrintFildComplaint("col-md-12",$ALang['member_list_city'],$city_id);
PrintFildComplaint("col-md-12",$ALang['member_list_area'],$area_id);
 

echo '<div style="clear: both!important;"></div>';


Update_Complaint_View($row);  
#################################################################################################################################
###################################################    
################################################################################################################################# 
echo '<div style="clear: both!important;"></div>'.BR;

$MoreS = array('Col' => "col-md-6",'Placeholder'=> "",'required' => 'required', 'Dir'=> "Ar_Lang" );
$Err[] = NF_PrintInput("Text","الاسم","name","","","req",$MoreS);



$MoreS = array('Col' => "col-md-6",'Placeholder'=> "",'required' => 'required data-parsley-type="email"', 'Dir'=> "En_Lang" );
$Err[] = NF_PrintInput("Text",$AdminLangFile['webconfig_email_email'],"sitemail","","","req-email",$MoreS);



 
Form_Close_99("ارسال");

if(isset($_POST['B1'])){
Vall($Err,"SendEmailToSiteAdmin",$db,"1","1");
}



}
   
}

###########################################################<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
Close_Page();
 
#################################################################################################################################
###################################################    SendEmailToSiteAdmin
#################################################################################################################################
function SendEmailToSiteAdmin($db){
     global $ALang;
     global $row ;
     
    
     $SMS_Config   = $db->H_SelectOneRow( "select * from config_sms ");
     $EmailConfig = GetEmailConfig($SMS_Config['email_account']);
     $Email_SendTo = Clean_Mypost($_POST['sitemail']);
     $Email_SendToName =  Clean_Mypost($_POST['name']);
     $Email_Subject = $SMS_Config['email_subject'];
    
     $CONFIG_DATA_Arr  =  LoadTabelData_To_Arr("1","config_data");
     $FullTime = PrintFullTime($row['date_time']);
     $complaint_id =  findValue_FromArr($CONFIG_DATA_Arr,"id",$row['complaint_id'],"name");
     $city_id =  findValue_FromArr($CONFIG_DATA_Arr,"id",$row['city_id'],"name");
     $area_id =  findValue_FromArr($CONFIG_DATA_Arr,"id",$row['area_id'],"name");


 
     $Email_Message = "";
     $Email_Message .= '<body dir="rtl" >';
     $Email_Message .= Print_Email_Line($ALang['member_list_date_add'],$FullTime); 
     $Email_Message .= Print_Email_Line($ALang['member_list_custname'],$row['cust_name']);
     $Email_Message .= Print_Email_Line($ALang['member_list_cust_mobiel'],$row['cust_mobile']);  
     $Email_Message .= Print_Email_Line($ALang['member_list_complaint_2'],$complaint_id);
     $Email_Message .= Print_Email_Line($ALang['member_list_city'],$city_id);
     $Email_Message .= Print_Email_Line($ALang['member_list_area'],$area_id);
                    
     $Email_Message .='<p><br>&nbsp;</p></body>';     
     
     $EmailData =array(
        'ReplyTo_Email'=> $EmailConfig['setFrom_Email'],
        'ReplyTo_Name'=> $EmailConfig['setFrom_Name'],
        'SendTo_Email'=> $Email_SendTo,
        'SendTo_Name'=> $Email_SendToName ,
        'Subject'=> $Email_Subject,
        'Message'=> $Email_Message,      
    );
    
    Send_STMP_Email($EmailConfig,$EmailData);
    Redirect_Page_2("index.php?view=ComplaintList")  ;
} 

#################################################################################################################################
###################################################    Form_Close_99
#################################################################################################################################
function Form_Close_99($But_Name){
    global $AdminLangFile;
    echo '<div class="col-md-12 col-sm-12 col-xs-12 form-group">';
    echo '<input type="submit" name="B1" class="ArButForm btn btn-default" value="'.$But_Name.'" />';
    echo '</div>';
    echo '</form>';
    echo '</div>';
}

#################################################################################################################################
###################################################    Print_Email_Line
#################################################################################################################################
function Print_Email_Line($Name,$Vall){
    $Line = '<p><b><font face="Tahoma" size="2" color="#FF0000">'.$Name.'</font></b><br>
    <font face="Tahoma" size="2">'.$Vall.'</font></p>';
    return $Line ;
}	
?>