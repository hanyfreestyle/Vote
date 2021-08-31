<?php
#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #   ThisCustomerAdd
function ThisCustomerAdd($db){
    $ThisIsTest = "0";
    global $ALang ;
    global $GoogleCode ;

    $Google_Code = $GoogleCode->createSecret();
    $UserKey = $GoogleCode->createSecret();
    $Err_2 = "";

    $TAddDate = FULLDate_ForToday();
    $Name2 = PostIsset("name_2");
    if(trim ($Name2) == ''){
        $Name2 =    PostIsset("name");
    }

    $ArrConfig =array("UpLoadType"=> $_POST['upload_type']);
    $photoUp =  Add2Photo("0",$ArrConfig);

    $server_data = array ('id'=> NULL ,
        ## User Login Info
        'user_name'=> PostIsset("user_name"),
        'user_name_md'=> md5(strtolower(PostIsset("user_name"))),
        'user_pass'=> md5(md5(PostIsset("user_pass"))),
        'user_key'=> $UserKey,
        'google_code'=> $Google_Code,
        'last_seen'=>  time() ,
        ##
        'date_add'=> $TAddDate['Stamp'] ,
        'date_month'=> $TAddDate['Month']."-".$TAddDate['Year'],
        'date_time'=>  time() ,
        'user_id'=> PostIsset("user_id"),
        ##
        'sms_mobile'=> PostIsset("sms_mobile"),
        'sms_email'=> PostIsset("sms_email"),
        ##
        'name'=> PostIsset("name"),
        'name_2'=> $Name2,
        'mobile'=> PostIsset("mobile"),
        'mobile_2'=>PostIsset("mobile_2"),
        'phone'=> PostIsset("phone"),
        'phone_2'=> PostIsset("phone_2"),
        'fax'=> PostIsset("fax"),
        'email'=> PostIsset("email"),
        'notes'=> PostIsset("notes"),
        'address'=> PostIsset("address"),
        ##
        'photo'=> $photoUp['photo'] ,
        'photo_t'=> $photoUp['photo_t'] ,
        'state'=> "1",
        'sub_count'=> "0",
        'member_type'=> PostIsset_Intval("member_type"),


    );
    $server_data_2 = array (
        'mobile'=> PostIsset("mobile"),
        'mobile_2'=> PostIsset("mobile_2"),
        'phone'=> PostIsset("phone"),
        'phone_2'=> PostIsset("phone_2"),
        'fax'=> PostIsset("fax"),
    );

    $MainErr =  NewCheckWhenWeNeed();
    $Err =  CheckDuplicatesEntry($server_data_2);
    $Err_3 = CheckAll_PhoneNumber_For_Zero();

    if($Err == '1'){
        SendJavaErrMass($ALang['mainform_duplicated_data']);
    }else{
        if($Err_3 != '1'){
            $Err_2 = CheckAllCustData();
        }
    }

    if( $MainErr != "1" and $Err != "1" and $Err_2 != '1' and $Err_3 != '1' and $photoUp['photoErr'] != '1'){
        if($ThisIsTest == '1'){
            print_r3($server_data);
        }else{
            $db->AutoExecute("customer",$server_data,AUTO_INSERT);
            $LastIdAdd =  $db->GetId();
            $UpdateUrl = array (
                'name_m'=> Rand_String_H("10").$LastIdAdd,
            );
            $db->AutoExecute("customer",$UpdateUrl,AUTO_UPDATE,"id = $LastIdAdd");
            Redirect_Page_2('index.php?view=AddCustomer');
        }
    }
}

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #    ThisCustomerEdit
function ThisCustomerEdit($db){
    $ThisIsTest = "0";
    global $ALang ;
    $id = $_GET['id'];
    $Err_2 = "";

    $ArrConfig =array("UpLoadType"=> $_POST['upload_type']);
    $photoUp = Edit2Photo("customer",$ArrConfig);

    $server_data = array (
        ## User Login Info
        'user_name'=> PostIsset("user_name"),
        'user_name_md'=> md5(strtolower(PostIsset("user_name"))),

        ##
        'sms_mobile'=> PostIsset("sms_mobile"),
        'sms_email'=> PostIsset("sms_email"),
        ##
        'name'=> PostIsset("name"),
        'name_2'=> PostIsset("name_2"),
        'mobile'=> PostIsset("mobile"),
        'mobile_2'=>PostIsset("mobile_2"),
        'phone'=> PostIsset("phone"),
        'phone_2'=> PostIsset("phone_2"),
        'fax'=> PostIsset("fax"),
        'email'=> PostIsset("email"),
        'notes'=> PostIsset("notes"),
        'address'=> PostIsset("address"),
        ##
        'photo'=> $photoUp['photo'] ,
        'photo_t'=> $photoUp['photo_t'] ,
        'member_type'=> PostIsset_Intval("member_type"),
    );

    if(trim(PostIsset("user_pass")) != ""){
        $server_data = $server_data+array('user_pass'=> md5(md5(PostIsset("user_pass"))));
    }


    $server_data_2 = array (
        'mobile'=> PostIsset("mobile"),
        'mobile_2'=> PostIsset("mobile_2"),
        'phone'=> PostIsset("phone"),
        'phone_2'=> PostIsset("phone_2"),
        'fax'=> PostIsset("fax"),
    );

    $Err =  CheckDuplicatesEntry($server_data_2);
    $Err_3 = CheckAll_PhoneNumber_For_Zero();

    if($Err == '1'){
        SendJavaErrMass($ALang['mainform_duplicated_data']);
    }else{
        if($Err_3 != '1'){
            $Err_2 = CheckAllCustData($id);
        }
    }
    if($Err != "1" and $Err_2 != '1' and $Err_3 != '1' and $photoUp['photoErr'] != '1' ){
        if($ThisIsTest == '1'){
            print_r3($server_data);
        }else{
            $db->AutoExecute("customer",$server_data,AUTO_UPDATE,"id = $id");
            Redirect_Page_2(LASTREFFPAGE);
            Redirect_Page_2('index.php?view=ListCustomer');
        }
    }
}

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #   NewCheckWhenWeNeed
function NewCheckWhenWeNeed(){
    global $ALang;
    global $ConfigP ;
    $MainErr = "";

    return $MainErr ;
}

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #   CheckAll_PhoneNumber_For_Zero
function CheckAll_PhoneNumber_For_Zero(){
    global $ALang;
    $Err_3 = Check_PhoneNumber_For_Zero("mobile",$ALang['cust_mobile'],"mobile");
    if($Err_3 != "1"){
        $Err_3 = Check_PhoneNumber_For_Zero("mobile_2",$ALang['cust_mobile'],"mobile");
    }

    if($Err_3 != "1"){
        $Err_3 = Check_PhoneNumber_For_Zero("sms_mobile",$ALang['cust_sms_mobile'],"mobile");
    }

    if($Err_3 != "1"){
        $Err_3 =  Check_PhoneNumber_For_Zero("phone",$ALang['cust_phone']);
    }

    if($Err_3 != "1"){
        $Err_3 =  Check_PhoneNumber_For_Zero("phone_2",$ALang['cust_phone']);
    }
    if($Err_3 != "1"){
        $Err_3 =  Check_PhoneNumber_For_Zero("fax",$ALang['cust_fax']);
    }
    return $Err_3 ;
}

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #   Check_PhoneNumber_For_Zero
function Check_PhoneNumber_For_Zero($PostName,$Label_Name,$Type="other"){
    $Err_3 = "0";
    global $ALang ;
    if(isset($_POST[$PostName]) and trim($_POST[$PostName]) > 3 ){
        $PhoneNumber = $_POST[$PostName] ;
        if($Type == "mobile"){
            $PhOneLette2 =  $PhoneNumber[0].$PhoneNumber[1];
            $VAll= "05";
        }else{
            $PhOneLette2 =  $PhoneNumber[0];
            $VAll= "0";
        }
        if( $PhOneLette2 != $VAll ){
            SendJavaErrMass_22($ALang['cust_phone_area_err']." ".$Label_Name);
            $Err_3 = "1";
        }
    }
    return $Err_3 ;
}

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #   CheckAllCustData
function CheckAllCustData($Id='0'){
    global $ALang;
    $Err_2 =  PrintErrFromSQL_ForCust_2("mobile",$ALang['cust_mobile']." ".PostIsset('mobile'),$Id);

    if($Err_2 != "1"){
        $Err_2 =  PrintErrFromSQL_ForCust_2("user_name",$ALang['cust_login_user']." ".PostIsset('user_name'),$Id);
    }
    if($Err_2 != "1"){
        $Err_2 =  PrintErrFromSQL_ForCust_2("mobile_2",$ALang['cust_mobile']." ".PostIsset('mobile_2'),$Id);
    }
    if($Err_2 != "1"){
        $Err_2 =  PrintErrFromSQL_ForCust_2("phone",$ALang['cust_phone']." ".PostIsset('phone'),$Id);
    }
    if($Err_2 != "1"){
        $Err_2 =  PrintErrFromSQL_ForCust_2("phone_2",$ALang['cust_phone']." ".PostIsset('phone_2'),$Id);
    }
    if($Err_2 != "1"){
        $Err_2 =  PrintErrFromSQL_ForCust_2("fax",$ALang['cust_fax']." ".PostIsset('fax'),$Id);
    }
    if($Err_2 != "1"){
        $Err_2 =  PrintErrFromSQL_ForCust_2("email",$ALang['cust_email']." ".PostIsset('email'),$Id);
    }
    return $Err_2 ;
}

























?>