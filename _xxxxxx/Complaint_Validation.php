<?php
$Complaint_ID = intval($WebMeta['id']);	



$SQL_Line = "SELECT * FROM complaint WHERE id = '$Complaint_ID' " ;
$ComplaintRow = $db->H_SelectOneRow($SQL_Line);

$Customer_ID = $ComplaintRow['cust_id'];
$SQL_Line = "SELECT * FROM customer WHERE id = '$Customer_ID' " ;
$CustomerRow = $db->H_SelectOneRow($SQL_Line);


/*
echo "Hi".BR;
$EmailConfig = GetEmailConfig("2"); 
print_r3($EmailConfig);

$EmailData =array(
        'ReplyTo_Email'=> "noreplay@josor.net",
        'ReplyTo_Name'=> "noreplay@josor.net",
        'SendTo_Email'=> "hany.freestyle4u@gmail.com",
        'SendTo_Name'=> "Hany Darwish" ,
        'Subject'=> "Test ".time(),
        'Message'=> "hi",      
);
    
Send_STMP_Email($EmailConfig,$EmailData,array('Debug'=>"2"));
echo BR."Send".BR;
 */
#################################################################################################################################
###################################################    Customer Info
#################################################################################################################################
echo '<div class="container"><div class="row">';
echo '<div class="col-md-12 Customer_Name Font01">'.$CustomerRow['name'].'</div>';

####################################################################### View Logo 
if($CustomerRow['photo']){
$Path = WEBSITE_IMAGE_DIR_V.$CustomerRow['photo'] ;
echo '<div class="col-md-12 Customer_Logo">';
echo '<img src="'.$Path.'" />';
echo ' </div>';    
}


if($ComplaintRow['state'] == '0'){
####################################################################### View Mass
echo '<div style="clear: both!important;"></div>';
echo '<div class="col-md-12 Customer_Mass Font01 ">';
echo $ALang['validation_confirm_mass'];
echo '</div>';
}


echo '</div></div>';



if($ComplaintRow['state'] == '0'){
require_once 'Complaint_Validation_Inc.php';    
}elseif($ComplaintRow['state'] == '1'){
echo '<div style="clear: both!important;"></div>';
echo '<div class="col-md-12 Thanks_Mass Font01 ">';
  


echo '<div class="alert alert_Thanks ">';
echo nl2br($ALang['validation_thanks_mass']); 
echo '</div>';


echo '</div>';


}




 
 	
?>