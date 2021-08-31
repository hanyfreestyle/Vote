<?php
if(!defined('WEB_ROOT')) {	exit;}

#################################################################################################################################
###################################################    Get_Sales_Follow
#################################################################################################################################
function Get_Sales_Follow($Row){
    global $db ;
    global $RowUsreInfo ;
    global $AdminConfig;
    $Credentials_Add = "0";
    $Credentials_View = "0";
    if($AdminConfig['subercustserv'] == '1'){
        $Credentials_Add = "1"; $Credentials_View = "1";
    }elseif($AdminConfig['custservleader']== '1'){
        if($RowUsreInfo['user_follow'] != '' and $RowUsreInfo['user_follow'] != '0'){
            $ThisAccountFollow = unserialize($RowUsreInfo['user_follow']);
            //print_r3($ThisAccountFollow);
            $ThisAccountFollow_New = array();
            $Name = $db->SelArr("SELECT * FROM tbl_user where custserv = '1' ");
            for($i = 0; $i < count($Name); $i++) {
                $NewFolowUserIDD = $Name[$i]['user_id'] ;
                if (in_array($NewFolowUserIDD, $ThisAccountFollow)) {
                    $row_NewUSer = $db->H_SelectOneRow("select * from tbl_user where user_id = '$NewFolowUserIDD' ");
                    if($row_NewUSer['user_follow'] != '' and $row_NewUSer['user_follow'] != '0'){
                        $ThisAccountFollow_New_Add = unserialize($row_NewUSer['user_follow']);
                        // $ThisAccountFollow_New = $ThisAccountFollow_New + $ThisAccountFollow_New_Add ;
                        $ThisAccountFollow_New = array_merge($ThisAccountFollow_New,$ThisAccountFollow_New_Add);
                    }
                }
            }
            $ThisAccountFollow_New = array_merge($ThisAccountFollow_New,$ThisAccountFollow);
            $ThisAccountFollow_New = (array_unique($ThisAccountFollow_New));
            //print_r3($ThisAccountFollow_New);
            if (in_array($Row['user_id'], $ThisAccountFollow_New)) {
                $Credentials_Add = "1"; $Credentials_View = "1";
            }
        }
    }else{
        if($RowUsreInfo['user_follow'] != '' and $RowUsreInfo['user_follow'] != '0'){
            $ThisAccountFollow = unserialize($RowUsreInfo['user_follow']);
            if (in_array($Row['user_id'], $ThisAccountFollow)) {
                $Credentials_Add = "1"; $Credentials_View = "1";
            }
        }
    }
    return   $Credentials  = array('View'=> $Credentials_View ,'Add'=> $Credentials_Add );
}









#################################################################################################################################
###################################################    Unset_Alert_User_CustService
#################################################################################################################################
function Unset_Alert_User_CustService(){
    global $ALang;
    
        
    if(isset($_SESSION['CustUserPermission_ID']) and  intval($_SESSION['CustUserPermission_ID'])!= '0'){
        $EmPName = GetNameFromID_User("tbl_user",$_SESSION['CustUserPermission_ID'],"name");
        echo '<form action="#" method="post">';
        echo '<div class="alert alert-success alert-dismissable employee_results">';
        echo '<button type="submit" name="cust_clear_user" class="close">×</button>';
        echo $ALang['mainform_employee_results']." ".$EmPName;
        echo '</div>';
        echo '</form>';
    }
}



#################################################################################################################################
###################################################   TicketForm
#################################################################################################################################
function TicketForm($Arr=array()){
    global $AdminLangFile ;
    global $Follow_Priority_Arr ;
    global $Follow_State_Arr ;

    if(isset($Arr['type']) and  $Arr['type']== 'New'){
        $Arr = array("Label" => 'on',"Active" => '0','Order'=> "order by count desc" , "Filter_Filde"=> "cat_id" , "Filter_Vall"=> TABEL_REASON_TICKET);
        $Err[] = NF_PrintSelect_2018("Chosen",$AdminLangFile['ticket_t_reason'],"col-md-3","reason_id","config_data","req","0",$Arr);
    }

    echo '<div style="clear: both!important;"></div>';

    $Arr = array("StartFrom" => '1',"Label" => 'on');
    $Err[] = NF_PrintSelect_2018("ArrFrom",$AdminLangFile['ticket_priority_sel_name'],"col-md-2","priority_id",$Follow_Priority_Arr,"optin","",$Arr);

    $Arr = array("Label" => 'on',"Active" => '0','Order'=> "order by count desc" , "Filter_Filde"=> "cat_id" , "Filter_Vall"=> TABEL_FOLLOW_TYPE);
    $Err[] = NF_PrintSelect_2018("Chosen",$AdminLangFile['salesdep_f_follow_type'],"col-md-3","follow_type","config_data","req","0",$Arr);


    $Arr = array("StartFrom" => '1',"Label" => 'on' );
    $Err[] = NF_PrintSelect_2018("ArrFrom",$AdminLangFile['salesdep_f_follow_state'],"col-md-2","follow_state",$Follow_State_Arr,"req","0",$Arr);



    $MoreS = array('Col' => "col-md-3",'Placeholder'=> "",'required' => '');
    $Err[] = NF_PrintInput("Date2",$AdminLangFile['salesdep_f_follow_date'],"follow_date","0","0","option",$MoreS);

    $MoreS = array('Col' => "col-md-2",'Placeholder'=> "",'required' => '','Dir'=> "Ar_Lang");
    $Err[] = NF_PrintInput("Time",$AdminLangFile['ticket_follow_calltime'],"follow_time","1","1","optin",$MoreS);




    echo '<div style="clear: both!important;"></div>';

    $MoreS = array('Col' => "col-md-12",'Placeholder'=> "",'required' => 'required');
    $Err[] = NF_PrintInput("TextArea",$AdminLangFile['salesdep_f_follow_des'],"des","1","0","req",$MoreS);

    return $Err  ;
}

