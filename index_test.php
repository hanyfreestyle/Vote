<?php
require_once 'library/db-config_crm.php';
require_once $AdminFolder.'library/_Inc_Files_Home.php';
$Config = GetAllConfig();

require_once '_TestDemo.php';




require_once 'Web_View.php';
require_once 'Inc_Header.php';
echo '<body style="direction: ltr; padding-left: 100px;">';


$start = strtotime("first day of previous month 00:00:00");
$end = strtotime("last day of previous month 00:00:00");
$rang = (($end - $start) / 86400 )+1;
/*
$start = strtotime("first day of previous month");
$end = strtotime("last day of previous month");
$start = strtotime("first day of this month 00:00:00");
$end = strtotime("last day of this month 00:00:00");


echo $rang .BR ;
echo  $start.BR ;
echo  $end.BR ;
echo  ConvertDateToCalender_3($start).BR;
echo  ConvertDateToCalender_3($end).BR;
#print_rxx($Config);
*/
 

for ($i = 1; $i <= $rang ; $i++) {
    
   if($i != '1'){
        $start = $start+86400 ;
   }    
   echo  $i." ". ConvertDateToCalender_3($start).BR;
   $randAddData = rand(2,5);
  
  
   for ($x = 1; $x <= $randAddData ; $x++) {
        
   # SaveVote_TestDemo('0',$start);
  }
       
   
    
}

#SaveVote_TestDemo('1',$start);


echo '</body>';
echo '</html>';



/*
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
*/
?>
