<?php
if(!defined('WEB_ROOT')) {	exit;}

#UpdateField("survey_vote_answer",'answer_val','0');

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #
function UpdateField($TabelName,$fieldName,$NewVal ){
    #$TabelName = "survey_vote_answer";
    global $db ;
    $Name = $db->SelArr("SELECT * FROM $TabelName");
    for($i = 0; $i < count($Name); $i++) {
        $F_id = $Name[$i]['id'];
        $server_data = array (
            $fieldName=> $NewVal  ,
        );
        $db->AutoExecute($TabelName,$server_data,AUTO_UPDATE,"id = $F_id");
    }
}

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #       GetEvaluationForSurvey
function GetEvaluationForSurvey($SurveyId,$date_month){
    global $db;
    $already_vote_Sql = "select * from survey_vote_answer where answer_id = '$SurveyId' and date_month = '$date_month'";
    $already_vote_count = $db->H_Total_Count($already_vote_Sql);
    if($already_vote_count == '0'){
        $evaluation_Num = '';
    }else{
        $already_vote_Done_Sql = $already_vote_Sql . " and answer_val = '1' ";
        $already_vote_Done_count = $db->H_Total_Count($already_vote_Done_Sql);
        if($already_vote_Done_count <= '0'){
            $evaluation_Num = "0 %";
        }else{
            $evaluation_Num_sum = ($already_vote_Done_count/$already_vote_count)*100 ;
            $evaluation_Num_sum =  round($evaluation_Num_sum);
            $evaluation_Num_sum =  ChangeToArUnmber($evaluation_Num_sum);
            $evaluation_Num = $evaluation_Num_sum . " %";
        }
    }
    return  $evaluation_Num ;
}


#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #    GetAllCustomerReport
function GetAllCustomerReport($CustRow){
    global $db;
    $vote_key = $CustRow['vote_key'];

    $already_vote_Sql = "select * from survey_vote_answer where vote_key = '$vote_key' ";
    $already_vote_count = $db->H_Total_Count($already_vote_Sql);

    if($already_vote_count == '0'){
        $evaluation_Num = '';
    }else{
        $already_vote_Done_Sql = $already_vote_Sql . " and answer_val = '1' ";
        $already_vote_Done_count = $db->H_Total_Count($already_vote_Done_Sql);
        if($already_vote_Done_count <= '0'){
            $evaluation_Num = "0 %";
        }else{
            $evaluation_Num_sum = ($already_vote_Done_count/$already_vote_count)*100 ;
            $evaluation_Num_sum =  round($evaluation_Num_sum);
            $evaluation_Num_sum =  ChangeToArUnmber($evaluation_Num_sum);

            $evaluation_Num = $evaluation_Num_sum . " %";
        }

    }
    return  $evaluation_Num ;
}



#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #   GetAllEmployeeReport
function GetAllEmployeeReport($emp_id,$cust_id,$thisMonth,$thisYear,$sendData=array()){
    global $db;
    $date_month = $thisMonth.'-'.$thisYear ;
    $already_vote_Sql = "select * from survey_vote_answer where 
                                       emp_id = '$emp_id' and  
                                       cust_id = '$cust_id' and  
                                       date_month = '$date_month' and 
                                       state = '1'  ";

    $already_vote_count = $db->H_Total_Count($already_vote_Sql);
    if($already_vote_count == '0'){
        $evaluation_Num = '<i class="fa fa-hourglass-2"></i>';
    }else{
        $already_vote_Done_Sql = $already_vote_Sql . " and answer_val = '1' ";
        $already_vote_Done_count = $db->H_Total_Count($already_vote_Done_Sql);

        if($already_vote_Done_count <= '0'){
            $evaluation_Num = "0 %";
        }else{
            $evaluation_Num_sum = ($already_vote_Done_count/$already_vote_count)*100 ;
            $evaluation_Num_sum =  round($evaluation_Num_sum);
            $evaluation_Num_sum =  ChangeToArUnmber($evaluation_Num_sum);

            $evaluation_Num = $evaluation_Num_sum . " %";
        }

    }
    return  $evaluation_Num ;

}

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #    ChangeToArUnmber
function ChangeToArUnmber($value) {
    global $WebSiteLang ;

    $value = trim($value);
    $rep1 = array('1','2','3','4','5','6','7','8','9','0');
    $rep2 = array('١','٢','٣','٤','٥','٦','٧','٨','٩','٠');
    $value = str_replace($rep1,$rep2,$value);
    return $value;
}

?>

