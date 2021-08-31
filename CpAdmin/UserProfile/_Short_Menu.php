<div class="row ShortMenu"><div class="col-md-12">
<?php
if(!defined('WEB_ROOT')) {	exit;}
 
 
echo '<a class="btn3d btn btn_3d-default btn-lg '.CheckSelBut("ChangePassword").'"  href="index.php?view=ChangePassword">
<i class="fa fa-plus-circle"></i>'.$AdminLangFile['users_changepassword'].'</a>';

echo '<a class="btn3d btn btn_3d-default btn-lg '.CheckSelBut("UserProfile").'"  href="index.php?view=UserProfile">
<i class="fa fa-plus-circle"></i>'.$AdminLangFile['users_user_profile'].'</a>';


?>
</div></div>
<div style="clear: both!important;"></div>