<?php
require_once 'library/db-config_crm.php';
require_once $AdminFolder.'library/_Inc_Files_Home.php';
$Config = GetAllConfig();
$SiteConfig = $Config['SiteConfig'];
$SitePhoto  = $Config['Photo'];
$MobileTest =  $DetectMobile->isMobile();
#$MobileTest = '0';

require_once 'Web_View.php';
require_once 'Inc_Header.php'; 
echo '<body class="'.$ThisHomePage.'">';
require_once $BodyContent;
echo '</body>';
echo '</html>';
?>
