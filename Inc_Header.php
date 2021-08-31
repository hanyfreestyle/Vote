<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title><?php echo $ALang['web_title']?></title>
<meta name="description" content="<?php echo $ALang['web_description']?>">
<link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<?php


if( $FrontPage == "System"){
echo '<link rel="stylesheet" href="'.WEB_ROOT.'assets/bootstrap/css/bootstrap.min.css">';
echo '<link rel="stylesheet" href="'.WEB_ROOT.'assets/font/flaticon.css">';
echo '<link rel="stylesheet" href="'.WEB_ROOT.'assets/Style_Evaluation.css">';
echo '<link rel="stylesheet" href="'.WEB_ROOT.'assets/Style_Vr____.css">';
echo '<script src="'.WEB_ROOT.'assets/jquery/jquery.min.js"></script> ';
echo '<script src="'.WEB_ROOT.'assets/parsley.js"></script>';
echo '<script src="'.WEB_ROOT.'assets/parsley_'.$ParsleyLang.'.js" ></script>';
echo '<script src="'.WEB_ROOT.'assets/AjexFile.js"></script>';
}	



 /*

if( $FrontPage == "HomeStyle"){
    
echo '<link rel="stylesheet" href="'.WEB_ROOT.'HomeFile/css/bootstrap.min.css">';
echo '<link rel="stylesheet" type="text/css" href="'.WEB_ROOT.'HomeFile/css/owl-carousel/owl.carousel.css" />';
echo '<link rel="stylesheet" type="text/css" href="'.WEB_ROOT.'HomeFile/css/font-awesome.css" />';
echo '<link rel="stylesheet" type="text/css" href="'.WEB_ROOT.'HomeFile/css/magnific-popup/magnific-popup.css" />';
echo '<link rel="stylesheet" type="text/css" href="'.WEB_ROOT.'HomeFile/css/animate.css" />';
echo '<link rel="stylesheet" href="'.WEB_ROOT.'HomeFile/css/ionicons.min.css">';
echo '<link rel="stylesheet" href="'.WEB_ROOT.'HomeFile/css/style.css">';
echo '<link rel="stylesheet" href="'.WEB_ROOT.'HomeFile/css/responsive.css">';
echo '<link rel="stylesheet" href="javascript:void(0)" data-style="styles">';
echo '<link rel="stylesheet" href="'.WEB_ROOT.'HomeFile/css/style-customizer.css" />';
echo '<link rel="stylesheet" href="'.WEB_ROOT.'HomeFile/css/custom_2.css" />';
}
*/

?>


</head>