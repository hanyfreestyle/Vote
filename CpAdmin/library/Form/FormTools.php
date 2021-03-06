<?php
if(!defined('WEB_ROOT')) {	exit;}
 
#################################################################################################################################
###################################################   Form_Open
#################################################################################################################################
function Form_Open($Arr=array()){
    if ( !isset($Arr['FormId'])){
        $Arr['FormId'] = 'forms';
    }
    if (!isset($Arr['FormPost'])){
        $Arr['FormPost'] = 'POST';
    }
    if (!isset($Arr['FormClass'])){
        $Arr['FormClass'] = 'form';
    }
    if (!isset($Arr['FormClassConfig'])){
        $Arr['FormClassConfig'] = 'form_config';
    }
    if (!isset($Arr['FormName'])){
        $Arr['FormName'] = 'FormName';
    }
    echo '<div id="'.$Arr['FormId'].'" >';
    echo '<div id="ErrMass" class="ErrMass_Div"></div>';
    echo '<form class="'.$Arr['FormClass']. " ".$Arr['FormClassConfig'].'" method="'.$Arr['FormPost'].'" name="'.$Arr['FormName'].'"  id="validate-form" data-parsley-validate enctype="multipart/form-data">';
}

#################################################################################################################################
###################################################  Form_Close
#################################################################################################################################
function Form_Close($state="1",$Arr=array()){
    global $AdminLangFile;
    if($state == '1'){
        $B_name = $AdminLangFile['mainform_add_but'];
    }elseif($state == '2'){
        $B_name = $AdminLangFile['mainform_edit_but'];
    }elseif($state == '3'){
        $B_name = $AdminLangFile['mainform_search_but'];
    }elseif($state == '4'){
        $B_name = $AdminLangFile['mainconfig_view_but'];
    }
    echo '<div class="col-md-12 col-sm-12 col-xs-12 form-group">';
    echo '<input type="submit" name="B1" class="ArButForm btn btn-default" value="'.$B_name.'" />';
    echo '</div>';
    echo '</form>';
    echo '</div>';
}

#################################################################################################################################
###################################################   Form_Close_New
#################################################################################################################################
function Form_Close_New($state="1",$CanceledUrl){
    global $AdminLangFile;
    if($state == '1'){
        $B_name = $AdminLangFile['mainform_add_but'];
    }elseif($state == '2'){
        $B_name = $AdminLangFile['mainform_edit_but'];
    }elseif($state == '3'){
        $B_name = $AdminLangFile['mainform_search_but'];
    }elseif($state == '4'){
        $B_name = $AdminLangFile['mainconfig_view_but'];
    }elseif($state == '5'){
        $B_name = $AdminLangFile['mainform_confirm_but'];
    }elseif($state == '6'){
        $B_name = $AdminLangFile['mainform_close_but'];
    }
    echo '<div class="col-md-12 col-sm-12 col-xs-12 form-group">';

    echo '<input type="submit" name="B1" class="CloseForm_Ar NewFormStyleAdd  btn btn-default" value="'.$B_name.'" />';
    echo '<a  class="CloseForm_Ar mb-sm btn btn-warning" href="'.$CanceledUrl.'">'.$AdminLangFile['mainform_canceled_but'].'</a>';
    echo '</div>';
    echo '</form>';
    echo '</div>';
}

#################################################################################################################################
###################################################   PrintDeleteButConfirm
#################################################################################################################################
function PrintDeleteButConfirm($CanceledUrl,$DellUrl){
    global $AdminLangFile;
    if($DellUrl){
        echo '<a  class="ArButForm_Dell ArButForm_Dell_2 mb-sm btn btn-danger" href="index.php?view='.$DellUrl.'&Confirm=1">'.$AdminLangFile['mainform_delete'].'</a>';
    }

    echo '<a  class="ArButForm_Dell mb-sm btn btn-warning" href="index.php?view='.$CanceledUrl.'">'.$AdminLangFile['mainform_canceled_but'].'</a>';

}
#################################################################################################################################
###################################################   PrintCheckBox
#################################################################################################################################
function PrintCheckBox($id){
    echo '<input type="checkbox" name="id_id[]" value="'.$id.'" class="FormcheckboxL" >';
}
function PrintCheckBox_New($id){
    $CheckBox = '<input type="checkbox" name="id_id[]" value="'.$id.'" class="FormcheckboxL" >';
    return $CheckBox ;
}

#################################################################################################################################
###################################################   Print
#################################################################################################################################
function print_r3($val) {
    echo '<div style="float: right; width:800px; direction: ltr">';
    echo '<pre>';
    print_r($val);
    echo '</pre>';
    echo '</div>';
    echo '<div style="clear: both!important;"></div>';

}

function print_rxx($val) {
    echo '<div style="float: left; width:800px; direction: ltr ; padding-left: 30px;">';
    echo '<pre>';
    print_r($val);
    echo '</pre>';
    echo '</div>';
    echo '<div style="clear: both!important;"></div>';

}


