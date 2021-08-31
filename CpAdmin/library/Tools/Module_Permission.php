<?php

#################################################################################################################################
###################################################    
#################################################################################################################################
function UserPermission_2019($PermissionName){
    global $AdminConfig ;
    if($AdminConfig['admin'] == '1'){
    $UserPermission = '1';    
    }else{
    $UserPermission = $AdminConfig[$PermissionName] ;            
    }
    
    return $UserPermission ;
}



#################################################################################################################################
###################################################   Permission_Alert_User
#################################################################################################################################
function Permission_Alert_User($SESSION_Name){
    global $ALang;
    $ViewState = Permission_View_Bloks_G();
    if($ViewState['View'] == '1'){    
    if(isset($_SESSION[$SESSION_Name]) and  intval($_SESSION[$SESSION_Name])!= '0'){
        $EmPName = GetNameFromID_User("tbl_user",$_SESSION[$SESSION_Name],"name");
        echo '<form action="#" method="post">';
        echo '<div class="alert alert-success alert-dismissable employee_results">';
        echo '<button type="submit" name="cust_clear_user" class="close">×</button>';
        echo $ALang['mainform_employee_results']." ".$EmPName;
        echo '</div>';
        echo '</form>';
    }
    }
}

#################################################################################################################################
###################################################    Permission_View_Bloks_G
#################################################################################################################################
function Permission_View_Bloks_G(){
  global $AdminConfig ;
  global $RowUsreInfo ;
  
  $ViewState = "0";
  
  if($AdminConfig['admin'] == '1'){
    $ViewState = "1";
  }elseif($AdminConfig['subercustserv'] == '1' and $RowUsreInfo['custserv_leader'] == '1' ){
    $ViewState = "1";
  }elseif($AdminConfig['custservleader']== '1' and $RowUsreInfo['custserv_leader'] == '1' ){
   $ViewState = "1";
  }
  return array('View'=>$ViewState); 
}



/*
if($view == 'ListCustomer'){
if(isset($_POST['B1_Fliter'])){
$UpdateState = ""; 
}else{
$UserPerm = "";
$UpdateState = ""; 
}
}elseif($view == 'CustomerUpdate'){
$UpdateState = " and review = '1' ";  
$UpdateState = " and review = '1'  or persent < 70 ";  
}

*/




	
?>