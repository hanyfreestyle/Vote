<?php

#################################################################################################################################
###################################################  SendFormData  
#################################################################################################################################
function SendFormData(){
    global $db ;
    # $SMS_Config   = $db->H_SelectOneRow( "select * from config_sms ");
    # print_r3($SMS_Config);
    $ThIsIsTest = '0';
    $cust_id = Clean_Mypost($_POST['cust_id']);
    $area_id = Clean_Mypost($_POST['area_id']);
    $cust_mobile = Clean_Mypost($_POST['cust_mobile']);

    $TAddDate = FULLDate_ForToday();
    $date_add = $TAddDate['Stamp'] ;
    $SendCount = $db->H_Total_Count("SELECT id FROM complaint where cust_mobile = '$cust_mobile' and date_add = '$date_add' "); 
#echo $SendCount ;
      
    if($SendCount < '6'){
       Add_New_Complaint($ThIsIsTest);
    }else{
       Redirect_Page_2(COMPLAINT_RECEIVING_URL.$_POST['cust_url']); 
    }
   
}


/*
function SendFormData(){
    global $db ;
    $ThIsIsTest = '0';
    $cust_id = Clean_Mypost($_POST['cust_id']);
    $area_id = Clean_Mypost($_POST['area_id']);
    $cust_mobile = Clean_Mypost($_POST['cust_mobile']);

    $TAddDate = FULLDate_ForToday();
    $date_add = $TAddDate['Stamp'] ;
    $SQL_Line = "SELECT id,name_m FROM `complaint` WHERE  date_add = '$date_add' and cust_id = '$cust_id' and  area_id = '$area_id' 
    and cust_mobile = '$cust_mobile' ";
    
    $already = $db->H_Total_Count($SQL_Line);
    if($already == '0'){
        Add_New_Complaint($ThIsIsTest);
    }else{
        $Existing_Complaint = $db->H_SelectOneRow($SQL_Line);
        Redirect_Page_2(COMPLAINT_VALIDATION_URL.$Existing_Complaint['name_m']);
    }
}
*/


#################################################################################################################################
###################################################  Add_New_Complaint  
#################################################################################################################################
function Add_New_Complaint($ThIsIsTest){
    global $db ;
    $TAddDate = FULLDate_ForToday();
    $v_code = GetVcodeCount() ;

    $Server_Data = array ('id'=> NULL ,
        ##
        'date_add'=> $TAddDate['Stamp'] ,
        'date_month'=> $TAddDate['Month']."-".$TAddDate['Year'],
        'date_year'=> $TAddDate['Year'],
        'date_time'=>  time() ,
        ##
        'cust_id'=> Clean_Mypost($_POST['cust_id']),
        'complaint_id'=> Clean_Mypost($_POST['complaint_id']),
        'city_id'=> Clean_Mypost($_POST['city_id']),
        'area_id'=> Clean_Mypost($_POST['area_id']),
        ##
        'cust_mobile'=>Clean_Mypost($_POST['cust_mobile']),
        'cust_name'=>Clean_Mypost($_POST['cust_name']),
        ##
        'state'=> "0",
        'v_code'=> $v_code['Code'] ,
        'view'=> "0",
    );
    if($ThIsIsTest == '1'){
        print_r3($Server_Data);
        echo COMPLAINT_VALIDATION_URL ;
    }else{
        $db->AutoExecute("complaint",$Server_Data,AUTO_INSERT);
        $LastIdAdd =  $db->GetId();
        $NameMUrl = Rand_String_H("10").$LastIdAdd ;
        $UpdateUrl = array (
            'name_m'=> $NameMUrl ,
        );
        $db->AutoExecute("complaint",$UpdateUrl,AUTO_UPDATE,"id = $LastIdAdd");
        Send_Validation_sms($LastIdAdd);
        Redirect_Page_2(COMPLAINT_VALIDATION_URL.$NameMUrl);
    }
}

#################################################################################################################################
###################################################    GetVcodeCount
#################################################################################################################################


#################################################################################################################################
###################################################  Confim_Complaint_Add  
#################################################################################################################################
function Confim_Complaint_Add($ComplaintRow,$CustomerRow){
    $ThIsIsTest = '0';
    global $db ;
    
    $Complaint_id = $ComplaintRow['id'];
    $NameMUrl = $ComplaintRow['name_m'];
     
    $Update_Complaint = array ('state'=> '1');
    
    if($ThIsIsTest == '1'){
        #print_r3($Update_Complaint);
        Send_Customer_Alert($ComplaintRow,$CustomerRow,$ThIsIsTest);
        #echo $Complaint_id.BR ;
        #echo $NameMUrl.BR ;
        
    }else{
        $db->AutoExecute("complaint",$Update_Complaint,AUTO_UPDATE,"id = $Complaint_id");
        Send_Customer_Alert($ComplaintRow,$CustomerRow,$ThIsIsTest);
        Redirect_Page_2(COMPLAINT_VALIDATION_URL.$NameMUrl);
    }
    
}