function print_r2($val) {
    echo '<pre>';
    print_r($val);
    echo '</pre>';
}
function PrintArryKeys($SiteConfig,$Name,$MainName='Config'){
    echo '<div class="dhtmlgoodies_question">'.$Name.'</div>';
    echo '<div class="dhtmlgoodies_answer"><div>';
    for ($i = 0; $i <= count($SiteConfig)-1; $i++) {
        echo '<input class="text-input" type="text" id="'.$Name.$i.'" onClick="SelectAll('."&#039;".$Name.$i."&#039;".');" 
    value = "'.'$'.$MainName.'[&#039;'.$Name.'&#039;]'.'[&#039;'.key($SiteConfig).'&#039;]'.'" /><br/>';
        next($SiteConfig);
    }
    echo '</div></div>';
}
#####################################################################################################################################
##########################################  NF_PrintBut_TD
#####################################################################################################################################
function NF_PrintBut_TD($StateType,$Name,$Link,$Class,$Icon,$blank="0") {
    global $AdminLangFile ;
    if($blank == '1'){
        $Target =  'target="_blank" ';
    }else{
        $Target  = "";
    }
    switch ($StateType) {
        case '1':
            $But = '<a '.$Target.' href="index.php?view='.$Link.'" class="btn btn-xs TdBut '.$Class.'"><i class="fa '.$Icon.'"></i> '.$Name.' </a>';
            break;
        case '2':
            $But = '<a '.$Target.' href="index.php?view='.$Link.'" class="btn btn-xs TdBut '.$Class.'" 
data-toggle="tooltip" data-placement="top" title="" data-original-title="'.$Name.'" ><i class="fa '.$Icon.'"></i></a>';
            break;

        case '22':
            $But = '<a '.$Target.' href="index.php?view='.$Link.'" class="btnTable btn-xs TdBut '.$Class.'" 
data-toggle="tooltip" data-placement="top" title="" data-original-title="'.$Name.'" ><i class="fa '.$Icon.'"></i></a>';
            break;
        case 'Full_Url22':
            $But = '<a '.$Target.' href="'.$Link.'" class="btnTable btn-xs TdBut '.$Class.'" 
data-toggle="tooltip" data-placement="top" title="" data-original-title="'.$Name.'" ><i class="fa '.$Icon.'"></i></a>';
            break;

        case 'Full_Url':
            $But = '<a '.$Target.' href="'.$Link.'" class="btn btn-xs TdBut '.$Class.'" 
data-toggle="tooltip" data-placement="top" title="" data-original-title="'.$Name.'" ><i class="fa '.$Icon.'"></i></a>';
            break;
        case '3':
            $But = '<a href="index.php?view='.$Link.'" class="btn btn-xs TdBut '.$Class.'" target="_blank" ><i class="fa '.$Icon.'"></i> '.$Name.' </a>';
            break;
        case '4':
            $But = '<a class="btn btn-xs TdBut '.$Class.'" ><i class="fa '.$Icon.'"></i> '.$Name.' </a>';
            break;
        case 'Full_blank':
            $But = '<a target="_blank" href="'.$Link.'" class="btn btn-xs TdBut '.$Class.'" 
data-toggle="tooltip" data-placement="top" title="" data-original-title="'.$Name.'" ><i class="fa '.$Icon.'"></i></a>';
            break;
        case 'Full_blank_2':
            $But = '<a href="'.$Link.'"  target="_blank" class="btn btn-xs TdBut '.$Class.'"><i class="fa '.$Icon.'"></i> '.$Name.' </a>';
            break;
        case 'autodelete_1':
            $But ='<a id="'.$Link.'" class="Delete_Unit TdBut btn btn-danger btn-xs" href="#"
data-toggle="tooltip" data-placement="top" title="" data-original-title="'.$AdminLangFile['mainform_auto_delete_mass'].'">
<i class="fa fa-window-close"></i> '.$Name.' </a>';
            break;
        case 'autodelete_2':
            $But ='<a id="'.$Link.'" class="Delete_Unit TdBut btn btn-danger btn-xs" href="#"
data-toggle="tooltip" data-placement="top" title="" data-original-title="'.$AdminLangFile['mainform_auto_delete_mass'].'">
<i class="fa fa-window-close"></i></a>';
            break;
            
        case 'autodelete_3':
            $But ='<a id="'.$Link.'" class="Delete_Unit TdBut btn btn-danger btn-xs" href="#"
data-toggle="tooltip" data-placement="top" title="" data-original-title="????????????">
<i class="fa fa-thumbs-down"></i></a>';
            break;
                        
        default:
            $But = '';
    }
    return $But;
}

#####################################################################################################################################
##########################################  Print_PagePanel_OPen
#####################################################################################################################################
function Print_PagePanel_OPen($Col,$Title,$OPenState="1",$RemoveState="0",$NewCalss=""){
    echo '<div class="'.$Col.' '.$NewCalss.' ">';
    echo '<div class="panel panel-default">';
    echo '<div class="panel-heading">'.$Title;
    if($RemoveState == '1'){
        echo '<a href="#" data-perform="panel-dismiss" data-toggle="tooltip" title="Close Panel" class="pull-right"><em class="fa fa-times"></em></a>';
    }
    if($OPenState == '1'){
        echo '<a href="#" data-perform="panel-collapse" data-toggle="tooltip" title="Collapse Panel" class="pull-right"><em class="fa fa-minus"></em></a>';
    }else{
        echo '<a href="#" data-perform="panel-collapse" data-toggle="tooltip" title="Collapse Panel" class="pull-right"><em class="fa fa-plus"></em></a>';
    }

    echo '</div>';
    if($OPenState == '1'){
        echo '<div>';
    }else{
        echo '<div class="panel-wrapper collapse">';
    }
    echo '<div class="panel-body">';
}

