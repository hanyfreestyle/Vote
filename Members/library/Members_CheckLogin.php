<?php
ob_start();

function Members_doLogin() {

    global $MembersSName_SESSION;
    global $MembersKey_SESSION;
    
        
    global $pfw_db ;
    global $con ;
    $errorMessage = '';

    $userName = Clean_Mypost_Login($_POST['txtUserName']);
    $password = md5(md5($_POST['txtPassword']));
    

    // first, make sure the username & password are not empty
    if($userName == '') {
        $errorMessage = 'Please Add Your User Name';
    } elseif($_POST['txtPassword'] == '') {
        $errorMessage = 'Please Add Your Password';
    } else {



    
        $ThisSQL = ("SELECT * FROM customer WHERE user_name = '$userName' AND user_pass = '$password' and state = '1' ");
        $already = mysqli_num_rows(mysqli_query($con, $ThisSQL));
        if($already == '1') {


            $_SESSION[$MembersSName_SESSION] = md5($MembersSName_SESSION);
            $sql = $ThisSQL ;
            $result = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($result);

        if(GOOGLE_AUTH == '1'){
         $ga = new GoogleAuthenticator();
         $CheckResult = $ga->verifyCode($row['google_code'], intval($_POST['google_code']),GOOGLE_AUTH_TIME);// 2 = 2*30sec clock tolerance
         if($CheckResult != '1'){
          doLogout();  
         }
        }
       
            $ThisUserId = $row['id'] ;
            $_SESSION['Member_username'.$pfw_db] = $row['user_name'];
           
            // Create The User Key  
            $_SESSION['MemberS_id'.$pfw_db] = $row['id'];
            $_SESSION['MemberS_username'.$pfw_db] = $row['user_name'];
            $_SESSION['MemberS_userpass'.$pfw_db] = $row['user_pass'];
            $_SESSION['MemberS_User_key'.$pfw_db] = $row['user_key'];
            $_SESSION['MemberS_GoogleCode'.$pfw_db] = $row['google_code'];

            
            
            
            $USERKEY = 
            $_SESSION['MemberS_id'.$pfw_db].
            $_SESSION['MemberS_username'.$pfw_db].
            $_SESSION['MemberS_userpass'.$pfw_db].
            $_SESSION['MemberS_User_key'.$pfw_db].
            $_SESSION['MemberS_GoogleCode'.$pfw_db];
            
            $_SESSION[$MembersKey_SESSION] = md5($USERKEY);

 
            $Last_login = time();
            $sql = "UPDATE customer SET  last_seen = '$Last_login' WHERE id = '$ThisUserId' ";
            $result = mysqli_query($con,$sql) or die('Cannot add category'.mysql_error());
            
                        
            header('Location: index.php');
        } else {
            $errorMessage = 'برجاء مراجعة بيانات تسجيل الدخول';
        }
    }

    return $errorMessage;
}

 

#################################################################################################################################
###################################################    checkUser
#################################################################################################################################
function Members_CheckUser() {
    global $MembersSName_SESSION;
    global $MembersKey_SESSION;
    global $pfw_db;
    global $con ;
    
     if(!isset($_SESSION[$MembersSName_SESSION]) or !isset($_SESSION[$MembersKey_SESSION])) {
            Members_doLogout();

    } else {
        // Check The Session Value
        if($_SESSION[$MembersSName_SESSION] != md5($MembersSName_SESSION)) {
            Members_doLogout();
        }
        // Check The Session User Name
        if(!isset($_SESSION['MemberS_id'.$pfw_db]) or !isset($_SESSION['MemberS_userpass'.$pfw_db]) or !isset($_SESSION['MemberS_GoogleCode'.$pfw_db]) ){
          Members_doLogout();
        }

         
            
        if(!isset($_SESSION['Member_username'.$pfw_db])) {
            Members_doLogout();
        } else {
            $UserName = $_SESSION['Member_username'.$pfw_db];
            $UserId = $_SESSION['MemberS_id'.$pfw_db] ;
        }
        
        $sql = "SELECT * FROM customer where user_name = '$UserName' and state = '1'  and id  = '$UserId' ";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result);
        
        $LastSeen = time() - $row['last_seen'];
        if($LastSeen > GetTimeOutStamp(USER_TIME_OUT) ){
            Members_doLogout();  
        }else{
            $Last_login = time();
            $sql = "UPDATE customer SET  last_seen = '$Last_login' where user_name = '$UserName' and id = '$UserId' ";
            $result = mysqli_query($con,$sql) or die('Cannot add category'.mysql_error());  
        }
     
        $adminSiteKey =
            $row['id'].
            $row['user_name'].
            $row['user_pass'].
            $row['user_key'].
            $row['google_code'];
        $adminSiteKey = md5($adminSiteKey);
        
        
        if($adminSiteKey != $_SESSION[$MembersKey_SESSION]) {
            Members_doLogout();
            Redirect_Page("index.php");
        }


        $AdminConfig = $row ;
    }
    // the user want to logout
    if(isset($_GET['logout'])) {
        Members_doLogout();
    }
    
  
    return $AdminConfig;
}

