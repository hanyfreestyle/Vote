<?php
$T_ARRAY_CONFIG_DATA  =  LoadTabelData_To_Arr("1" ,"config_data");
Module_InCFile();
echo '<div class="row ShortMenu"><div class="col-md-12">';

echo '<a class="btn3d btn btn_3d-default btn-lg '.CheckSelBut("ComplaintList").'"  href="index.php?view=ComplaintList">
<i class="fa fa-list"></i>'.$ALang['member_menu_list_complaint'].'</a>';

echo '<a class="btn3d btn btn_3d-default btn-lg '.CheckSelBut("ComplaintListNew").'"  href="index.php?view=ComplaintListNew">
<i class="fa fa-list"></i>'.$ALang['member_menu_list_new_complaint'].'</a>';

echo '<a class="btn3d btn btn_3d-default btn-lg '.CheckSelBut("Filter").'"  href="index.php?view=Filter&Clear=1">
<i class="fa fa-search"></i>'.$AdminLangFile['member_menu_complaint_filter'].'</a>';

 

echo '<a class="btn3d btn btn_3d-default btn-lg '.CheckSelBut("Config").'"  href="index.php?view=Config">
<i class="fa fa-cogs"></i>'.$AdminLangFile['member_menu_config'].'</a>';


echo '</div></div>';
echo '<div style="clear: both!important;"></div>';
?>
