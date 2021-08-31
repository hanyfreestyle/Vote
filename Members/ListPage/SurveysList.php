<?php
$SurveysList = $MembersPathHome."Surveys/index.php?view=SurveysList";
$SurveysAdd = $MembersPathHome."Surveys/index.php?view=SurveysAdd";

?>
<div class="<?php echo $ViewDivStyle ?>">
    <a href="#" class="text-center def_but"><?php echo $ALang['surveys_h1'] ?></a>
    <ul class="a_list">
        <li><a href="<?php echo $SurveysList ?>"><?php echo $ALang['surveys_list'] ?></a></li>
        <li><a href="<?php echo $SurveysAdd ?>"><?php echo $ALang['surveys_add'] ?></a></li>
    </ul>
    <a href="<?php echo $MembersPathHome ?>" class="text-center dashbord_but">الرئيسية</a>
</div>






 