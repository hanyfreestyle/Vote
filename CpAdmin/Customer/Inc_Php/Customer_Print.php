<?php
#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #   Customer_Print_Info
function Customer_Print_Info($PageType,$row){
    global $ALang ;

    if($PageType == 'Edit'){
        $EditFilde = "Edit";
        $name_2_Req = 'required';
        $name_2_Req_php = 'req';
    }else{
        $EditFilde = "";
        $religion = "";
        $name_2_Req = '';
        $name_2_Req_php = '';
    }

    New_Print_Alert("2",$ALang['cust_alert_info']);

    $Arr = array("StartFrom" => '0',"Label" => 'on');
    $MemberTypeArr = array("0" => $ALang['new_member_0'],"1" => $ALang['new_member_1']);
    $Err[] = NF_PrintSelect_2018("ArrFrom",$ALang['new_member_type'],"col-md-4","member_type",$MemberTypeArr,"req",ArrIsset($row,"member_type",'0'),$Arr);

    $MoreS = array('Col' => "col-md-4",'Placeholder'=> "",'required' => 'required','Dir'=> "Ar_Lang");
    $Err[] = NF_PrintInput("Text".$EditFilde,$ALang['cust_name'],"name","","","req",$MoreS);

    $MoreS = array('Col' => "col-md-4",'Placeholder'=> "",'required' => $name_2_Req ,'Dir'=> "Ar_Lang");
    $Err[] = NF_PrintInput("Text".$EditFilde,$ALang['cust_name_2'],"name_2","0","0",$name_2_Req_php,$MoreS);

    echo '<div style="clear: both!important;"></div>';


    $MoreS = array('Col'=> "col-md-3",'required' => 'data-parsley-type="digits" '.MOBILE_REQUIRED_TYPE , 'Dir'=> "En_Lang" );
    $Err[] = NF_PrintInput("Text".$EditFilde,$ALang['cust_mobile'],"mobile","0","0","optin-num",$MoreS);

    $MoreS = array('Col'=> "col-md-3",'required' => 'data-parsley-type="digits" '.MOBILE_REQUIRED_TYPE, 'Dir'=> "En_Lang" );
    $Err[] = NF_PrintInput("Text".$EditFilde,$ALang['cust_mobile'],"mobile_2","0","0","optin-num",$MoreS);


    $MoreS = array('Col' => "col-md-3",'required' => 'data-parsley-type="digits" '. PHONE_REQUIRED_TYPE, 'Dir'=> "En_Lang" );
    $Err[] = NF_PrintInput("Text".$EditFilde,$ALang['cust_phone'],"phone","0","0","optin-num",$MoreS);

    $MoreS = array('Col' => "col-md-3",'required' => 'data-parsley-type="digits" '. PHONE_REQUIRED_TYPE, 'Dir'=> "En_Lang" );
    $Err[] = NF_PrintInput("Text".$EditFilde,$ALang['cust_phone'],"phone_2","0","0","optin-num",$MoreS);

    echo '<div style="clear: both!important;"></div>';

    $MoreS = array('Col' => "col-md-3",'required' => 'data-parsley-type="digits" '. PHONE_REQUIRED_TYPE, 'Dir'=> "En_Lang" );
    $Err[] = NF_PrintInput("Text".$EditFilde,$ALang['cust_fax'],"fax","0","0","optin-num",$MoreS);

    $MoreS = array('Col' => "col-md-3",'Placeholder'=> "",'required' => 'data-parsley-type="email"', 'Dir'=> "En_Lang" );
    $Err[] = NF_PrintInput("Text".$EditFilde,$ALang['cust_email'],"email","0","0","optin-email",$MoreS);

    echo '<div style="clear: both!important;"></div>'.BR;

    $MoreS = array('Col' => "col-md-6",'required' => '');
    $Err[] = NF_PrintInput("TextArea".$EditFilde,$ALang['cust_address'],"address","0","0","req",$MoreS);
    $MoreS = array('Col'=>"col-md-6" ,'required' => '' );
    $Err[] = NF_PrintInput("TextArea".$EditFilde,$ALang['cust_notes'],"notes","0","0","option",$MoreS);
    echo '<div style="clear: both!important;"></div>'.BR;

}

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #   Customer_Print_LoginInfo
function Customer_Print_LoginInfo($PageType,$row){
    global $ALang ;

    if($PageType == 'Edit'){
        $EditFilde = "Edit";
        $name_2_Req = ' data-parsley-type="alphanum" ';
        $name_2_Req_php = '';
    }else{
        $EditFilde = "";
        $name_2_Req = 'required data-parsley-type="alphanum"';
        $name_2_Req_php = 'req';
    }

    New_Print_Alert("2",$ALang['cust_login_h1']);

    $MoreS = array('Col' => "col-md-6",'Placeholder'=> "",'required' => 'required data-parsley-type="alphanum" data-parsley-minlength="5" ','Dir'=> "En_Lang");
    $Err[] = NF_PrintInput("Text".$EditFilde,$ALang['cust_login_user'],"user_name","1","1","req",$MoreS);

    $MoreS = array('Col' => "col-md-6",'Placeholder'=> "",'required' => $name_2_Req,'Dir'=> "En_Lang");
    $Err[] = NF_PrintInput("Text",$ALang['cust_login_pass'],"user_pass","0","1",$name_2_Req_php,$MoreS);

    echo '<div style="clear: both!important;"></div>'.BR;

}

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #   Customer_Print_SMS_Config
function Customer_Print_SMS_Config($PageType,$row){
    global $ALang ;

    if($PageType == 'Edit'){
        $EditFilde = "Edit";
    }else{
        $EditFilde = "";
    }

    New_Print_Alert("2",$ALang['cust_sms_config']);

    $MoreS = array('Col'=> "col-md-6",'required' => 'required data-parsley-type="digits" '. MOBILE_REQUIRED_TYPE , 'Dir'=> "En_Lang" );
    $Err[] = NF_PrintInput("Text".$EditFilde,$ALang['cust_sms_mobile'],"sms_mobile","0","0","req-num",$MoreS);

    $MoreS = array('Col' => "col-md-6",'Placeholder'=> "",'required' => 'required data-parsley-type="email"', 'Dir'=> "En_Lang" );
    $Err[] = NF_PrintInput("Text".$EditFilde,$ALang['cust_sms_email'],"sms_email","0","0","req-email",$MoreS);

    echo '<div style="clear: both!important;"></div>'.BR;

}

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #
function Customer_Print_Photo($PageType,$row){
    global $ALang ;
    global $ConfigP ;

    New_Print_Alert("5",$ALang['cust_logo_h1']);

    if($PageType == 'Edit'){
        $EditFilde = "Edit";
        $photo_t = $row['photo_t'];
    }else{
        $EditFilde = "Add";
        $photo_t = "";
    }

    $Arr= array("Col"=> "col-md-6" ,"name"=> "photo" ,"photo"=> $photo_t ,"path"=> F_PATH_V ,'required' => '','upload_type'=>$ConfigP['defphoto_cust']) ;
    New_PrintFilePhoto($EditFilde,$Arr);

}







?>