function Print_PagePanel_Close($Footer=""){
    echo '</div>';
    if($Footer){
        echo '<div class="panel-footer">'.$Footer.'</div>';
    }
    echo '</div>';
    echo '</div>';
    echo '</div>';
}

#####################################################################################################################################
########################################## FPrint_ADD_Submit
#####################################################################################################################################
function FPrint_ADD_Submit($Dell='0'){
    global $AdminLangFile ;
    if($Dell == '1'){
        echo '<div class="row PanelMin TopButAction"><div class="col-md-12">
<button type="submit"  name="ActAllUnit" class="mb-sm btn btn-success">'.$AdminLangFile['mainform_activation'].'</button>
<button type="submit"  name="UnActAllUnit" class="mb-sm btn btn-warning">'.$AdminLangFile['mainform_disable'].'</button>
<button type="submit"  name="DelUnit" class="mb-sm btn btn-danger">'.$AdminLangFile['mainform_delete'].'</button>
</div> </div><div style="clear: both;"></div>';
    }else{
        echo '<div class="row PanelMin TopButAction"><div class="col-md-12">
<button type="submit"  name="ActAllUnit" class="mb-sm btn btn-success">'.$AdminLangFile['mainform_activation'].'</button>
<button type="submit"  name="UnActAllUnit" class="mb-sm btn btn-warning">'.$AdminLangFile['mainform_disable'].'</button>
</div> </div><div style="clear: both;"></div>';
    }
}
#####################################################################################################################################
########################################## CheckUnitState
#####################################################################################################################################
function CheckUnitState($State){
    global $AdminPath;
    
    if($State== '1'){
        $Photo =  '<img src="'.$AdminPath.'img/ico_active_16.png"  />';
    }else{
        $Photo =  '<img src="'.$AdminPath.'img/ico_inactive_16.png"  />';
    }
    return $Photo ;
}

#####################################################################################################################################
##########################################   ActAllUnit_New
#####################################################################################################################################
function ActAllUnit_New($Tabel){
    global $db;
    if(isset($_POST['id_id'])) {
        $EmailCount = count($_POST['id_id']);
        for ($i = 0; $i < $EmailCount; $i++) {
            $id = $_POST['id_id'][$i];
            $server_data = array('state' => "1");
            $db->AutoExecute($Tabel, $server_data, AUTO_UPDATE, "id = $id");
        }
    }
}
function UnActAllUnit_New($Tabel){
    global $db;
    if(isset($_POST['id_id'])){
        $EmailCount = count($_POST['id_id']);
        for ($i = 0; $i < $EmailCount; $i++){
            $id =  $_POST['id_id'][$i]  ;
            $server_data = array ('state'=> "0");
            $db->AutoExecute($Tabel,$server_data,AUTO_UPDATE,"id = $id");
        }
    }
}
function DelUnit_New($Tabel){
    global $db;
    $EmailCount = count($_POST['id_id']);
    for ($i = 0; $i < $EmailCount; $i++){
        $id =  $_POST['id_id'][$i]  ;
        $db->H_DELETE_FromId("$Tabel",$id);
    }
}



#################################################################################################################################
###################################################   hetsee_2
#################################################################################################################################
function hetsee_2($filedname) {
    if(isset($_POST[$filedname])) {
        $v = $_POST[$filedname];
    } else {
        $v = "";
    }
    return $v;
}

function hetseeEdit_2($filedname,$Name) {
    global $row;
    if(isset($_POST[$filedname])) {
        $v = $_POST[$filedname];
    } else {
        $v = $row[$Name];
    }
    return $v;
}

function hetseeEdit_3($filedname,$Name) {
    global $row;
    $v = $row[$Name];
    return $v;
}
function hetsee($filedname) {
    if(isset($filedname)) {
        echo $filedname;
    } else {
        echo "";
    }
}
function hetseeEdit($filedname,$Name) {
    global $row;
    if(isset($filedname)) {
        echo $filedname;
    } else {
        echo $row[$Name];
    }
}
#################################################################################################################################
###################################################   Form_Close_3
#################################################################################################################################
function Form_Close_3($state="1",$But_Name){
    global $AdminLangFile;
    if($state == '1'){
        $B_name = $AdminLangFile['mainform_add_but'];
    }elseif($state == '2'){
        $B_name = $AdminLangFile['mainform_edit_but'];
    }elseif($state == '3'){
        $B_name = $AdminLangFile['mainform_search_but'];
    }elseif($state == '4'){
        $B_name = $AdminLangFile['mainconfig_view_but'];
    }
    echo '<div class="col-md-12 col-sm-12 col-xs-12 form-group">';
    echo '<input type="submit" name="'.$But_Name.'" class="ArButForm btn btn-default" value="'.$B_name.'" />';
    echo '</div>';
    echo '</form>';
    echo '</div>';
}
function Form_Close_2($B_name){
    echo '<div class="form-field clear">';
    echo '<input type="submit" class="submit" value="'.$B_name.'" name="B1" />';
    echo '</div>';
    echo '</form>';
    echo '<div class="form_space"></div>';
    echo '</div>';
}
function Form_Close_4($But_Name){
    global $AdminLangFile;
    echo '<div class="col-md-12 col-sm-12 col-xs-12 form-group">';
    echo '<input type="submit" name="B1" class="ArButForm btn btn-default" value="'.$B_name.'" />';
    echo '</div>';
    echo '</form>';
    echo '</div>';
}

