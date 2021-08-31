<?php
if(!defined('WEB_ROOT')) {	exit;}

#################################################################################################################################
###################################################   GetLangState
#################################################################################################################################
function GetLangState() {
    global $pfw_db ;
    global $SiteConfig ;
    if(ADMINCPANELLANG == '1') {
        if($SiteConfig['weblang_s'] == '1'){
            if(isset($_GET['Lang'])) {
                $_SESSION['WebLang'.$pfw_db] = ChangeLang();
            }
            if(isset($_SESSION['WebLang'.$pfw_db])) {
                $WebSiteLang = $_SESSION['WebLang'.$pfw_db];
            } else {
                if($SiteConfig['weblang_kind'] == '0'){
                    $_SESSION['WebLang'.$pfw_db] = "Ar";
                    $WebSiteLang = $_SESSION['WebLang'.$pfw_db];
                }elseif($SiteConfig['weblang_kind'] == '1'){
                    $_SESSION['WebLang'.$pfw_db] = "En";
                    $WebSiteLang = $_SESSION['WebLang'.$pfw_db];
                }else{
                    $_SESSION['WebLang'.$pfw_db] = "Ar";
                    $WebSiteLang = $_SESSION['WebLang'.$pfw_db];
                }
            }
        }else{
            if($SiteConfig['weblang_kind'] == '0'){
                $_SESSION['WebLang'.$pfw_db] = "Ar";
                $WebSiteLang = $_SESSION['WebLang'.$pfw_db];
            }elseif($SiteConfig['weblang_kind'] == '1'){
                $_SESSION['WebLang'.$pfw_db] = "En";
                $WebSiteLang = $_SESSION['WebLang'.$pfw_db];
            }else{
                $_SESSION['WebLang'.$pfw_db] = "Ar";
                $WebSiteLang = $_SESSION['WebLang'.$pfw_db];
            }
        }
    } else {
        $_SESSION['WebLang'.$pfw_db] = "Ar";
        $WebSiteLang = $_SESSION['WebLang'.$pfw_db];
    }
    return $WebSiteLang ;
}

?>