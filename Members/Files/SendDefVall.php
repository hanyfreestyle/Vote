<?php
$EmployeeRow = $db->H_CheckTheGet("id","id","employee","2");

$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$DomainNameIs = urldecode($protocol . $_SERVER['HTTP_HOST']) ;

$ev_Url = $DomainNameIs.'/Evaluation/'. $EmployeeRow['name_m'];
$PrintMassView = " عزيزى العميل ... لقد تشرف الفنى ";
$PrintMassView .= '<span class="sms_emp_name">'.$EmployeeRow['name'].'</span>';
$PrintMassView .= " بخدمتكم .. نرجو التكرم بتقييمة من خلال التفاعل مع الرابط التالى : ";
$PrintMassView .=  '<br/><span class="sms_emp_url">'.$ev_Url.'</span>' ;
$MobileErr = "";

$PageUrl_employees = $MembersPathHome."Employees/index.php?view=EmployeesList";

?>