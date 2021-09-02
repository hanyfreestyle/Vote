<?php

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #   Update_Survey_Report_Temp
function Update_Survey_Report_Temp($CustomerId,$startDate,$endDate){
    global $db;
    $db->H_DELETE_Filte_With_Filde('survey_report_temp','cust_id',$CustomerId);

    $employee_Sql_Line = "SELECT * FROM employee where cust_id = '$CustomerId'";
    $employee_Count = $db->H_Total_Count($employee_Sql_Line);
    if($employee_Count > 0){
        $Name = $db->SelArr($employee_Sql_Line);
        for($i = 0; $i < count($Name); $i++) {
            $evaluation_Num = GetAllEmployeeReport($Name[$i]['id'],$Name[$i]['cust_id'],$startDate,$endDate);
            $thisId =$Name[$i]['id'];
            # echo $thisId.BR;
            $server_data = array ('crunt_all_evaluation'=> $evaluation_Num['evaluation_save']);
            # print_r3($server_data);
            $db->AutoExecute('employee',$server_data,AUTO_UPDATE,"id = $thisId");
            UpdateReportTemp($CustomerId,$thisId,$startDate,$endDate);
        }
    }
}

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #    UpdateReportTemp
function UpdateReportTemp($CustomerId,$emp_id,$startDate,$endDate){
    global $db;

    $survey_vote_Sql_Line = "SELECT * FROM survey_vote where state = '1'";
    $survey_vote_Sql_Line .= "and cust_id = '$CustomerId' ";
    $survey_vote_Sql_Line .= "and emp_id = '$emp_id' ";
    $survey_vote_Sql_Line .= " and  date_add  >= '$startDate' ";
    $survey_vote_Sql_Line .= " and  date_add  <= '$endDate' ";

    $survey_vote_Count = $db->H_Total_Count($survey_vote_Sql_Line);


    $survey_Sql_Line = "SELECT * FROM survey where cust_id = '$CustomerId' " ;
    $survey_Count = $db->H_Total_Count($survey_Sql_Line);
    if($survey_Count > 0 and $survey_vote_Count > 0){
        $Name = $db->SelArr($survey_Sql_Line);
        for($i = 0; $i < count($Name); $i++) {
            $SurveyEvaluation_Num = GetEvaluationForSurvey($Name[$i]['id'],$emp_id,$startDate,$endDate);

            $server_data = array (
                'cust_id'=> $CustomerId,
                'emp_id'=> $emp_id,
                'answer_id'=> $Name[$i]['id'],
                'answer_val'=> $SurveyEvaluation_Num['evaluation_save'],
            );

            $db->AutoExecute("survey_report_temp",$server_data,AUTO_INSERT);
            #print_r3($server_data);

        }
    }
}

function GetDataFromTabel($CustomerId,$surveyId){
    global $db ;
    $Sql = "SELECT * FROM survey_report_temp where cust_id = '$CustomerId' and answer_id = '$surveyId' order by answer_val desc ";
    $row_best = $db->H_SelectOneRow($Sql);
    $empId = $row_best['emp_id'];

    $Sql = "SELECT * FROM employee where id = '$empId'";
    $row_emp = $db->H_SelectOneRow($Sql);

    return array('evaluation'=>$row_best['answer_val'] ,'name'=>$row_emp['name'],'name_m'=>$row_emp['name_m'],'photo'=>$row_emp['photo']);

}
