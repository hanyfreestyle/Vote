<?php
###########################################################>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
OPen_Page($PageTitle);
/*
include('phpqrcode/qrlib.php'); 

$codeContents = "freestyle4u.com";
$FullUrl = QRcode::png($codeContents, false , QR_ECLEVEL_L, 150,1,true); 

*/


include('phpqrcode/qrlib.php'); 
define('EXAMPLE_TMP_SERVERPATH', 'phpqrcode/temp/');
define('EXAMPLE_TMP_URLRELPATH', 'phpqrcode/temp/');
 $tempDir = EXAMPLE_TMP_SERVERPATH; 
 $Url = "http://josor.net/v/".'XPF2EVH2VKAYY7DU';
 $codeContents = $Url ;
 
 QRcode::png($codeContents, $tempDir.'023.png', QR_ECLEVEL_L, 20); 
 echo '<img src="'.EXAMPLE_TMP_URLRELPATH.'023.png" />'; 
 
 
 
###########################################################<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
Close_Page();
?>