<?php
if(!defined('WEB_ROOT')) {	exit;}

function ChangeToArUnmber($value) {
    global $WebSiteLang ;

    $value = trim($value);
    $rep1 = array('1','2','3','4','5','6','7','8','9','0');
    $rep2 = array('١','٢','٣','٤','٥','٦','٧','٨','٩','٠');
    $value = str_replace($rep1,$rep2,$value);
    return $value;
}

?>