#################################################################################################################################
###################################################   PrintFiled
#################################################################################################################################
function PrintFiled($Label,$filed){
echo '<div class="form-field clear">';
echo '<label class="form-label fl-space2">'.$Label . ' : </label>';
echo '<div class="PrintFiled">'.$filed.'</div>';
echo '</div>';
}
function PrintFiled_Home($Label,$filed){
echo '<div class="form-field">';
echo '<div class="form-label">'.$Label.' : </div>';
echo '<div class="form-Filed">'.$filed.'</div>';
echo '</div>';
}
#################################################################################################################################
###################################################   LastAdd
#################################################################################################################################
 function LastAdd($SESSION) {
   if(isset($_SESSION[$SESSION])) {
     $state = "1";
     $cat_id = $_SESSION[$SESSION];
   } else {
     $state = "0";
     $cat_id = "0";
   }
   $LastAdd = array('state' => $state,'cat_id' => $cat_id);
   return $LastAdd;
 }
#################################################################################################################################
################################################### LastAddadmin  
#################################################################################################################################
 function LastAddadmin($SESSION) {
   if($_POST['lastadd_state'] == "1") {
     $_SESSION[$SESSION] = $_POST['cat_id'];
   } else {
     UnsetAllSession($SESSION);
   }
 }
 function LastAddadmin_22($SESSION) {
   if($_POST['lastadd_state'] == "1") {
     $_SESSION[$SESSION] = $_POST['amara_id'];
   } else {
     UnsetAllSession($SESSION);
   }
 }
#################################################################################################################################
###################################################   UnsetAllSession
#################################################################################################################################
function UnsetAllSession($arr) {
   $getArr = explode(",",$arr);
   for($i = 0; $i < count($getArr); $i++) {
     $sessionName = $getArr[$i];
     unset($_SESSION[$sessionName]);
   }
}
function UnsetAllSession_index($arr,$But='B1') {
   if(!isset($_POST[$But])){ 
   $getArr = explode(",",$arr);
   for($i = 0; $i < count($getArr); $i++) {
     $sessionName = $getArr[$i];
     unset($_SESSION[$sessionName]);
   }
   }
}
function unsetsss($arr) {
   $getArr = explode(",",$arr);
   for($i = 0; $i < count($getArr); $i++) {
     $sessionName = $getArr[$i];
     unset($_SESSION[$sessionName]);
   }
}

function UnseetByKey($arry){
   $key = "";     
   forEach($arry as $key => $value) {
   $key_2 = $key_2.",".$key ;
   }
  unsetsss($key_2);
}

function UnsetAllSession_Dell(){
  $Text = "";
  foreach ($_POST as $key => $value)  { 
  //echo '<p>'.$key.' - '.$value.'</p>';
  $Text = $Text.",".$key ;         
  }   
  return $Text ;
}
#################################################################################################################################
###################################################   
#################################################################################################################################
 function Redirect_Page($location = null) {
   if($location != null) {
     echo '<meta HTTP-EQUIV="REFRESH" content="2; url='.$location.'">';
     exit;
   }
 }
 function Redirect_to2($location = NULL,$mass) {
   if($location != NULL) {
     echo '<script type="text/javascript">';
     echo 'alert("'.$mass.'")';
     echo '</script>';
     echo '<meta HTTP-EQUIV="REFRESH" content="0; url='.$location.'">';
     exit;
   }
 }
 function Redirect_Header($location = NULL,$mass = "") {
   if($location != NULL) {
     echo '<meta HTTP-EQUIV="REFRESH" content="2; url='.$location.'">';
     exit;
   }
 }
  function Redirect_Page_2($location = null) {
   if($location != null) {
     echo '<meta HTTP-EQUIV="REFRESH" content="0; url='.$location.'">';
     exit;
   }
 }
 function Redirect_Home($location = null) {
   if($location != null) {
     echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>';
     echo '<meta HTTP-EQUIV="REFRESH" content="0; url='.$location.'">';
     exit;
   }
 } 
