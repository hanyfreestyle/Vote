<div class="LeftPcSideBar">
<div class="left_but_div">
<?php
$PageUrl_surveys = $MembersPathHome."ListPage/index.php?view=SurveysList";
$PageUrl_employees = $MembersPathHome."ListPage/index.php?view=EmployeesList";
$PageUrl_Report = $MembersPathHome."Report/index.php?view=EmployeesList";
?>
<a href="<?php echo  $PageUrl_surveys ?>" class="text-center def_but"><?php echo $ALang['surveys_h1'] ?></a>
<a href="<?php echo  $PageUrl_employees ?>" class="text-center def_but"><?php echo $ALang['employees_h1'] ?></a>
<a href="<?php echo  $PageUrl_Report ?>" class="text-center def_but">التقارير</a>
<a href="<?php echo  $MembersPathHome."ListPage/index.php?logout" ?>" class="text-center def_but">تسجيل خروج</a>
</div>
</div>
