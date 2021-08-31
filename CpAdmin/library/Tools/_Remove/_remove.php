<?php
if(!defined('WEB_ROOT')) {	exit;}
#################################################################################################################################
###################################################  CustomerAddMoreTiket 
#################################################################################################################################
function CustomerAddMoreTiket($db){
    global $DirURL ;
    $Cust_Id  = $_POST['cust_id'] ;
    $server_data = array (
    'id'=> NULL ,
    'cust_id'=> $_POST['cust_id'] ,
    'rel'=> Clean_Mypost($_POST['sub_rel']) ,
    'name'=> Clean_Mypost($_POST['sub_name']) ,
    'mobile'=> Clean_Mypost($_POST['sub_mobile']) ,
    'mobile_2'=> Clean_Mypost($_POST['sub_mobile_2']) ,
    'email'=> Clean_Mypost($_POST['sub_email']) ,
     );
     $add_server = $db->AutoExecute("customer_sub",$server_data,AUTO_INSERT); 
     $already = mysql_num_rows(mysql_query("SELECT id FROM customer_sub WHERE cust_id = '$Cust_Id'"));
     UpdateFildeForDell("customer","sub_count",$already,$Cust_Id) ; 
     UnsetAllSession('sub_rel,sub_name,sub_mobile,sub_mobile_2,sub_email');
     Redirect_Page_2('index.php?view='.$DirURL.'&id='.$_GET['id']);  
}
#################################################################################################################################
###################################################  Print Err FromSQL ForCust
#################################################################################################################################
function PrintErrFromSQL_ForCust($OldData,$Val,$ErrMass){
    global $db ;
    global $AdminLangFile ;
    global $AdminPathHome ;
    global $AdminConfig ;
     if(($_POST[$Val])){
      $Err =  in_multiarray_2($_POST[$Val], $OldData); 
      print_r3($Err);
      if($Err == '1'){
       $ThisKey = recursive_array_search($_POST[$Val],$OldData);
       $Link_Edit = $AdminPathHome."Customer/index.php?view=Edit&id=".$OldData[$ThisKey]['id'] ;
       $Link_View = $AdminPathHome."Customer/index.php?view=Profile&id=".$OldData[$ThisKey]['id'] ;
       $Target = "_blank" ;
       $SendMass = $ErrMass." ".$AdminLangFile['mainform_err_already_exists']." ";
       $SendMass .= $OldData[$ThisKey]['name']." ".$AdminLangFile['mainform_err_record_id']." ".$OldData[$ThisKey]['id'] ;
       if($AdminConfig['customer_edit'] == '1'){
       $SendMass .=   BR.'<a href='.$Link_Edit.'  target= '.$Target.' >'.$AdminLangFile['customer_edit_cust_err'].'</a>'." ".BR ;
       }
       if($AdminConfig['customer'] == '1'){
       $SendMass .=  '<a href='.$Link_View.'  target= '.$Target.' >'.$AdminLangFile['customer_view_cust_err'].'</a>'." " ;
       }    
       SendJavaErrMass_22 ($SendMass);
     }
       return $Err ;
    }   
}
#################################################################################################################################
###################################################   PrintTicketInformation
#################################################################################################################################
function New_PrintErrFromSQL_2($OldData,$Val){
    global $db ;
    global $AdminLangFile ;
     if(($Val)){
     $Err =  in_multiarray($Val, $OldData); 
     if($Err == '1'){
        $ThisKey = recursive_array_search($Val,$OldData);
       }else{
      $Err = '0'  ; 
     }
   }else{
     $Err = '0'  ; 
   }  
   $Hany =   array('Err'=> $Err , 'Id'=> $OldData[$ThisKey]['id'] ) ;
   return $Hany  ; 
}
#################################################################################################################################
###################################################   PrintTdLabel
#################################################################################################################################
function PrintTdLabel($Vall){
    $Line = '<div class="label label-danger">'.$Vall.'</div>'; 
     $Line .=  '<div style="clear: both!important;"></div>';
     return $Line ;
}
#################################################################################################################################
################################################### Empl_ListBox_Master
#################################################################################################################################
function Empl_ListBox_Master($Req="1",$Titel="1",$Arr=""){
    global $AdminLangFile ;
    if($Req == '1'){
        $Req = "req";
    }else{
        $Req = "option";
    }
    if($Titel == "1"){
        $Label = "on";
    }else{
        $Label = "off";
    }
    $Arr = array("Label" => $Label,"Active" => '0','Order'=> "order by name desc" ,'OtherIdd' => 'user_id', "Filter_Filde"=> "sales" , "Filter_Vall"=> "1" );
    $Err[] = NF_PrintSelect_2018("Chosen",$AdminLangFile['leads_emp'],"col-md-3","user_id","tbl_user",$Req,"0",$Arr);
}
#################################################################################################################################
###################################################    
#################################################################################################################################
function Empl_ListBox_Filter(){
    global $AdminConfig ;
    global $RowUsreInfo ;
    if($AdminConfig['leads']=='1'){
    Sales_Group_List_For_Leads();
    }elseif($AdminConfig['teamleader']=='1'){
    Sales_Group_List_For_TeamLeader();
    }else{
    echo '<input type="hidden" name="emp_id" value="'.$RowUsreInfo['user_id'].'" />';
    }
}
#################################################################################################################################
###################################################   Filter_Employee_From_POST
#################################################################################################################################
function Filter_Employee_From_POST($Val){
    global $AdminConfig ;
    if(intval($Val) == '0'){
        if($AdminConfig['leads']== '1'){
            $UserPerm = "" ;
        }else{
            $UserPerm = Filter_Employee_By_Permission();
        }
    }else{
        $UserPerm = " and user_id =". intval($Val)  ;
    }
    return  $UserPerm ;
}
#################################################################################################################################
###################################################   Filter_Employee_From_POST
#################################################################################################################################
function Filter_Employee_By_Permission(){
    global $AdminConfig ;
    global $RowUsreInfo  ;
    $ThisAccountFollow = array();
    if($AdminConfig['leads']== '1'){
        $UserPerm = " " ;
    }elseif($AdminConfig['teamleader']== '1' and $RowUsreInfo['team_leader'] == '1' ){
        if($RowUsreInfo['user_follow'] != '' and $RowUsreInfo['user_follow'] != '0'){
            $ThisAccountFollow = unserialize($RowUsreInfo['user_follow']);
            $UserPerm = GeThisAccountFollow_X($ThisAccountFollow);
        }else{
           $UserPerm = " and user_id = ". intval($RowUsreInfo['user_id'])  ;  
        }
    }else{
        $UserPerm = " and user_id = ". intval($RowUsreInfo['user_id'])  ;
    }
    return  $UserPerm ;
}
#################################################################################################################################
###################################################    GeThisAccountFollow_X
#################################################################################################################################
function GeThisAccountFollow_X($ThisAccountFollow){
    global $AdminConfig ;
    if(count($ThisAccountFollow) >= '1' ){
        $UserPer = " and ( ";
        for ($i = 0; $i < count($ThisAccountFollow); $i++) {
            if($i == '0'){
                $UserPer .= " user_id = ".$ThisAccountFollow[$i];
            }else{
                $UserPer .= " or user_id = ".$ThisAccountFollow[$i];
            }
        }
        $UserPer .= " )";
    }else{
        $UserPer = " and user_id = '0' ";
    }
    return  $UserPer ;
}
#################################################################################################################################
###################################################    Unset_Alert_User
#################################################################################################################################
function Unset_Alert_User(){
    global $AdminLangFile;
    if(isset($_SESSION['UserPermission_ID']) and  intval($_SESSION['UserPermission_ID'])!= '0'){
        $EmPName = GetNameFromID_User("tbl_user",$_SESSION['UserPermission_ID'],"name");
        echo '<form action="#" method="post">';
        echo '<div class="alert alert-success alert-dismissable employee_results">';
        echo '<button type="submit" name="clear_user" class="close">×</button>';
        echo $AdminLangFile['leads_employee_results']." ".$EmPName;
        echo '</div>';
        echo '</form>';
    }
}
#################################################################################################################################
###################################################   Sales_Group_List_For_Leads
#################################################################################################################################
function Sales_Group_List_For_Leads(){
    global $AdminLangFile;
    global $Employee_IDD ;
    $Arr = array("Label" => 'on',"Active" => '1','Order'=> "order by name desc" ,'OtherIdd' => 'user_id', "Filter_Filde"=> "sales" , "Filter_Vall"=> "1" );
    $Err[] = NF_PrintSelect_2018("Chosen",$AdminLangFile['report_employee_name'],"col-md-3","emp_id","tbl_user","optin",$Employee_IDD,$Arr);
}
#################################################################################################################################
###################################################   Sales_Group_List_For_TeamLeader
#################################################################################################################################
function Sales_Group_List_For_TeamLeader(){
    global $AdminLangFile;
    global $Employee_IDD ;
    $UserSQlFilter =  Filter_Employee_By_Permission() ;
    $SendSql = $MySql = "SELECT * FROM tbl_user where user_id != 0 $UserSQlFilter ";
    $Arr = array("Label" => 'on',"Active" => '0','Order'=> "order by name desc" ,'OtherIdd' => 'user_id', "SQL_Line_Send"=> $SendSql   );
    $Err[] = NF_PrintSelect_2018("Chosen",$AdminLangFile['report_employee_name'],"col-md-3","emp_id","tbl_user","optin",$Employee_IDD,$Arr);
} 
#################################################################################################################################
###################################################    
#################################################################################################################################
function  DateFiterForm_2018($FilterDate=""){
    if($FilterDate == ""){
      $FilterDate = "date_add";  
    }
    $End_SQL_Line = " "  ;
    $End_SQL_Line .= CustmerSqlFiterLineFromPost_Date(PostIsset('date_from'),$FilterDate,"From");
    $End_SQL_Line .= CustmerSqlFiterLineFromPost_Date(PostIsset('date_to'),$FilterDate,"To");
    return $End_SQL_Line ;
}
?>