#################################################################################################################################
###################################################   CheckTheGetAndState
#################################################################################################################################
 function CheckTheGetAndState($GetValue,$FiledName,$TabelName,$to,$state = "") {
   global $LANG;
   if(!isset($_GET[$GetValue])) {
     redirect_Header($to);
   } else {
     $GOODGetValue = $_GET[$GetValue];
   }
   if(!is_numeric($_GET[$GetValue])) {
     redirect_Header($to);
     exit;
   }
   if($state == '1') {
     $already = mysql_num_rows(mysql_query("SELECT '$FiledName' FROM $TabelName WHERE $FiledName = $GOODGetValue and state = '1'"));
     if($already > 0) {
       $GOODGetValue = $_GET[$GetValue];
     } else {
       redirect_Header($to);
     }
   } else {
     $already = mysql_num_rows(mysql_query("SELECT '$FiledName' FROM $TabelName WHERE $FiledName = $GOODGetValue"));
     if($already > 0) {
       $GOODGetValue = $_GET[$GetValue];
     } else {
       redirect_Header($to);
     }
   }
   return $GOODGetValue;
}
#################################################################################################################################
###################################################  CheckTheGet 
#################################################################################################################################
function CheckTheGet($GetValue,$FiledName,$TabelName,$Mass1 = "Error",$Mass2 = "Error") {
   //////// Check The GET OF the CAT ID
   global $LANG;
   global $db ;
   if(!isset($_GET[$GetValue])) {
     redirect_to2("index.php",$Mass1);
   } else {
     $GOODGetValue = $_GET[$GetValue];
   }
   if(!is_numeric($_GET[$GetValue])) {
     redirect_to2("index.php",$Mass1);
     exit;
   }
   $already = $db->H_Total_Count("SELECT '$FiledName' FROM $TabelName WHERE $FiledName = $GOODGetValue");
   if($already > 0) {
     $GOODGetValue = $_GET[$GetValue];
   } else {
     redirect_to2("index.php",$Mass2);
   }
   return $GOODGetValue;
}
#################################################################################################################################
###################################################
#################################################################################################################################
function GETTHEPAGE($TheSQL,$PERpage) {
    global $AdminLangFile ;
    global $db;
   $NOPAGE = "0";

   $already = $db->H_Total_Count($TheSQL);
   if(($already / $PERpage) == 1) {
     $countpage = 1;
   } else {
     $countpage = ceil($already / $PERpage);
   }
   if( isset($_GET['page']) and $_GET['page'] > $countpage) {
    echo '<div style="clear: both!important;"></div>';
    New_Print_Alert("4",$AdminLangFile['mainform_alert_no_content']);
    echo '<div style="clear: both!important;"></div>';
     $NOPAGE = 1;
   }
   return $NOPAGE;
}

#################################################################################################################################
###################################################   SendJavaErrMass
#################################################################################################################################
function SendJavaErrMass($Mass) {
    echo '<script type="text/javascript">';
    echo '$(document).ready(function(){';
    echo '$("#ErrMass").addClass("ErrMass_Div_S");';
    echo '$("#ErrMass").append("';
    echo $Mass."<br/>";
    echo '");';
    echo '});';
    echo '</script>';
}
function SendJavaErrMass_22($Mass) {
    echo '<script type="text/javascript">';
    echo '$(document).ready(function(){';
    echo '$("#ErrMass").addClass("ErrMass_Div_S");';
    echo '$("#ErrMass").append("';
    echo $Mass.BR;
    echo '");';
    echo '});';
    echo '</script>';
}
#################################################################################################################################
###################################################  Vall 
#################################################################################################################################

function Vall($Err,$DoFunction,$db,$state,$GroupPermation = "") {

        if($DoFunction == "test") {
            echo "Test Done";
            exit;
        }
        if($state == "1") {
            if($GroupPermation == '1') {
                $DoFunction($db);
            } else {
                SendMassgeforuser();
            }
        } else {
            $DoFunction($db);
        }

}
/*
function Vall($Err,$DoFunction,$db,$state,$GroupPermation = "") {
   $validator = new FormValidator();
   for($i = 0; $i < count($Err); $i++) {
     for($x = 0; $x < count($Err[$i]); $x++) {
       $validator->addValidation($Err[$i][$x]['Name'],$Err[$i][$x]['Req'],$Err[$i][$x]['Mass']);
     }
   }
   if($validator->ValidateForm()) {
     if($DoFunction == "test") {
       echo "Test Done";
       exit;
     }
     if($state == "1") {
       if($GroupPermation == '1') {
         $DoFunction($db);
       } else {
         SendMassgeforuser();
       }
     } else {
       $DoFunction($db);
     }
   } else {
     $error_hash = $validator->GetErrors();
     echo '';
     foreach($error_hash as $inpname => $inp_err) {
       SendJavaErrMass($inp_err);
     }
   }
}
*/
#################################################################################################################################
###################################################   VallCat
#################################################################################################################################
function VallCat($Err,$DoFunction,$db,$state,$GroupPermation = "",$catTabel,$Path,$ConfigP,$PathD = "") {
   $validator = new FormValidator();
   for($i = 0; $i < count($Err); $i++) {
     for($x = 0; $x < count($Err[$i]); $x++) {
       $validator->addValidation($Err[$i][$x]['Name'],$Err[$i][$x]['Req'],$Err[$i][$x]['Mass']);
     }
   }
   if($validator->ValidateForm()) {
     if($DoFunction == "test") {
       echo "Test Done";
       exit;
     }
     if($state == "1") {
       if($GroupPermation == '1') {
         $DoFunction($db,$catTabel,$Path,$PathD,$ConfigP);
       } else {
         SendMassgeforuser();
       }
     } else {
       $DoFunction($db,$catTabel,$Path,$ConfigP);
     }
   } else {
     $error_hash = $validator->GetErrors();
     echo '';
     foreach($error_hash as $inpname => $inp_err) {
       SendJavaErrMass($inp_err);
     }
   }
}

