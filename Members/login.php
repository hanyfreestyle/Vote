<?php
require_once '../library/db-config_crm.php';
require_once './library/Members_CheckLogin.php';

$errorMessage = '&nbsp;';
if(isset($_SESSION['MemberS_username'.$pfw_db])){
    header('Location: '.'index.php');
}
if (isset($_POST['txtUserName'])) {
    $result = Members_doLogin();
    if ($result != '') {
        $errorMessage = $result;
    }
}

?>
<!DOCTYPE html>
<html lang="en" dir="rtl" class="no-ie">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <title>Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="<?php echo  WEB_ROOT?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo  WEB_ROOT?>Members/MembersCss/Form.css">
    <link rel="stylesheet" href="<?php echo  WEB_ROOT?>Members/MembersCss/App_Style.css">

    <link rel="stylesheet" href="<?php echo  WEB_ROOT?>Members/MyCss/login_page_style_x.css">
    <link rel="stylesheet" href="<?php echo  WEB_ROOT?>assets/Style_Evaluation_x9.css">
</head>
<?php
if($DetectMobile->isMobile() == '1') {
    require_once 'inc_login_mobile.php';
}else{
    require_once 'inc_login_pc.php';
}
?>
<script src="<?php echo  WEB_ROOT?>assets/jquery/jquery.min.js"></script>
<script src="<?php echo  WEB_ROOT?>assets/parsley.js"></script>
<script src="<?php echo  WEB_ROOT?>assets/parsley_Ar.js"></script>
<script src="<?php echo  WEB_ROOT?>Members/App.js"></script>
</body>
</html>