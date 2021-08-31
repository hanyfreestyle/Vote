<?php
if(!defined('WEB_ROOT')) {	exit;}

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #    EmployeesAdd
function EmployeesAdd($db){
    $ThisIsTest = "0";
    global $GoogleCode ;

    $Google_Code = $GoogleCode->createSecret();
    $UserKey = $GoogleCode->createSecret();
    $TAddDate = FULLDate_ForToday();

    $ArrConfig =array("UpLoadType"=> $_POST['upload_type']);
    $photoUp =  Add2Photo("0",$ArrConfig);

    $server_data = array ('id'=> NULL ,
        ## User Login Info
        'user_key'=> $UserKey,
        'google_code'=> $Google_Code,
        'last_seen'=>  time() ,
        ##
        'date_add'=> $TAddDate['Stamp'] ,
        'date_month'=> $TAddDate['Month']."-".$TAddDate['Year'],
        'date_time'=>  time() ,
        'cust_id'=> PostIsset("cust_id"),
        ##
        'name'=> PostIsset("name"),
        'mobile'=> PostIsset("mobile"),
        'jop'=>PostIsset("jop"),
        ##
        'photo'=> $photoUp['photo'] ,
        'photo_t'=> $photoUp['photo_t'] ,
        'state'=> "1",
    );

    if( $photoUp['photoErr'] != '1'){
        if($ThisIsTest == '1'){
            print_r3($server_data);
        }else{
            $db->AutoExecute("employee",$server_data,AUTO_INSERT);
            $LastIdAdd =  $db->GetId();
            $UpdateUrl = array (
                'name_m'=> Rand_String_H("10").$LastIdAdd,
            );
            $db->AutoExecute("employee",$UpdateUrl,AUTO_UPDATE,"id = $LastIdAdd");
            Redirect_Page_2('index.php?view=EmployeesList');
        }
    }
}



#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #   EmployeesEdit
function EmployeesEdit($db){
    $ThIsIsTest = '0';
    $id = $_GET['id'];

    $ArrConfig =array("UpLoadType"=> $_POST['upload_type']);
    $photoUp = Edit2Photo("employee",$ArrConfig);


    $server_data = array (
        'name'=> PostIsset("name"),
        'mobile'=> PostIsset("mobile"),
        'jop'=>PostIsset("jop"),
        'photo'=> $photoUp['photo'] ,
        'photo_t'=> $photoUp['photo_t'] ,
    );
    if($ThIsIsTest == '1'){
        print_r3($server_data);
    }else{
        $db->AutoExecute("employee",$server_data,AUTO_UPDATE,"id = $id");
        Redirect_Page_2("index.php?view=EmployeesList");
    }
}



#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #   AddNewAnswer
function AddNewAnswer($db){
    $ThIsIsTest = '0';
    $server_data = array ('id'=> NULL ,
        'cat_id'=> PostIsset("cat_id") ,
        'cust_id'=> PostIsset("cust_id") ,
        'name'=> PostIsset("name"),
        'state'=> "1"  ,
    );
    if($ThIsIsTest == '1'){
        print_r3($server_data);
    }else{
        $db->AutoExecute("survey_list",$server_data,AUTO_INSERT);
        Redirect_Page_2("index.php?view=SurveysEdit&id=".PostIsset("cat_id"));
    }
}

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #   EditAnswer
function EditAnswer($db){
    $ThIsIsTest = '0';
    $id = $_GET['id'];

    $surveyIDD = PostIsset_Intval('surveyIDD');
    $server_data = array (
        'name'=> PostIsset('name'),
    );

    if($ThIsIsTest == '1'){
        print_r3($server_data);
    }else{
        $db->AutoExecute("survey_list",$server_data,AUTO_UPDATE,"id = $id");
        Redirect_Page_2("index.php?view=SurveysEdit&id=".$surveyIDD);
    }
}

function ChangeToArUnmber($value) {
    global $WebSiteLang ;

    $value = trim($value);
    $rep1 = array('1','2','3','4','5','6','7','8','9','0');
    $rep2 = array('١','٢','٣','٤','٥','٦','٧','٨','٩','٠');
    $value = str_replace($rep1,$rep2,$value);
    return $value;
}

?>