#################################################################################################################################
###################################################   VallFormFunction
#################################################################################################################################
function VallFormFunction($Err,$DoFunction,$FunctionArr,$captcha = "") {
   $validator = new FormValidator();
   for($i = 0; $i < count($Err); $i++) {
     for($x = 0; $x < count($Err[$i]); $x++) {
       $validator->addValidation($Err[$i][$x]['Name'],$Err[$i][$x]['Req'],$Err[$i][$x]['Mass']);
     }
   }
   if($validator->ValidateForm()) {
     if($captcha == '1') {
       if(trim($_POST['captcha']) == "") {
         SendJavaErrMass('?????????? ???????????? ???? ?????????? ?????????? ????????????????');
       } else {
         if(!empty($_REQUEST['captcha'])) {
           if(empty($_SESSION['captcha']) || trim(strtolower($_REQUEST['captcha'])) != $_SESSION['captcha']) {
             SendJavaErrMass('?????????? ???????????? ???? ?????????? ?????????? ????????????????');
           } else {
             if($DoFunction == "test") {
               echo "Test Done";
               exit;
             }
             $DoFunction($FunctionArr = "");
           }
           unset($_SESSION['captcha']);
         }
       }
     } else {
       if($DoFunction == "test") {
         echo "Test Done";
         exit;
       }
       $DoFunction($FunctionArr = "");
     }
   } else {
     $error_hash = $validator->GetErrors();
     echo '';
     foreach($error_hash as $inpname => $inp_err) {
       SendJavaErrMass($inp_err);
     }
   }
}
#################################################################################################################################
###################################################   
#################################################################################################################################
function GetTheErrMass($StateType,$Label,$Name,$Size,$Mass,$req) {
    global $AdminWebLang ;
    if($AdminWebLang == 'En'){
    $Url_Err_Mass = "Please be sure to write correctly URL";
    }else{
    $Url_Err_Mass = "?????????? ???????????? ???? ?????????? ???????????? ?????????? ??????????";
    }
    
   if($req != "0") {
     $req2 = explode("-",$req);
     if(count($req2) > '0') {
       for($i = 0; $i < count($req2); $i++) {
         $vr = explode('=',$req2[$i]);
         if($req2[$i] == "email") {
           $Mass22 = "?????????? ?????????? ???????????? ?????????????????? ?????????? ??????????";
         } elseif($req2[$i] == "url") {
           $Mass22 = $Url_Err_Mass ;
         } elseif($req2[$i] == "num") {
           $Mass22 = "?????????? ???????????? ???? ???? ???????? ????????"." ".$Label." "."?????????? ?????? !!";
         } elseif($vr[0] == "maxlen") {
           $Mass22 = "?????????? ???????????? ???? ???????? ?????? ???????? ??????????"." ".$Label." ".$vr['1'];
         } elseif($vr[0] == "minlen") {
           $Mass22 = "?????????? ???????????? ???? ?????? ?????? ???????? ??????????"." ".$Label." ".$vr['1'];
         } elseif($vr[0] == "lessthan") {
           $Mass22 = "???????? ???????????? ???? ???? ???????? "." ".$Label." "." ?????? ???? ".$vr['1'];
         } elseif($vr[0] == "greaterthan") {
           $Mass22 = "???????? ???????????? ???? ???? ???????? "." ".$Label." "." ???????? ???? ".$vr['1'];
         } elseif($vr[0] == "dontselect") {
           $Mass22 = "?????????? ???????????? ???? ????????????"." ".$Label;
         } else {
           $Mass22 = $Mass;
         }
         $err[] = array('Name' => $Name,'Mass' => $Mass22,'Req' => $req2[$i]);
         $Mass22 = "";
       }
     } else {
       $err[] = array('Name' => $Name,'Mass' => $Mass,'Req' => $req);
     }
     return $err;
   }
} 
#################################################################################################################################
###################################################   
#################################################################################################################################
#################################################################################################################################
###################################################   
#################################################################################################################################
function IdUrl($row) {
   global $SiteConfig;
   global $WebSiteLang;
   if($SiteConfig['rightmode'] == "1") {
     if($WebSiteLang == 'En') {
       $idYY = Removword_To_Clean($row['name_m_en']);
     } else {
       $idYY = Removword_To_Clean($row['name_m']);
     }
   } else {
     $idYY = $row['id'];
   }
   return $idYY;
}
#################################################################################################################################
###################################################   
#################################################################################################################################
function Removword($value) {
   $value = trim($value);
   $rep1 = array('"','<','>',"'");
   $rep2 = array("&#34;",'&#60;','&#62;','&#039;');
   $value = str_replace($rep1,$rep2,$value);
   return $value;
}

#################################################################################################################################
###################################################   
#################################################################################################################################
function Removword_L($value) {
   $value = trim($value);
   $rep1 = array("&#34;",'&#60;','&#62;','&#039;');
   $rep2 = array('"','<','>',"'");
   $value = str_replace($rep1,$rep2,$value);
   return $value;
}

#################################################################################################################################
###################################################   
#################################################################################################################################
function Removword_L2($value) {
   $value = trim($value);
   $rep1 = array("&#63;");
   $rep2 = array('?');
   $value = str_replace($rep1,$rep2,$value);
   return $value;
 }

#################################################################################################################################
###################################################  Removword_To_Clean 
#################################################################################################################################
function Removword_To_Clean($value) {
   $value = trim($value);
    $rep1 = array("&#8217;","&#63;","&#35;",'&#37;','&amp;',"+");
	$rep2 = array("'","&#191;","|number|sign|",'&permil;',"|--AND--|","|-AND-|");
   $value = str_replace($rep1,$rep2,$value);
   return $value;
 }

