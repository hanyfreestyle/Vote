<?php
if(!defined('WEB_ROOT')) {	exit;}
#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #   Add_Survey
function Add_Survey($db){
    $ThIsIsTest = '0';
    $server_data = array ('id'=> NULL ,
        'cust_id'=> PostIsset("cust_id") ,
        'name'=> PostIsset('name'),
        'state'=> "1"  ,
    );
    if($ThIsIsTest == '1'){
        print_r3($server_data);
    }else{
        $db->AutoExecute("survey",$server_data,AUTO_INSERT);
        $LastId = $db->GetId();
        for ($i = 1; $i <= 7; $i++) {
            if(trim(PostIsset("optin".$i)) != ''){
                $server_data = array ('id'=> NULL ,
                    'cat_id'=> $LastId ,
                    'cust_id'=> PostIsset("cust_id") ,
                    'name'=> PostIsset("optin".$i),
                    'state'=> "1"  ,
                );
                $db->AutoExecute("survey_list",$server_data,AUTO_INSERT);
            }
        }
        Redirect_Page_2("index.php?view=SurveysList");
    }
}

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #   Edit_Survey
function Edit_Survey($db){
    $ThIsIsTest = '0';
    $id = $_GET['id'];
    $server_data = array (
        'name'=> PostIsset('name'),
    );
    if($ThIsIsTest == '1'){
        print_r3($server_data);
    }else{
        $db->AutoExecute("survey",$server_data,AUTO_UPDATE,"id = $id");
        Redirect_Page_2("index.php?view=SurveysList");
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



?>