#################################################################################################################################
###################################################  Send_Validation_sms  
#################################################################################################################################
function Send_Validation_sms($ComplaintId){
    global $db ;
    $ThIsIsTest = '0';

    $SMS_Config   = $db->H_SelectOneRow( "select * from config_sms ");
    $ComplaintRow = $db->H_SelectOneRow( "select * from complaint where id = '$ComplaintId' ");

    if($SMS_Config['send_confirm'] == '1' and $ComplaintRow['state'] ==  '0' ){

        # $DTT_SMS    = new Malath_SMS("rakaneditor", "Ra1046303135", 'UTF-8');
        $DTT_SMS    = new Malath_SMS(trim($SMS_Config['user_name']),trim($SMS_Config['password']), 'UTF-8');
        $Credits    = $DTT_SMS->GetCredits();
        #$SenderName = $DTT_SMS->GetSenders();
        $CheckUser  = $DTT_SMS->CheckUserPassword();

        $SmS_Msg    = $SMS_Config['confim_mass']." ".$ComplaintRow['v_code'];
        $Mobiles    = International_Correction($ComplaintRow['cust_mobile']);
        $Originator = $SMS_Config['sender'];



        if( $ThIsIsTest == '1'){
            print_r3($SMS_Config);
            print_r3($Credits);
            print_r3($ComplaintRow);

            echo $SmS_Msg.BR ;
            echo $Mobiles.BR ;
            echo $Originator.BR ;

        }else{
            $Send = $DTT_SMS->Send_SMS($Mobiles, $Originator, $SmS_Msg, $CheckUser);
            #print_r3($Send);
            #echo BR.$Credits ;

        }
    }
}



#################################################################################################################################
###################################################  Send_Customer_Alert  
#################################################################################################################################
function Send_Customer_Alert($ComplaintRow,$CustomerRow,$ThIsIsTest){
   global $db ;
   global $ALang; 
    
   if($ThIsIsTest == '1'){
    $ComplaintRow['state'] =  '1' ;
   }
   
   $SMS_Config   = $db->H_SelectOneRow( "select * from config_sms ");

   if($SMS_Config['send_customer'] == '1' ){

        # $DTT_SMS    = new Malath_SMS("rakaneditor", "Ra1046303135", 'UTF-8');
        $DTT_SMS    = new Malath_SMS(trim($SMS_Config['user_name']),trim($SMS_Config['password']), 'UTF-8');
        $Credits    = $DTT_SMS->GetCredits();
        #$SenderName = $DTT_SMS->GetSenders();
        $CheckUser  = $DTT_SMS->CheckUserPassword();
 
        $SmS_Msg    = $SMS_Config['customer_mass'];
        $Mobiles    = International_Correction($CustomerRow['sms_mobile']);
        $Originator = $SMS_Config['sender'];



        if( $ThIsIsTest == '1'){
           
            print_r3($SMS_Config);
            print_r3($ComplaintRow);
            print_r3($CustomerRow);
           /*  

            echo $SmS_Msg.BR ;
            echo $Mobiles.BR ;
            echo $Originator.BR ;
*/
        }else{
            $Send = $DTT_SMS->Send_SMS($Mobiles, $Originator, $SmS_Msg, $CheckUser);
            #print_r3($Send);

        }
    }
  
  
#################################################################################################################################
###################################################    Send Email 
#################################################################################################################################
  if($SMS_Config['email_send_state'] == '1' ){
    
     $EmailConfig = GetEmailConfig($SMS_Config['email_account']); 
     $Email_SendTo = $CustomerRow['sms_email'];
     $Email_SendToName = $CustomerRow['name'];
     
     $Email_Subject = $SMS_Config['email_subject'];
     
     $ConfigData_Arr = $db->SelArr("SELECT * FROM config_data ");
     $fcomplaint = findValue_FromArr($ConfigData_Arr,'id',$ComplaintRow['complaint_id'],"name");
     $fcity = findValue_FromArr($ConfigData_Arr,'id',$ComplaintRow['city_id'],"name");
     $f_area = findValue_FromArr($ConfigData_Arr,'id',$ComplaintRow['area_id'],"name");
     $Email_Message = "";
     $Email_Message .= '<body dir="rtl" >';
     $Email_Message .= Print_Email_Line("",$SMS_Config['email_message']);
     $Email_Message .= Print_Email_Line($ALang['hform_add_fcomplaint'],$fcomplaint);
     $Email_Message .= Print_Email_Line($ALang['hform_add_fcity'],$fcity);
     $Email_Message .= Print_Email_Line($ALang['hform_add_f_area'],$f_area);
     $Email_Message .= Print_Email_Line($ALang['hform_add_fmobile'],$ComplaintRow['cust_mobile']);
     $Email_Message .= Print_Email_Line($ALang['hform_add_fname'],$ComplaintRow['cust_name']);                     
     $Email_Message .='<p><br>&nbsp;</p></body>';     
     
     $EmailData =array(
        'ReplyTo_Email'=> $EmailConfig['setFrom_Email'],
        'ReplyTo_Name'=> $EmailConfig['setFrom_Name'],
        'SendTo_Email'=> $Email_SendTo,
        'SendTo_Name'=> $Email_SendToName ,
        'Subject'=> $Email_Subject,
        'Message'=> $Email_Message,      
    );
    
    echo $Email_Message ; 
    Send_STMP_Email($EmailConfig,$EmailData);  
  } 
} 