#################################################################################################################################
###################################################   HTML_Print
#################################################################################################################################
function HTML_Print($value,$type="1",$trim="300"){
    if($type == '1'){
     $value = Removword_L($value);   
    }elseif($type == "2"){
     $value = Removword_L($value);
     $value = Remove_HTML($value);        
     $value = nl2br($value);
    }elseif($type == "3"){
     $value = Removword_L($value);
     $value = Remove_HTML($value);
     $value = NiceTrimNew($value,$trim);             
    }
    return $value ;    
}


#################################################################################################################################
###################################################   Check_Keyword
#################################################################################################################################
function Check_Keyword($value,$trim="180"){
    $value = trim($value);
    /*
    $value = Removword_L($value);
    $value = Remove_HTML($value);
    $value = NiceTrimNew($value,$trim);
    */
    return $value ;
}

#################################################################################################################################
###################################################   Check_Description
################################################################################################################################# 
function Check_Description($value,$trim="180"){
    $value = trim($value);
   /*
    $value = Removword_L($value);
    $value = Remove_HTML($value);
    $value = NiceTrimNew($value,$trim);
    */
    return $value ;
} 

#################################################################################################################################
###################################################   Check_PageTitle
#################################################################################################################################
function Check_PageTitle($value,$trim="180"){
    $value = trim($value);
  /*
    $value = Removword_L($value);
    $value = Remove_HTML($value);
    $value = NiceTrimNew($value,$trim);
    */
    return $value ;
} 


#################################################################################################################################
###################################################   Clean_Mypost
#################################################################################################################################
function Clean_Mypost($value) {
    global $con ;
    $rep1 = array("|--AND--|","|-AND-|");
	$rep2 = array("&","+");
    $value = str_replace($rep1,$rep2,$value);
    
    $value = XSS_Remove($value);
	$value = trim($value);
	$value = htmlspecialchars($value);

    $value = strip_tags($value);


 
    $rep1 = array("'",'"','<','>','??','??',"?","??",'%','???');
	$rep2 = array("&#8217;","&#34",'&#60;','&#62;',"&#171;","&#187;","&#63;","&#63;","&#37;","&#37;");

    $value = str_replace($rep1,$rep2,$value);


    
    $value = mysqli_real_escape_string($con,$value);
	return $value;
}

