<?php
$T_ARRAY_CONFIG_DATA  =  LoadTabelData_To_Arr("1" ,"config_data");
Module_InCFile();
echo '<div class="row ShortMenu"><div class="col-md-12">';

echo '<a class="btn3d btn btn_3d-default btn-lg '.CheckSelBut("SuggestionList").'"  href="index.php?view=SuggestionList">
<i class="fa fa-list"></i>عرض المقترحات</a>';

echo '<a class="btn3d btn btn_3d-default btn-lg '.CheckSelBut("SuggestionListNew").'"  href="index.php?view=SuggestionListNew">
<i class="fa fa-list"></i>عرض المقترحات الجديدة</a>';
 

echo '</div></div>';
echo '<div style="clear: both!important;"></div>';
?>