#################################################################################################################################
###################################################  Closed_Ticket_Fiter
#################################################################################################################################
function  Closed_Ticket_Fiter($Close_Date){
    $End_SQL_Line = " "  ;

    $End_SQL_Line .= CustmerSqlFiterLineFromPost_Date($_POST['date_from'],$Close_Date,"From");
    $End_SQL_Line .= CustmerSqlFiterLineFromPost_Date($_POST['date_to'],$Close_Date,"To");
    $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('emp_id',"user_id");
    $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('close_type',"close_type");
    $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('close_type_2',"c_type_2");
    return $End_SQL_Line ;
}
#################################################################################################################################
################################################### Print_TotalCount_Block
#################################################################################################################################
function Print_TotalCount_Block($already){
    global $AdminLangFile ;
    echo '<div style="clear: both!important;"></div>';
    ReportBlockPrint("col-md-3",$AdminLangFile['report_totalcount'],$already,"fa-hdd-o","alert-inverse");
    echo '<div style="clear: both!important;"></div>';
}





#################################################################################################################################
###################################################    PrintCustomerTicketForm
#################################################################################################################################
function PrintCustomerTicketForm(){
    global $AdminLangFile ;
    global $row ;
    global $RowUsreInfo ;
    global $db ;
    global $USER_PERMATION_Add ;

    Form_Open();
    New_Print_Alert("1",$AdminLangFile['salesdep_call_info']);
    echo '<div style="clear: both!important;"></div>';
    $Arr = array();
    $Err = TicketForm($Arr);
    echo '<input type="hidden" name="cust_id" value="'.$row['cust_id'].'" />';
    echo '<input type="hidden" name="ticket_id" value="'.$row['id'].'" />';
    echo '<input type="hidden" name="ticket_date" value="'.$row['date_add'].'" />';
    echo '<input type="hidden" name="follow_user_id" value="'.$RowUsreInfo['user_id'].'" />';
    echo '<input type="hidden" name="follow_user_name" value="'.$RowUsreInfo['name'].'" />';
    echo '<div class="col-md-12 col-sm-12 col-xs-12 form-group">';
    echo '<input type="submit" name="B2" class="CloseForm_Ar btn  btn-danger" value="'.$AdminLangFile['ticket_close_tek'].'" />';
    echo '</div>';

    Form_Close_New("1","TCustService");
    if(isset($_POST['B1'])){
        Vall($Err,"CustService_UpdateT",$db,"1",$USER_PERMATION_Add);
    }

    if(isset($_POST['B2'])){
        Vall($Err,"CustService_Closed",$db,"1",$USER_PERMATION_Add);
    }
}

#################################################################################################################################
###################################################    PrintCustomerTicketInfo
#################################################################################################################################
function PrintCustomerTicketInfo($THESQL){
    global $db ;
    global $AdminLangFile ;
    global $T_ARRAY_CONFIG_DATA ;
    global $NamePrint ;

    $already = $db->H_Total_Count($THESQL);
    if ($already > 0){
        New_Print_Alert("5",$AdminLangFile['ticket_cust_info_td_h']);
        echo '<div class="panel panel-default"><div class="table-responsive"><table class="table table-striped table-bordered table-hover ArTabel">';
        echo '<thead><tr>';
        echo '<th class="TD_100">'.$AdminLangFile['ticket_t_add_date'].'</th>';
        echo '<th class="TD_100">'.$AdminLangFile['ticket_t_emp_name'].'</th>';
        echo '<th class="TD_100">'.$AdminLangFile['ticket_t_follow_type'].'</th>';
        echo '<th class="TD_100">'.$AdminLangFile['ticket_t_follow_state'].'</th>';
        echo '<th class="TD_100">'.$AdminLangFile['ticket_t_follow_date'].'</th>';
        echo '<th class="TD_100">'.$AdminLangFile['ticket_priority_sel_name'].'</th>';
        echo '<th class="TD_250">'.$AdminLangFile['ticket_t_des'].'</th>';
        echo '</tr></thead><tbody>';

        $Name = $db->SelArr($THESQL);
        for($i = 0; $i < count($Name); $i++) {
            $Follow_Info_ = PrintFollowInformation_ForDesTabel($Name[$i]);
            $follow_type = findValue_FromArr($T_ARRAY_CONFIG_DATA,"id",$Name[$i]['follow_type'],$NamePrint);

            echo '<tr>';
            echo '<td>'.PrintFullTime($Name[$i]['date_time']).'</td>';
            echo '<td>'.$Name[$i]['user_name'].'</td>';
            echo '<td>'.$follow_type.'</td>';
            echo '<td>'.Rterun_Follow_State_Arr($Name[$i]['follow_state']).'</td>';
            echo '<td>'.$Follow_Info_['DateInfo'].'</td>';
            echo '<td>'.$Follow_Info_['Priority'].'</td>';
            echo '<td>'.nl2br($Name[$i]['des']).'</td>';
            echo '</tr>';

        }

        echo '</tbody></table></div></div>';
    }

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