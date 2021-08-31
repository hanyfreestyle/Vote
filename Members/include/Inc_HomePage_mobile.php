    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="home_welcome_mobile">
                    <?php echo nl2br($ALang['web_home_welcome']) ?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 ">
                <div class="but_div_mobile">
                    <?php
                    $PageUrl_surveys = $MembersPathHome."ListPage/index.php?view=SurveysList";
                    $PageUrl_employees = $MembersPathHome."ListPage/index.php?view=EmployeesList";
                    $PageUrl_Report = $MembersPathHome."Report/index.php?view=EmployeesList";
                    ?>
                    <a href="<?php echo  $PageUrl_surveys ?>" class="text-center homepage_but_mobile"><?php echo $ALang['surveys_h1'] ?></a>
                    <a href="<?php echo  $PageUrl_employees ?>" class="text-center homepage_but_mobile"><?php echo $ALang['employees_h1'] ?></a>
                    <a href="<?php echo  $PageUrl_Report ?>" class="text-center homepage_but_mobile">التقارير</a>
                </div>
            </div>
        </div>
    </div>