#################################################################################################################################
###################################################   XSS_Remove
#################################################################################################################################
function XSS_Remove($x_content){
    $x_content = preg_replace('#(<[^>]+[\s\r\n\"\'])(on|xmlns)[^>]*>#iU',"$1>",$x_content);
    $x_content = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([\`\'\"]*)[\\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iU','$1=$2nojavascript...',$x_content);
    $x_content = preg_replace('#([a-z]*)[\x00-\x20]*=([\'\"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iU','$1=$2novbscript...',$x_content);
    $x_content = preg_replace('#</*\w+:\w[^>]*>#i','',$x_content);
    do {
        $oldstring = $x_content;
        $x_content = preg_replace('#</*(\?xml|applet|meta|xml|blink|link|style|script|object|iframe|frame|frameset|ilayer|layer|bgsound|title|base)[^>]*>#i',"",$x_content);
    } while ($oldstring != $x_content);
    
   return $x_content; 
}



#################################################################################################################################
###################################################  url_slug 
#################################################################################################################################
function Url_Slug($str, $options = array()) {
	// Make sure string is in UTF-8 and strip invalid UTF-8 characters
	$str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());
	
	$defaults = array(
		'delimiter' => '-',
		'limit' => null,
		'lowercase' => true,
		'replacements' => array(),
		'transliterate' => false,
	);
	
	// Merge options
	$options = array_merge($defaults, $options);
	
	$char_map = array(
		// Latin
		'??' => 'A', '??' => 'A', '??' => 'A', '??' => 'A', '??' => 'A', '??' => 'A', '??' => 'AE', '??' => 'C', 
		'??' => 'E', '??' => 'E', '??' => 'E', '??' => 'E', '??' => 'I', '??' => 'I', '??' => 'I', '??' => 'I', 
		'??' => 'D', '??' => 'N', '??' => 'O', '??' => 'O', '??' => 'O', '??' => 'O', '??' => 'O', '??' => 'O', 
		'??' => 'O', '??' => 'U', '??' => 'U', '??' => 'U', '??' => 'U', '??' => 'U', '??' => 'Y', '??' => 'TH', 
		'??' => 'ss', 
		'??' => 'a', '??' => 'a', '??' => 'a', '??' => 'a', '??' => 'a', '??' => 'a', '??' => 'ae', '??' => 'c', 
		'??' => 'e', '??' => 'e', '??' => 'e', '??' => 'e', '??' => 'i', '??' => 'i', '??' => 'i', '??' => 'i', 
		'??' => 'd', '??' => 'n', '??' => 'o', '??' => 'o', '??' => 'o', '??' => 'o', '??' => 'o', '??' => 'o', 
		'??' => 'o', '??' => 'u', '??' => 'u', '??' => 'u', '??' => 'u', '??' => 'u', '??' => 'y', '??' => 'th', 
		'??' => 'y',

		// Latin symbols
		'??' => '(c)',

		// Greek
		'??' => 'A', '??' => 'B', '??' => 'G', '??' => 'D', '??' => 'E', '??' => 'Z', '??' => 'H', '??' => '8',
		'??' => 'I', '??' => 'K', '??' => 'L', '??' => 'M', '??' => 'N', '??' => '3', '??' => 'O', '??' => 'P',
		'??' => 'R', '??' => 'S', '??' => 'T', '??' => 'Y', '??' => 'F', '??' => 'X', '??' => 'PS', '??' => 'W',
		'??' => 'A', '??' => 'E', '??' => 'I', '??' => 'O', '??' => 'Y', '??' => 'H', '??' => 'W', '??' => 'I',
		'??' => 'Y',
		'??' => 'a', '??' => 'b', '??' => 'g', '??' => 'd', '??' => 'e', '??' => 'z', '??' => 'h', '??' => '8',
		'??' => 'i', '??' => 'k', '??' => 'l', '??' => 'm', '??' => 'n', '??' => '3', '??' => 'o', '??' => 'p',
		'??' => 'r', '??' => 's', '??' => 't', '??' => 'y', '??' => 'f', '??' => 'x', '??' => 'ps', '??' => 'w',
		'??' => 'a', '??' => 'e', '??' => 'i', '??' => 'o', '??' => 'y', '??' => 'h', '??' => 'w', '??' => 's',
		'??' => 'i', '??' => 'y', '??' => 'y', '??' => 'i',

		// Turkish
		'??' => 'S', '??' => 'I', '??' => 'C', '??' => 'U', '??' => 'O', '??' => 'G',
		'??' => 's', '??' => 'i', '??' => 'c', '??' => 'u', '??' => 'o', '??' => 'g', 

		// Russian
		'??' => 'A', '??' => 'B', '??' => 'V', '??' => 'G', '??' => 'D', '??' => 'E', '??' => 'Yo', '??' => 'Zh',
		'??' => 'Z', '??' => 'I', '??' => 'J', '??' => 'K', '??' => 'L', '??' => 'M', '??' => 'N', '??' => 'O',
		'??' => 'P', '??' => 'R', '??' => 'S', '??' => 'T', '??' => 'U', '??' => 'F', '??' => 'H', '??' => 'C',
		'??' => 'Ch', '??' => 'Sh', '??' => 'Sh', '??' => '', '??' => 'Y', '??' => '', '??' => 'E', '??' => 'Yu',
		'??' => 'Ya',
		'??' => 'a', '??' => 'b', '??' => 'v', '??' => 'g', '??' => 'd', '??' => 'e', '??' => 'yo', '??' => 'zh',
		'??' => 'z', '??' => 'i', '??' => 'j', '??' => 'k', '??' => 'l', '??' => 'm', '??' => 'n', '??' => 'o',
		'??' => 'p', '??' => 'r', '??' => 's', '??' => 't', '??' => 'u', '??' => 'f', '??' => 'h', '??' => 'c',
		'??' => 'ch', '??' => 'sh', '??' => 'sh', '??' => '', '??' => 'y', '??' => '', '??' => 'e', '??' => 'yu',
		'??' => 'ya',

		// Ukrainian
		'??' => 'Ye', '??' => 'I', '??' => 'Yi', '??' => 'G',
		'??' => 'ye', '??' => 'i', '??' => 'yi', '??' => 'g',

		// Czech
		'??' => 'C', '??' => 'D', '??' => 'E', '??' => 'N', '??' => 'R', '??' => 'S', '??' => 'T', '??' => 'U', 
		'??' => 'Z', 
		'??' => 'c', '??' => 'd', '??' => 'e', '??' => 'n', '??' => 'r', '??' => 's', '??' => 't', '??' => 'u',
		'??' => 'z', 

		// Polish
		'??' => 'A', '??' => 'C', '??' => 'e', '??' => 'L', '??' => 'N', '??' => 'o', '??' => 'S', '??' => 'Z', 
		'??' => 'Z', 
		'??' => 'a', '??' => 'c', '??' => 'e', '??' => 'l', '??' => 'n', '??' => 'o', '??' => 's', '??' => 'z',
		'??' => 'z',

		// Latvian
		'??' => 'A', '??' => 'C', '??' => 'E', '??' => 'G', '??' => 'i', '??' => 'k', '??' => 'L', '??' => 'N', 
		'??' => 'S', '??' => 'u', '??' => 'Z',
		'??' => 'a', '??' => 'c', '??' => 'e', '??' => 'g', '??' => 'i', '??' => 'k', '??' => 'l', '??' => 'n',
		'??' => 's', '??' => 'u', '??' => 'z'
	);
	
	// Make custom replacements
	$str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
	
	// Transliterate characters to ASCII
	if ($options['transliterate']) {
		$str = str_replace(array_keys($char_map), $char_map, $str);
	}
	
	// Replace non-alphanumeric characters with our delimiter
	$str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
	
	// Remove duplicate delimiters
	$str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
	
	// Truncate slug to max. characters
	$str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
	
	// Remove delimiter from ends
	$str = trim($str, $options['delimiter']);
	
	return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
}


#################################################################################################################################
###################################################   
#################################################################################################################################



#################################################################################################################################
###################################################   
#################################################################################################################################



#################################################################################################################################
###################################################   
#################################################################################################################################



#################################################################################################################################
###################################################   
#################################################################################################################################


?>