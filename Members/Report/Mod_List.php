<?php
$TAddDate = FULLDate_ForToday();
$thisMonth = $TAddDate['Month'] ;
$thisYear = $TAddDate['Year'] ;
$MonthName = GetMonthName($thisMonth);
$PrintDate = $MonthName." ".ChangeToArUnmber($thisYear);
$CustomerId = $Members_Row['id'];

?>
<div class="report_list_cont">
    <div class="row">
        <div class="col-md-8 col-8  text-right"><span class="back_s back_s_pr back_s1">تقرير فريق العمل</span></div>
        <div class="col-md-4 col-4 text-center"><span class="back_s PrintDate back_s1"><?php echo  $PrintDate ?></span></div>
    </div>
</div>
<div class="report_list_cont mt-2">
    <div class="row">
        <div class="col-md-8 col-8  text-right"><span class="back_s back_s_pr back_s2">الموظف</span></div>
        <div class="col-md-4 col-4 text-center"><span class="back_s back_s2">التقييم</span></div>
    </div>
</div>

<div class="report_list_cont mt-2">
    <div class="row">

        <?php
        $employee_Sql_Line = "SELECT * FROM employee where cust_id = '$CustomerId'";
        $employee_Count = $db->H_Total_Count($employee_Sql_Line);
        if($employee_Count > 0){
            $Name = $db->SelArr($employee_Sql_Line);
            for($i = 0; $i < count($Name); $i++) {
                $evaluation_Num = GetAllEmployeeReport(
                    $Name[$i]['id'],
                    $Name[$i]['cust_id'],
                    $thisMonth,
                    $thisYear
                );
                ?>
                <div class="col-md-8 col-8 mb-2  text-right">
                <span class="back_s back_s_pr2 back_s3">
                    <span class="d-stop font-weight-bold">اسم الموظف : </span>
                    <span class="PrintNameEmp_list_report_mobile" > <a href="index.php?view=EmployeesView&id=<?php echo  $Name[$i]['name_m'] ?>"><?php echo  $Name[$i]['name']   ?></a> </span>
                    <span class="report_list_img" ><img src="<?php echo WEBSITE_IMAGE_DIR_V.$Name[$i]['photo'] ?>" ></span>
                </span>
                </div>
                <div class="col-md-4 col-4 mb-2 text-center">
                <span class="back_s back_s3 evl_num">
                    <?php echo $evaluation_Num ?>
                </span>
                </div>
                <?php
            }
        }
        ?>
    </div>
</div>