<?php
$SurveysList = $MembersPathHome."Surveys/index.php?view=SurveysList";

$SelDateConfig = $MembersPathHome."Report/index.php?view=SelDateConfig";

?>
<div class="<?php echo $ViewDivStyle ?>">
    <a href="#" class="text-center def_but">ادارة التقارير</a>
    <ul class="a_list">
        <li><a href="<?php echo $SurveysList ?>">عرض تقارير الموظفين</a></li>
        <li><a href="<?php echo $SurveysAdd ?>">تقييم الموظفين خلال فترة</a></li>
        <li><a href="<?php echo $SelDateConfig ?>">تحديد فترة عرض التقارير</a></li>
    </ul>
    <a href="<?php echo $MembersPathHome ?>" class="text-center dashbord_but">الرئيسية</a>
</div>






 