#################################################################################################################################
###################################################    Print_Email_Line
#################################################################################################################################
function Print_Email_Line($Name,$Vall){
    $Line = '<p><b><font face="Tahoma" size="2" color="#FF0000">'.$Name.'</font></b><br>
    <font face="Tahoma" size="2">'.$Vall.'</font></p>';
    return $Line ;
}


#################################################################################################################################
###################################################   International_Correction
#################################################################################################################################
function International_Correction($Number){
   $Number = intval($Number);
   $Number = '966'.$Number ;
   return $Number; 
}

#################################################################################################################################
###################################################   GetMetaDesForUnit
#################################################################################################################################
function GetCustomer_ID_FromUrl($SendTo,$MobileTest){
    global $db ;
    
  
    if($MobileTest == '1'){

    $Meta = array();
    $GetId = Url_Slug(trim($_GET['id']));
 
        
    if( $GetId == ""  ){
        Redirect_Home($SendTo);
        exit;
    } 
    $SQL_Line = "SELECT * FROM customer WHERE name_m = '$GetId' and state = '1' " ;
    $already = $db->H_Total_Count($SQL_Line);
    

        
    if ($already > 0){
        
        $row = $db->H_SelectOneRow($SQL_Line);
 
        $Meta = array (
            'id' => $row['id'] ,
            'PageName'=> Check_PageTitle($row['name']) ,
            'Des'=>  Check_Description($row['name']),
        );
      
    }else{
        Redirect_Home($SendTo);
        exit;     
    }    
    return $Meta;
    }else{
       Redirect_Home($SendTo);
    }    
}


#################################################################################################################################
###################################################   GetComplaint_ID_FromUrl
#################################################################################################################################
function GetComplaint_ID_FromUrl($SendTo,$MobileTest){
    global $db ;
    if($MobileTest == '1'){
    $Meta = array();
    $GetId = Url_Slug(trim($_GET['id']));
    if( $GetId == ""  ){
        Redirect_Home($SendTo);
        exit;
    } 
    $SQL_Line = "SELECT * FROM complaint WHERE name_m = '$GetId'  " ;
    $already = $db->H_Total_Count($SQL_Line);
    if ($already > 0){
        
        $row = $db->H_SelectOneRow($SQL_Line);
 
        $Meta = array (
            'id' => $row['id'] ,
            'PageName'=> "Page Name" ,
            'Des'=>  "Des",
        );
      
    }else{
        Redirect_Home($SendTo);
        exit;     
    }   
    
    }else{
        Redirect_Home($SendTo);
        exit;     
    }     
    return $Meta;
}


#################################################################################################################################
###################################################  GetCopyRight
#################################################################################################################################
function GetCopyRight($StartDate,$Lang,$CompanyName) {
    if($StartDate > date("Y")) {
        $StartDate = date("Y");
    }
    switch($Lang) {
        case 'Ar':
            $copyname = "جميع الحقوق محفوظة";
            if($StartDate == date("Y")) {
                $CopyRight = $copyname." &copy; ".date("Y")." ".$CompanyName;
            } else {
                $CopyRight = $copyname." &copy; ".$StartDate." - ".date("Y")." ".$CompanyName;
            }
            break;
        case 'En':
            $copyname = "All Rights Reserved";
            if($StartDate == date("Y")) {
                $CopyRight = $copyname." &copy; ".date("Y")." ".$CompanyName;
            } else {
                $CopyRight = $copyname." &copy; ".$StartDate." - ".date("Y")." ".$CompanyName;
            }
            break;
        default:
            $copyname = "All Rights Reserved";
            if($StartDate == date("Y")) {
                $CopyRight = $copyname." &copy; ".date("Y")." ".$CompanyName;
            } else {
                $CopyRight = $copyname." &copy; ".$StartDate." - ".date("Y")." ".$CompanyName;
            }
    }
    return $CopyRight;
}
#################################################################################################################################
###################################################   GetAllConfig
#################################################################################################################################










	
?>