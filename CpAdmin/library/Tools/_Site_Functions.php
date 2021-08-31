<?php
#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #    Save Vote
function SaveVote(){
    global $db;
    $GoogleCode = new GoogleAuthenticator();
    $VoteKey = $GoogleCode->createSecret(25);
    $TAddDate = FULLDate_ForToday();
    $v_code = GetVcodeCount() ;

    $ThIsIsTest = '0';


    if(isset($_POST['evaluation_vote'])){
        $count_vote = count($_POST['evaluation_vote']);
    }else{
        $count_vote = '0';
    }
    if($ThIsIsTest == '1'){
        $v_code['Code'] = '123';
    }

    $v_code['Code'] = '123';

    $Vote_Data = array ('id'=> NULL ,
        ##
        'date_add'=> $TAddDate['Stamp'] ,
        'date_month'=> $TAddDate['Month']."-".$TAddDate['Year'],
        'date_year'=> $TAddDate['Year'],
        'date_time'=>  time() ,
        ##
        'vote_key'=> $VoteKey,
        'cust_id'=> Clean_Mypost($_POST['cust_id']),
        'emp_id'=> Clean_Mypost($_POST['emp_id']),
        ##
        'customer_name'=>Clean_Mypost($_POST['customer_name']),
        'customer_mobile'=>Clean_Mypost($_POST['customer_mobile']),
        'count_vote'=> $count_vote ,
        'v_code'=> $v_code['Code'] ,
        'state'=> "0",
    );

    if($ThIsIsTest == '1'){
        print_r3($Vote_Data);
    }else{
        $db->AutoExecute("survey_vote",$Vote_Data,AUTO_INSERT);
    }




    if($count_vote != '0'){
        for($i=0; $i<$count_vote; $i++){

            $Vote_Answer = array ('id'=> NULL ,
                ##
                'date_add'=> $TAddDate['Stamp'] ,
                'date_month'=> $TAddDate['Month']."-".$TAddDate['Year'],
                'date_year'=> $TAddDate['Year'],
                'date_time'=>  time() ,

                ##
                'cust_id'=> Clean_Mypost($_POST['cust_id']),
                'emp_id'=> Clean_Mypost($_POST['emp_id']),
                'vote_key'=> $VoteKey,
                'answer_id'=> $_POST['evaluation_id'][$i],
                'answer_val'=> $_POST['evaluation_vote'][$i],
                ##
                'state'=> "0",
            );
                if($ThIsIsTest == '1'){
                    print_r3($Vote_Answer);
                }else{
                    $db->AutoExecute("survey_vote_answer",$Vote_Answer,AUTO_INSERT);
                }
        }
    }
    if($ThIsIsTest != '1') {
        Redirect_Page_2(WEB_ROOT . "EvaluationConfirm/" . $VoteKey);
    }
}



#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #     ConfirmEvaluationVote
function ConfirmEvaluationVote(){
    global  $db;
    $vote_key = $_POST['vote_key'];

    $UpdateVote = array (
        'state'=> "1",
    );

    $SqlVote = "select * from survey_vote where vote_key = '$vote_key'";
    $already_vote = $db->H_Total_Count($SqlVote);
    if($already_vote != '0'){
        $db->AutoExecute("survey_vote",$UpdateVote,AUTO_UPDATE,"vote_key = '$vote_key'");
    }

    $SqlVoteAnswer = "select * from survey_vote_answer where vote_key = '$vote_key'";
    $already_vote_answer = $db->H_Total_Count($SqlVoteAnswer);
    if($already_vote_answer != '0'){
        $db->AutoExecute("survey_vote_answer",$UpdateVote,AUTO_UPDATE,"vote_key = '$vote_key'");
    }

    Redirect_Page_2(WEB_ROOT.'EvaluationThanks/'.$vote_key);
}



#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #   GetVcodeCount
function GetVcodeCount(){
    global $db ;
    $SMS_Config = $db->H_SelectOneRow("select * from config_sms ");
    $v_code = Rand_Number_H($SMS_Config['vcode_count']);
    return  array("Count"=> $SMS_Config['vcode_count'] ,"Code"=> $v_code );
}

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #    GetEvaluation_ID_FromUrl
function GetEvaluation_ID_FromUrl($SendTo,$MobileTest){
    global $db ;
    if($MobileTest == '1'){

        $Meta = array();
        $GetId = Url_Slug(trim($_GET['id']));
        if( $GetId == ""  ){
            Redirect_Home($SendTo);
            exit;
        }
        $SQL_Line = "SELECT * FROM employee WHERE name_m = '$GetId' and state = '1' " ;
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


#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #
function GetEvaluationConfirm_ID_FromUrl($SendTo,$MobileTest){
    global $db ;

    if($MobileTest == '1'){

        $Meta = array();
        $GetId = Url_Slug(trim($_GET['id']));
        if( $GetId == ""  ){
            Redirect_Home($SendTo);
            exit;
        }

        #$SQL_Line = "SELECT * FROM survey_vote WHERE  	vote_key = '$GetId' and state = '0' " ;
        $SQL_Line = "SELECT * FROM survey_vote WHERE  	vote_key = '$GetId' " ;
        $already = $db->H_Total_Count($SQL_Line);
        if ($already > 0){
            $row = $db->H_SelectOneRow($SQL_Line);
            $Meta = array (
                'id' => $row['id'] ,
                'cust_id' => $row['cust_id'] ,
                'emp_id' => $row['emp_id'] ,
                'vote_key' => $row['vote_key'] ,
                'customer_name' => $row['customer_name'] ,
                'customer_mobile' => $row['customer_mobile'] ,
                'v_code' => $row['v_code'] ,
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


#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #   GetAllConfig
function GetAllConfig() {
    global $db ;
    $row = $db->H_SelectOneRow("SELECT * FROM config");
    $SiteConfig = unserialize($row['web_config']);
    $photo = array(
        'photo_logo' => LOGOS_IMAGE_DIR_V.$row['photo_logo'],
    );
    return array(
        'SiteConfig' => $SiteConfig,
        'Photo' => $photo,
    );
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