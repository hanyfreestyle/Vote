<?php
require_once 'Inc_Header_Members.php';
$Members_Row  =  Members_CheckUser();
$CustId = $Members_Row['id'];
$ThisCustomerRow = $db->H_SelectOneRow("SELECT * FROM customer WHERE id = '$CustId' " );
if($ThisCustomerRow['photo_t']){
    $custImg = '<img src="'.WEBSITE_IMAGE_DIR_V.$ThisCustomerRow['photo_t'].'">';
}else{
    $custImg = '';
}

if(!isset($Mobile_CenterDiv)){
    $Mobile_CenterDiv = " ";
}

if(!isset($HomeBack_mobile)){
    $HomeBack_mobile = "HomeBack_mobile";
}


?>
<body>

<?php
require_once 'reqlogo.php';
require_once 'req_Emp_Photo.php';


echo '<div class="'.$HomeBack_mobile.'">';
echo '<div class="'.$Mobile_CenterDiv.'">';
require_once $content;
echo '</div>';
echo '</div>';
?>

</body>
</html>