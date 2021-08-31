<?php

$ParsleyLang = "Def";
$FrontPage = '0' ;
$MobileTest = "1";


if(!defined('INCLUDE_CHECK'))die('You are not allowed to execute this file directly');
$view = (isset($_GET['view']) && $_GET['view'] != '')?$_GET['view']:'';
switch($view) {

    case 'Evaluation':
        $WebMeta = GetEvaluation_ID_FromUrl(WEB_ROOT,$MobileTest) ;
        $BodyContent = 'Evaluation_View.php';
        $ParsleyLang = "AddComplaint";
        $FrontPage = "System";
        break;


    case 'EvaluationConfirm':
        $WebMeta = GetEvaluationConfirm_ID_FromUrl(WEB_ROOT,$MobileTest) ;
        $BodyContent = 'Evaluation_Confirm.php';
        $ParsleyLang = "AddComplaint";
        $FrontPage = "System";
        break;
    case 'EvaluationThanks':
        $WebMeta = GetEvaluationConfirm_ID_FromUrl(WEB_ROOT,$MobileTest) ;
        $BodyContent = 'Evaluation_Thanks.php';
        $ParsleyLang = "AddComplaint";
        $FrontPage = "System";
        break;



    default:
        $BodyContent = 'Inc_HomePage.php';
        $RightContent = 'Inc_SideRight.php';
        $FrontPage = "HomeStyle";

}

?>