#################################################################################################################################
################################################### doLogout   
################################################################################################################################# 
function  Members_doLogout() {
    global $pfw_db;
    global $MembersSName_SESSION;
    global $MembersKey_SESSION;
    global $MembersPathHome;
 
    //session_destroy();
    unset($_SESSION[$MembersSName_SESSION]);
    unset($_SESSION[$MembersKey_SESSION]);
    unset($_SESSION['Member_username'.$pfw_db]);
    unset($_SESSION['MemberS_id'.$pfw_db]);
    unset($_SESSION['MemberS_username'.$pfw_db]);
    unset($_SESSION['MemberS_userpass'.$pfw_db]);
    unset($_SESSION['MemberS_User_key'.$pfw_db]);
    unset($_SESSION['MemberS_GoogleCode'.$pfw_db]);
    header('Location: '.$MembersPathHome.'login.php');
    exit;
}

#################################################################################################################################
###################################################    SendMassgeforuser
#################################################################################################################################
function SendMassgeforuser() {
    redirect_to2("index.php","Access not authorized. Please contact your administrator ");
}
function SendMassgeforuser2() {
    redirect_to2("../index.php","Access not authorized. Please contact your administrator ");
}

function GetTimeOutStamp($TimeOut){
   $TimeOut =  intval($TimeOut);
   $TimeOut = $TimeOut * 60 ;
   return $TimeOut ;
}

#################################################################################################################################
###################################################   Clean_Mypost_Login 
#################################################################################################################################
function Clean_Mypost_Login($value) {
    global $con;

    $rep1 = array("|--AND--|","|-AND-|");
    $rep2 = array("&","+");
    $value = str_replace($rep1,$rep2,$value);

    $value = trim($value);
    $value = XSS_Remove_Login($value);

    $value = htmlspecialchars($value);
    if (!get_magic_Quotes_gpc()) {
        $value = addslashes(strip_tags($value));
    } else {
        $value = strip_tags($value);
    }

    $rep1 = array("'",'"','<','>','«','»',"?","¿",'%','‰');
    $rep2 = array("&#8217;","&#34",'&#60;','&#62;',"&#171;","&#187;","&#63;","&#63;","&#37;","&#37;");
    $value = str_replace($rep1,$rep2,$value);

    if (get_magic_Quotes_gpc()) {
        $value = stripslashes($value);
    }
    $value = mysqli_real_escape_string($con,$value);
    return $value;
}
function XSS_Remove_Login($data) {
    # Fix &entity\n;
    $data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
    $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
    $data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
    $data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');
    # Remove any attribute starting with "on" or xmlns
    $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);
    # Remove javascript: and vbscript: protocols
    $data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
    $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
    $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);
    # Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
    $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
    $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
    $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);
    # Remove namespaced elements (we do not need them)
    $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);
    do {
        # Remove really unwanted tags
        $old_data = $data;
        $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
    }
    while ($old_data !== $data);
    # we are done...
    return $data;
}
function print_r30($val) {
    
   echo '<div style="float: left; width: 500px;">';
   echo '<pre>';
   print_r($val);
   echo '</pre>';
   echo '</div>';
   echo '<div style="clear: both!important;"></div>';    
  
}
?>