<p class="home_welcome_pc">
    <?php echo nl2br($ALang['web_home_welcome']) ?>
</p>

<div class="but_div_pc">
    <?php
    $PageUrl_surveys = $MembersPathHome."ListPage/index.php?view=SurveysList";
    $PageUrl_employees = $MembersPathHome."ListPage/index.php?view=EmployeesList";
    $PageUrl_Report = $MembersPathHome."Report/index.php?view=EmployeesList";
    ?>
    <a href="<?php echo  $PageUrl_surveys ?>" class="text-center def_but homepage_but_pc"><?php echo $ALang['surveys_h1'] ?></a>
    <a href="<?php echo  $PageUrl_employees ?>" class="text-center def_but  homepage_but_pc"><?php echo $ALang['employees_h1'] ?></a>
    <a href="<?php echo  $PageUrl_Report ?>" class="text-center def_but  homepage_but_pc">التقارير</a>
</div>