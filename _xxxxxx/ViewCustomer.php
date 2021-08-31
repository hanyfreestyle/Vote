<?php
$Customer_ID = intval($WebMeta['id']);	

$SQL_Line = "SELECT * FROM customer WHERE id = '$Customer_ID' " ;
$CustomerRow = $db->H_SelectOneRow($SQL_Line);
$CustomerIDDD = $CustomerRow['id'];

$MobileErr = "";


echo '<div class="ThisIsHomePage">';


#################################################################################################################################
###################################################    Customer Info
#################################################################################################################################
echo '<div class="container LogoView"><div class="row">';
echo '<div class="col-md-12 Customer_Name Font01">'.$CustomerRow['name'].'</div>';


####################################################################### View Logo 
if($CustomerRow['photo']){
$Path = WEBSITE_IMAGE_DIR_V.$CustomerRow['photo'] ;
echo '<div class="col-md-12 Customer_HomeLogo">';
echo '<img src="'.$Path.'" />';
echo ' </div>';    
}


####################################################################### View Mass
echo '<div style="clear: both!important;"></div>';
echo '<div class="col-md-12 Customer_Mass Font01" style="direction: rtl;">';
echo  "اهلا بك عزيزي العميل..".BR;
echo "يرجى اختيار الخدمة التي تحتاجها من الخيارات التالية..";
echo '</div>';



echo '</div></div>';


#################################################################################################################################
###################################################    Customer Info
#################################################################################################################################
echo '<div class="container"><div class="row MyHomePageIcon">';


if($CustomerRow['member_type'] == '1'){
echo '<div class="DivPng_2 col-md-12 col-sm-4 col-xl-4 ">';
echo '<a href="'.WEB_ROOT.'AddComplaint/'.$CustomerRow['name_m'].'">';
echo '<div class="MyBut Co_01 Font01">'.$ALang['new_add_complaint'].'</div>';
echo '</a></div>';
}


echo '<div class="DivPng_2 col-md-12 col-sm-4 col-xl-4 ">';
echo '<a href="'.WEB_ROOT.'AddSuggestion/'.$CustomerRow['name_m'].'">';
echo '<div class="MyBut Co_02 Font01">'.$ALang['new_add_suggestion'].'</div>';
echo '</a></div>';


$already = $db->H_Total_Count("select id from survey where cust_id = '$CustomerIDDD' and state = '1' ");
$already_2 = $db->H_Total_Count("select id from survey_list where cust_id = '$CustomerIDDD' and state = '1' ");
if($already != '0' and $already_2 != '0'){
echo '<div class="DivPng_2 col-md-12 col-sm-4 col-xl-4 ">';
echo '<a href="'.WEB_ROOT.'AddVoting/'.$CustomerRow['name_m'].'">';
echo '<div class="MyBut Co_03 Font01">'.$ALang['new_add_survey'].'</div>';
echo '</a></div>';
}



 /*
if($CustomerRow['member_type'] == '1'){
echo '<div class="DivPng col-md-12 col-sm-4 col-xl-4 ">';
echo '<a href="'.WEB_ROOT.'AddComplaint/'.$CustomerRow['name_m'].'">';
echo '<img src="'.WEB_ROOT.'assets/icon_1.jpg" />';
echo '<div class="class-name Font01">'.$ALang['new_add_complaint'].'</div>';
echo '</a></div>';
}



echo '<div class="DivPng col-md-12 col-sm-4 col-xl-4 ">';
echo '<a href="'.WEB_ROOT.'AddSuggestion/'.$CustomerRow['name_m'].'">';
echo '<img src="'.WEB_ROOT.'assets/icon_2.jpg" />';
echo '<div class="class-name Font01">'.$ALang['new_add_suggestion'].'</div>';
echo '</a></div>';


$already = $db->H_Total_Count("select id from survey where cust_id = '$CustomerIDDD' and state = '1' ");
$already_2 = $db->H_Total_Count("select id from survey_list where cust_id = '$CustomerIDDD' and state = '1' ");
if($already != '0' and $already_2 != '0'){
echo '<div class="DivPng col-md-12 col-sm-4 col-xl-4 ">';
echo '<a href="'.WEB_ROOT.'AddVoting/'.$CustomerRow['name_m'].'">';
echo '<img src="'.WEB_ROOT.'assets/icon_3.jpg" />';
echo '<div class="class-name Font01">'.$ALang['new_add_survey'].'</div>';
echo '</a></div>';
}

*/

echo '</div></div>';

echo '</div>';

?>