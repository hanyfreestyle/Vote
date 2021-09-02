<?php
if(!defined('WEB_ROOT')) {	exit;}

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #       GetEvaluationForSurvey
function GetEvaluationForSurvey($SurveyId,$emp_id,$startDate,$endDate){
    global $db;
    #$already_vote_Sql = "select * from survey_vote_answer where answer_id = '$SurveyId' and date_month = '$date_month'";
    $already_vote_Sql = "select * from survey_vote_answer where answer_id = '$SurveyId'";
    $already_vote_Sql .= " and  emp_id  = '$emp_id' ";
    $already_vote_Sql .= " and  date_add  >= '$startDate' ";
    $already_vote_Sql .= " and  date_add  <= '$endDate' ";

    $already_vote_count = $db->H_Total_Count($already_vote_Sql);
    if($already_vote_count == '0'){
        $evaluation_Num = '';
        $evaluation_save = '0';
    }else{
        $already_vote_Done_Sql = $already_vote_Sql . " and answer_val = '1' ";
        $already_vote_Done_count = $db->H_Total_Count($already_vote_Done_Sql);
        if($already_vote_Done_count <= '0'){
            $evaluation_Num = "0 %";
            $evaluation_save = '0';
        }else{
            $evaluation_Num_sum = ($already_vote_Done_count/$already_vote_count)*100 ;
            $evaluation_Num_sum =  round($evaluation_Num_sum);
            $evaluation_save = $evaluation_Num_sum;
            $evaluation_Num_sum =  ChangeToArUnmber($evaluation_Num_sum);
            $evaluation_Num = $evaluation_Num_sum . " %";
        }
    }
    return  array('evaluation_Num'=>$evaluation_Num ,'evaluation_save'=>$evaluation_save);
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
function GetAllEmployeeReport($emp_id,$cust_id,$startDate,$endDate,$sendData=array()){
    global $db;

    $already_vote_Sql  = "select * from survey_vote_answer where ";
    $already_vote_Sql .= " emp_id = '$emp_id' ";
    $already_vote_Sql .= " and  cust_id = '$cust_id' ";
    $already_vote_Sql .= " and  date_add  >= '$startDate' ";
    $already_vote_Sql .= " and  date_add  <= '$endDate' ";

    $already_vote_count = $db->H_Total_Count($already_vote_Sql);
    if($already_vote_count == '0'){
        $evaluation_Num = '<i class="fa fa-hourglass-2"></i>';
        $evaluation_save = '0';
    }else{
        $already_vote_Done_Sql = $already_vote_Sql . " and answer_val = '1' ";
        $already_vote_Done_count = $db->H_Total_Count($already_vote_Done_Sql);

        if($already_vote_Done_count <= '0'){
            $evaluation_Num = "0 %";
            $evaluation_save = '0';
        }else{
            $evaluation_Num_sum = ($already_vote_Done_count/$already_vote_count)*100 ;
            $evaluation_Num_sum =  round($evaluation_Num_sum);
            $evaluation_save = $evaluation_Num_sum;
            $evaluation_Num_sum =  ChangeToArUnmber($evaluation_Num_sum);
            $evaluation_Num = $evaluation_Num_sum . " %";

        }

    }
        return  array('evaluation_Num'=>$evaluation_Num ,'evaluation_save'=>$evaluation_save);

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

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #       GetSel
function GetSel($name,$val){
    global $row;
    $re = "";

    if($row[$name] == $val ){
        $re = 'selected';
    }
    return $re ;
}

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #       hetseeEditNew
function hetseeEditNew($Name) {
    global $row;
    if(isset($_POST[$Name])) {
        $v = $_POST[$Name];
    } else {
        $v = $row[$Name];
    }
    return $v;
}

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #   GetMonthNamePrint
function GetMonthNamePrint($Stamp) {
    $namemonth =  intval(date("m",$Stamp));
    $Year =  intval(date("Y",$Stamp));


    switch($namemonth) {
        case 1:
            $namemonth = "يناير";
            break;
        case 2:
            $namemonth = "فبراير";
            break;
        case 3:
            $namemonth = "مارس";
            break;
        case 4:
            $namemonth = "إبريل";
            break;
        case 5:
            $namemonth = "مايو";
            break;
        case 6:
            $namemonth = "يونيو";
            break;
        case 7:
            $namemonth = "يوليو";
            break;
        case 8:
            $namemonth = "اغسطس";
            break;
        case 9:
            $namemonth = "سبتمبر";
            break;
        case 10:
            $namemonth = "اكتوبر";
            break;
        case 11:
            $namemonth = "نوفمبر";
            break;
        case 12:
            $namemonth = "ديسمبر";
            break;
    }
    return $namemonth ." ".ChangeToArUnmber($Year);
}

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #   GetReportDateRang
function GetReportDateRang($config){
    if($config == null){
        $start = strtotime("first day of this month 00:00:00");
        $end = strtotime("last day of this month 00:00:00");
        $Text = 'الشهر الحالى';
    }else{
        $configSle = unserialize($config);
        # print_r3($configSle);

        if($configSle['sel_date_type'] == '2'){
            $start = strtotime("first day of previous month 00:00:00");
            $end = strtotime("last day of previous month 00:00:00");
            $fromText = GetARDate2($start);
            $toText = GetARDate2($end);
            $fullText = ":". " من ".$fromText ." حتى " .$toText;
            $Text = 'الشهر السابق'.' <span class="rangeInfo">'.$fullText.' </span>';

        }elseif ($configSle['sel_date_type'] == '3'){
            $monday = strtotime("last saturday 00:00:00");
            $monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
            $sunday = strtotime(date("Y-m-d",$monday)." +6 days 00:00:00");
            $start = $monday;
            $end = $sunday;
            $fromText = GetARDate2($start);
            $toText = GetARDate2($end);
            $fullText = ":". " من ".$fromText ." حتى " .$toText;
            $Text = 'الاسبوع الحالى '.' <span class="rangeInfo">'.$fullText.' </span>';

        }elseif ($configSle['sel_date_type'] == '4'){

            $monday = strtotime("last saturday 00:00:00");
            $monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
            $monday = $monday - (7*86400) ;
            $sunday = strtotime(date("Y-m-d",$monday)." +6 days 00:00:00");
            $start = $monday;
            $end = $sunday;
            $fromText = GetARDate2($start);
            $toText = GetARDate2($end);
            $fullText = ":". " من ".$fromText ." حتى " .$toText;
            $Text =  'الاسبوع السابق '.' <span class="rangeInfo">'.$fullText.' </span>';

        }elseif ($configSle['sel_date_type'] == '5'){
            $start = $configSle['date_from'];
            $end = $configSle['date_to'];;
            $fromText = GetARDate2($start);
            $toText = GetARDate2($end);
            $fullText = ":". " من ".$fromText ." حتى " .$toText;
            $Text =  'فترة محددة  '.' <span class="rangeInfo">'.$fullText.' </span>';
        }else{
            $start = strtotime("first day of this month 00:00:00");
            $end = strtotime("last day of this month 00:00:00");
            $fromText = GetARDate2($start);
            $toText = GetARDate2($end);
            $fullText = ":". " من ".$fromText ." حتى " .$toText;
            $Text = 'الشهر الحالى'.' <span class="rangeInfo">'.$fullText.' </span>';
        }

    }

    $FullDate = array("start"=>$start ,"end"=> $end ,'text'=> $Text  );
    return $FullDate ;
}

#UpdateField("survey_vote_answer",'answer_val','0');
#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #   UpdateField
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


?>

