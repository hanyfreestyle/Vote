<?php
if(!defined('WEB_ROOT')) {	exit;}

#################################################################################################################################
###################################################    CustService_Page_credentials
#################################################################################################################################
function CustService_Page_credentials($Row){
    global $AdminConfig ;
    global $RowUsreInfo  ;
    $Credentials_Add = "0";
    $Credentials_View = "0";
    if($AdminConfig['subercustserv'] == '1'){
        $Credentials_Add = "1"; $Credentials_View = "1";
    }elseif($Row['user_id'] == $RowUsreInfo['user_id']){
        $Credentials_Add = "1"; $Credentials_View = "1";
    }elseif($AdminConfig['custservleader']== '1' and $RowUsreInfo['custserv_leader'] == '1'){
        $ThisAccountFollow = unserialize($RowUsreInfo['user_follow']);
        if (in_array($Row['user_id'], $ThisAccountFollow)) {
            $Credentials_View = "1" ;
            $Credentials_Add = "1"; $Credentials_View = "1";
        }
    }
    return   $Credentials  = array('View'=> $Credentials_View ,'Add'=> $Credentials_Add );
}


#################################################################################################################################
###################################################   CustService_Form_Filter
#################################################################################################################################
function CustService_Form_Filter($Arr=array()){
    global $AdminLangFile ;
    global $RowUsreInfo ;
    global $AdminConfig ;
    echo '<form class="FilterForm FilterFormStyle" method="POST" name="Filter" id="validate-form" data-parsley-validate >';
    if(isset($Arr['OnlyDay']) and $Arr['OnlyDay'] == '1'){
        $MoreS = array('Col' => "col-md-4",'Placeholder'=> "",'required' => 'requiredx');
        $Err[] = NF_PrintInput("DateEdit",$AdminLangFile['mainform_from_date'],"thisdate","0","0","option",$MoreS);
    }else{
        $MoreS = array('Col' => "col-md-4",'Placeholder'=> "",'required' => 'requiredx');
        $Err[] = NF_PrintInput("DateEdit",$AdminLangFile['mainform_from_date'],"date_from","0","0","option",$MoreS);
        $MoreS = array('Col' => "col-md-4",'Placeholder'=> "",'required' => 'requiredx');
        $Err[] = NF_PrintInput("DateEdit",$AdminLangFile['mainform_to_date'],"date_to","0","0","option",$MoreS);
    }
    CustService_Empl_ListBox_Filter();
    echo '<div style="clear: both!important;"></div>';
    echo '<div class="col-md-12 col-sm-12 col-xs-12 form-group">';
    echo '<input type="submit" name="B1_Fliter" class="ArButForm btn btn-default" value="'.$AdminLangFile['mainform_filter_but'].'" />';
    echo '</div>';
    echo '</form>';
}

#################################################################################################################################
###################################################  CustService_Empl_ListBox_Filter
#################################################################################################################################
function CustService_Empl_ListBox_Filter(){
    global $AdminConfig ;
    global $RowUsreInfo ;
    if($AdminConfig['subercustserv']=='1'){
        CustService_Group_List();
    }elseif($AdminConfig['custservleader']=='1'){
        CustService_Group_List_For_TeamLeader();
    }else{
        echo '<input type="hidden" name="emp_id" value="'.$RowUsreInfo['user_id'].'" />';
    }
}

#################################################################################################################################
###################################################   CustService_Group_List
#################################################################################################################################
function CustService_Group_List(){
    global $ALang;
    global $Employee_IDD ;
    $Arr = array("Label" => 'on',"Active" => '1','Order'=> "order by name desc" ,'OtherIdd' => 'user_id', "Filter_Filde"=> "custserv" , "Filter_Vall"=> "1" );
    $Err[] = NF_PrintSelect_2018("Chosen",$ALang['mainform_employee_name'],"col-md-3","emp_id","tbl_user","optin",$Employee_IDD,$Arr);
}

#################################################################################################################################
###################################################   Sales_Group_List_For_TeamLeader
#################################################################################################################################
function CustService_Group_List_For_TeamLeader(){
    global $ALang ;
    global $Employee_IDD ;
    $UserSQlFilter =  CustService_Filter_Employee_By_Permission() ;
    $SendSql = $MySql = "SELECT * FROM tbl_user where custserv = '1' and  user_id != 0 $UserSQlFilter ";
    $Arr = array("Label" => 'on',"Active" => '0','Order'=> "order by name desc" ,'OtherIdd' => 'user_id', "SQL_Line_Send"=> $SendSql   );
    $Err[] = NF_PrintSelect_2018("Chosen",$ALang['mainform_employee_name'],"col-md-3","emp_id","tbl_user","optin",$Employee_IDD,$Arr);
}

#################################################################################################################################
###################################################    CustService_GeThisAccountFollow
#################################################################################################################################
function CustService_GeThisAccountFollow($ThisAccountFollow){
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
###################################################   Filter_FollowUser_By_POST
#################################################################################################################################
function Filter_FollowUser_By_POST($Val){
    global $AdminConfig ;
    global $db ;
    if(intval($Val) == '0'){
        if($AdminConfig['subercustserv']== '1'){
            $UserPerm = "" ;
        }else{
            $UserPerm = Filter_FollowUser_By_Permission();
        }
    }else{
        $Val  = intval($Val);
        $RowUsreInfo = $db->H_SelectOneRow("select * from tbl_user where user_id =  '$Val' ");
        if($RowUsreInfo['user_follow'] != '' and $RowUsreInfo['user_follow'] != '0'){
            $ThisAccountFollow = unserialize($RowUsreInfo['user_follow']);
            $UserPerm = CustService_GeThisAccountFollow($ThisAccountFollow);
        }else{
            $UserPerm = " and user_id = ". intval($Val)  ;
        }
    }
    return  $UserPerm ;
}

#################################################################################################################################
###################################################   CustService_Filter_Employee_From_POST
#################################################################################################################################
function CustService_Filter_Employee_From_POST($Val){
    global $AdminConfig ;
    if(intval($Val) == '0'){
        if($AdminConfig['subercustserv']== '1'){
            $UserPerm = "" ;
        }else{
            $UserPerm = CustService_Filter_Employee_By_Permission();
        }
    }else{
        $UserPerm = " and user_id =". intval($Val)  ;
    }
    return  $UserPerm ;
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