<?php

function SaveVote_TestDemo($ThIsIsTest,$date_add){
    global $db;
    $GoogleCode = new GoogleAuthenticator();
    $VoteKey = $GoogleCode->createSecret(25).rand_string_2('5');

    $cust_id = "1";
    $survey_Sql_Line = "select * from survey where cust_id = '$cust_id' ";
    $count_vote = $db->H_Total_Count($survey_Sql_Line);
    $emp_id = rand(3,7);

    $v_code['Code'] = '123';

    $Vote_Data = array ('id'=> NULL ,
        ##
        'date_add'=> $date_add ,
        'date_month'=> "",
        'date_year'=> "",
        'date_time'=>  $date_add ,
        ##
        'vote_key'=> $VoteKey,
        'cust_id'=> $cust_id,
        'emp_id'=> $emp_id,
        ##
        'customer_name'=>" اسم العميل هنا ".rand_string_2('5'),
        'customer_mobile'=>"05".rand_string_2('8'),
        'city_id'=>rand(1,83),
        'count_vote'=> $count_vote ,
        'v_code'=> "123" ,
        'state'=> "1",
    );

    if($ThIsIsTest == '1'){
        print_r3($Vote_Data);
    }else{
        $db->AutoExecute("survey_vote",$Vote_Data,AUTO_INSERT);
    }




    if($count_vote != '0'){
        $Name = $db->SelArr($survey_Sql_Line);
        for($i = 0; $i < count($Name); $i++) {

            $Vote_Answer = array ('id'=> NULL ,
                ##
                'date_add'=> $date_add ,
                'date_month'=> "",
                'date_year'=> "",
                'date_time'=> $date_add ,

                ##
                'cust_id'=> $cust_id,
                'emp_id'=> $emp_id,
                'vote_key'=> $VoteKey,
                'answer_id'=> $Name[$i]['id'],
                'answer_val'=> rand(0,1),
                ##
                'state'=> "1",
            );
            if($ThIsIsTest == '1'){
                print_r3($Vote_Answer);
            }else{
                $db->AutoExecute("survey_vote_answer",$Vote_Answer,AUTO_INSERT);
            }
        }
    }

}

function rand_string_2($num_chars) {
    $ret ="";
    $chars = array("1","2","3","4","5","6","7","8","9","0","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
    $chars = array("1","2","3","4","5","6","7","8","9");
    $string = array_rand($chars,$num_chars);
    foreach($string as $s) {
        $ret .= $chars[$s];
    }
    return $ret;
}


/*
$TabelName = "sa_cities";
$Name = $db->SelArr("SELECT * FROM $TabelName ");
for($i = 0; $i < count($Name); $i++) {
    $thisId =$Name[$i]['provinceId'];
    $id = $i+1;
    $server_data = array (
        'id'=> $id  ,
    );
    $db->AutoExecute($TabelName,$server_data,AUTO_UPDATE,"provinceId = $thisId");
}
*/


?>