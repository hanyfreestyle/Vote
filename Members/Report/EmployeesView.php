<?php
$TAddDate = FULLDate_ForToday();
$thisMonth = $TAddDate['Month'] ;
$thisYear = $TAddDate['Year'] ;
$MonthName = GetMonthName($thisMonth);
$date_month = $thisMonth.'-'.$thisYear ;
$PrintDate = $MonthName." ".ChangeToArUnmber($thisYear);
$CustomerId = $Members_Row['id'];
$row = $db->H_CheckTheGet("id","name_m","employee","2");

$survey_vote_Sql_Line = "SELECT * FROM survey_vote where state = '1' and  
                                               cust_id = '$CustomerId' and 
                                               date_month = '$date_month' ";
$survey_vote_Count = $db->H_Total_Count($survey_vote_Sql_Line);


if($DetectMobile->isMobile() != '1') {
    /*
?>

<div class="employee_container_for_report_pc" >
    <div class="row">
        <div class="col-7">
            <div class="row">
                <div class="col-7">
                    <div class="emp_info pr-2 mb-2"><?php echo $ALang['evl_form_emp_name'] ?>  : <span><?php echo $row['name'] ?></span></div>
                    <div class="emp_info pr-2 mb-2"><?php echo $ALang['evl_form_emp_jop'] ?>  : <span><?php echo $row['jop'] ?></span></div>
                    <div class="emp_info pr-2 mb-2"><?php echo $ALang['evl_form_emp_mobile'] ?>  : <span class="MobileNum"><?php echo ChangeToArUnmber($row['mobile']) ?></span></div>
                </div>
                <div class="col-5 employeePhotoDiv">
                    <img src="<?php echo WEBSITE_IMAGE_DIR_V.$row['photo_t'] ?>" class="employee_photo">
                </div>
            </div>
        </div>
    </div>
    <div class="col-5">

    </div>
</div>
<?php
    */
}

?>

<div class="report_list_cont">
    <div class="row">
        <?php
        $survey_Sql_Line = "SELECT * FROM survey where cust_id = '$CustomerId' " ;
        $survey_Count = $db->H_Total_Count($survey_Sql_Line);
        if($survey_Count > 0 and $survey_vote_Count > 0){
            $Name = $db->SelArr($survey_Sql_Line);
            for($i = 0; $i < count($Name); $i++) {
                    $SurveyEvaluation_Num = GetEvaluationForSurvey($Name[$i]['id'],$date_month);
                ?>
                <div class="col-md-6 col-12 mb-2 text-right">
                <span class="back_s  back_s_pr2  back_s4">
                    <span class="crop_text survey_name"><?php echo  $Name[$i]['name'] ?></span>
                    <span class="survey_name_num" > <?php echo $SurveyEvaluation_Num ?> </span>
                </span>
                </div>
                <?php
            }
        }
        ?>
    </div>
</div>

<div class="report_list_cont mt-2">
    <div class="row">
        <?php
        if($survey_vote_Count > 0){
            $Name = $db->SelArr($survey_vote_Sql_Line);
            for($i = 0; $i < count($Name); $i++) {
                $CityName = findValue_FromArr($All_City_Arr,'id',$Name[$i]['city_id'],'name');
                $CustomerEvaluation_Num = GetAllCustomerReport($Name[$i]);
                ?>
                <div class="col-md-6 col-9 mb-2  text-right">
                <span class="back_s back_s_pr2 back_s3">
                    <span class="d-stop font-weight-bold">العميل : </span>
                    <span > <?php echo  $Name[$i]['customer_name'] ?>  </span>
                    <span> <?php echo  $Name[$i]['customer_mobile'] ?> </span>
                </span>
                </div>
                <div class="col-md-3 d-stop mb-2 text-center">
                <span class="back_s back_s3">
                   <?php echo $CityName ?>
                </span>
                </div>
                <div class="col-md-3 col-3 mb-2 text-center">
                <span class="back_s back_s3 evl_num">
                    <?php echo $CustomerEvaluation_Num ?>
                </span>
                </div>
                <?php
            }
        }
        ?>
    </div>
</div>
