<?php
if(!defined('WEB_ROOT')) {	exit;}
 
######/----------------------------------------------->>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
OPen_Page($PageTitle);

$EmailConfig = GetEmailConfig("2");

//$EmailConfig = GetEmailConfig("1");
/*
$EmailData =array(
    'ReplyTo_Email'=>"web@josor.net",
    'ReplyTo_Name'=> "بوابة جسور",
    'SendTo_Email'=>"hany.freestyle4u@gmail.com",
    'SendTo_Name'=> "hany.freestyle4u@gmail.com",
    'Subject'=> "تجربة جديدة ",
    'Message'=> "محتوى الرسالة",      
); 


    $EmailConfig =array(
    'Host'=> "smtp.mailgun.org",
    'Port'=> "587",
    'Username'=> "postmaster@mg.altaameer-co.com",
    'Password'=> "4b7298ad9e7c918dbc0f3dd0c9368338-de7062c6-8857096e",
    'ssl_type'=> "0",
    'SMTPSecure'=> "ssl",
    'setFrom_Email'=> "info@josor.net",
    'setFrom_Name'=> "info@josor.net",
    );
    
  */  
$EmailData =array(
    'ReplyTo_Email'=>"web@josor.net",
    'ReplyTo_Name'=> "بوابة جسور",
    'SendTo_Email'=>"hany.freestyle4u@gmail.com",
    'SendTo_Name'=> "Hany Darwish",
    'Subject'=> "Test 01",
    'Message'=> "Message Message Message",      
); 


print_r3($EmailConfig);
   
Send_STMP_Email($EmailConfig,$EmailData);   
 
 


 
//Send_STMP_Email($EmailConfig,$EmailData);

//Send_STMP_Email("1");
 /*
 info@bsupport.sa
 hany.freestyle4u@gmail.com
 info@freestyle4u.com
 info@freestyle4u.info
 */




$sql = "SELECT * FROM config ";
$row = $db->H_SelectOneRow($sql);

Form_Open($ArrForm);

$Err = array();  

$MainArr = array("Col"=> "col-md-6" ,"StopView" => '1','required' => '', "path"=> LOGOS_IMAGE_DIR_V ,'NewStyle'=> "DefaultLogo" ) ;




#################################################################################################################################
###################################################    Default Logo
#################################################################################################################################
echo '<div class="col-md-6 DirRight">';
New_Print_Alert("5","Default Logo");  
$FildName = "photo_logo"; $Arr = $MainArr+array("name"=> $FildName ,"photo"=> $row[$FildName]);
New_PrintFilePhoto("Edit",$Arr);

$FildName = "photo_logo_en"; $Arr = $MainArr+array("name"=> $FildName ,"photo"=> $row[$FildName]);
New_PrintFilePhoto("Edit",$Arr);
echo '</div>';

/*
#################################################################################################################################
###################################################   Developer Photo
#################################################################################################################################
echo '<div class="col-md-6">';
New_Print_Alert("5","Default Developer Photo");  

$FildName = "photo_developer"; $Arr = $MainArr+array("name"=> $FildName ,"photo"=> $row[$FildName]);
New_PrintFilePhoto("Edit",$Arr);

$FildName = "photo_developer_en"; $Arr = $MainArr+array("name"=> $FildName ,"photo"=> $row[$FildName]);
New_PrintFilePhoto("Edit",$Arr);
echo '</div>';

echo '<div style="clear: both!important;"></div>';


#################################################################################################################################
###################################################   Project  Photo
#################################################################################################################################

echo '<div class="col-md-6">';
New_Print_Alert("5","Default Project Photo");  

$FildName = "photo_project"; $Arr = $MainArr+array("name"=> $FildName ,"photo"=> $row[$FildName]);
New_PrintFilePhoto("Edit",$Arr);

$FildName = "photo_project_en"; $Arr = $MainArr+array("name"=> $FildName ,"photo"=> $row[$FildName]);
New_PrintFilePhoto("Edit",$Arr);
echo '</div>';

#################################################################################################################################
###################################################     Photo
#################################################################################################################################

echo '<div class="col-md-6">';
New_Print_Alert("5","Default Unit Photo");  

$FildName = "photo_unit"; $Arr = $MainArr+array("name"=> $FildName ,"photo"=> $row[$FildName]);
New_PrintFilePhoto("Edit",$Arr);

$FildName = "photo_unit_en"; $Arr = $MainArr+array("name"=> $FildName ,"photo"=> $row[$FildName]);
New_PrintFilePhoto("Edit",$Arr);
echo '</div>';

echo '<div style="clear: both!important;"></div>';

*/


Form_Close("2");


if(isset($_POST['B1'])){
Vall($Err,"LogosEdit",$db,"1",$GroupPermation);
}


######/<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-----------------------------------------------
Close_Page(); 
?>


 


 



 
