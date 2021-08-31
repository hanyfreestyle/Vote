<?php
$Customer_ID = intval($WebMeta['id']);	

$SQL_Line = "SELECT * FROM customer WHERE id = '$Customer_ID' " ;
$CustomerRow = $db->H_SelectOneRow($SQL_Line);
 
 

 




#################################################################################################################################
###################################################    Customer Info
#################################################################################################################################
echo '<div class="container"><div class="row ">';
echo '<div class="col-md-12 Customer_Name Font01">'.$CustomerRow['name'].'</div>';


####################################################################### View Logo 
if($CustomerRow['photo']){
$Path = WEBSITE_IMAGE_DIR_V.$CustomerRow['photo'] ;
echo '<div class="col-md-12 Customer_Logo">';
echo '<img src="'.$Path.'" />';
echo ' </div>';    
}

####################################################################### View Mass
echo '<div style="clear: both!important;"></div>';
echo '<div class="col-md-12 Customer_Mass Font01 ">';

$Mass = "عزيزي العميل".BR; 
$Mass .= "لقد تم ارسال ملاحظاتك من قبل، وتم استلامها".BR;
$Mass .= "شكرا لتواصلك معنا".BR;

//echo $ALang['hform_add_mainmass'];
echo $Mass ;
echo '</div>';


echo '</div></div>';











?>
