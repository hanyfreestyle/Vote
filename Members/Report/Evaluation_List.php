<?php
$DateRang = GetReportDateRang($Members_Row['report_config']);
$startDate = $DateRang['start'];
$endDate = $DateRang['end'];
$PrintDate = GetMonthNamePrint($endDate);

$CustomerId = $Members_Row['id'];

Update_Survey_Report_Temp($CustomerId,$startDate,$endDate);
?>

<div class="report_list_cont">
    <div class="row">
        <div class="col-md-12 col-12  text-right"><span class="back_s back_s_pr back_s1"><?php echo  $DateRang['text'] ?></span></div>
    </div>
</div>
<div class="report_list_cont mt-2" style="display: none">
    <div class="row">
        <div class="col-md-8 col-8  text-right"><span class="back_s back_s_pr back_s1">تقييم الموظفين خلال فترة</span></div>
        <div class="col-md-4 col-4 text-center"><span class="back_s PrintDate back_s1"><?php echo  $PrintDate ?></span></div>
    </div>
</div>

<div class="report_list_cont mt-2">
    <div class="row">
        <?php

        $row_best = $db->H_SelectOneRow( "SELECT * FROM employee where cust_id = '$CustomerId' order by crunt_all_evaluation desc ");
        $row_low = $db->H_SelectOneRow( "SELECT * FROM employee where cust_id = '$CustomerId' order by crunt_all_evaluation ASC ");
?>
        <div class="col-md-8 col-9 mb-2 text-right">
                <span class="Evaluation_Des_Span">
                    <span class= "font-weight-bold"> افضل تقييم </span><br>
                    <span class=""> <a href="index.php?view=EmployeesView&id=<?php echo  $row_best['name_m'] ?>"><?php echo  $row_best['name']   ?></a> </span><br/>
                    <span class=""> التقييم : <?php echo $row_best['crunt_all_evaluation'] ?> %</span>
                </span>
        </div>
        <div class="col-md-4 col-2 mb-2 text-center report_list_img_2">
            <img src="<?php echo WEBSITE_IMAGE_DIR_V.$row_best['photo'] ?>" >
        </div>

        <div class="col-md-8 col-9 mb-2 text-right">
                <span class="Evaluation_Des_Span">
                    <span class= "font-weight-bold"> اقل تقييم  </span><br>
                    <span class=""> <a href="index.php?view=EmployeesView&id=<?php echo  $row_low['name_m'] ?>"><?php echo  $row_best['name']   ?></a> </span><br/>
                    <span class=""> التقييم : <?php echo $row_low['crunt_all_evaluation'] ?> %</span>
                </span>
        </div>
        <div class="col-md-4 col-2 mb-2 text-center report_list_img_2">
            <img src="<?php echo WEBSITE_IMAGE_DIR_V.$row_low['photo'] ?>" >
        </div>

        <?php

        $survey_Sql_Line = "SELECT * FROM survey where cust_id = '$CustomerId'";
        $survey_Count = $db->H_Total_Count($survey_Sql_Line);
        if($survey_Count > 0){
            $Name = $db->SelArr($survey_Sql_Line);
            for($i = 0; $i < count($Name); $i++) {
                    $surveyId =$Name[$i]['id'];
                    $GetData = GetDataFromTabel($CustomerId,$surveyId);

                    #print_r3($GetData);
                #return array('emp_name'=>$row_emp['name'],'emp_photo'=>$row_emp['photo']);
                ?>
                <div class="col-md-8 col-9 mb-2 text-right">
                <span class="Evaluation_Des_Span">
                    <span class= "font-weight-bold"><?php echo  $Name[$i]['name']   ?></span><br>


                    <span class=""> <a href="index.php?view=EmployeesView&id=<?php echo  $GetData['name_m'] ?>"><?php echo  $GetData['name']   ?></a> </span><br/>
                    <span class=""> التقييم : <?php echo $GetData['evaluation'] ?> % </span>
                </span>
                </div>
                <div class="col-md-4 col-2 mb-2 text-center report_list_img_2">
                    <img src="<?php echo WEBSITE_IMAGE_DIR_V.$GetData['photo'] ?>" >
                </div>
                <?php
            }
        }
        ?>
    </div>
</div>



