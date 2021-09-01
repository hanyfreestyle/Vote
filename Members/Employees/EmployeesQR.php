<?php
$ThisIsTest = "1";
require_once '../include/inc_reqfile.php';
include('phpqrcode/qrlib.php'); 
$Members_Row  =  Members_CheckUser();

$row = $db->H_CheckTheGet("id","name_m","employee","2");
$CustomerIDD = $row['id'];


 
$Url = EVALUATION_URL.$row['name_m'];
$GetImage = QRcode::png($Url, false , QR_ECLEVEL_L, 150,1,false);
 

 
if($ThisIsTest == '0'){
$FullUrl = 'http://'.$_SERVER['HTTP_HOST'].WEB_ROOT.$AdminFolder."Customer/Customer_Branch_QR.php?id=".$CustomerIDD ;  
header('Content-Type: image/png');
header('Content-Disposition: attachment; filename="CustomerId_'.$CustomerIDD.'.png"');
$image = file_get_contents($FullUrl);
header('Content-Length: ' . strlen($image));
echo $image;    
}



 

 
?> 

