<?php
require_once 'Inc_Header_Members.php';


if(!isset($Pc_CenterDiv)){
    $Pc_CenterDiv = " Pc_CenterDiv ";
}

if(!isset($Back_Pc)){
    $Back_Pc = " Pc_MainDiv_Back ";
}


$Pc_CenterDiv_Other = " ";
$Members_Row  =  Members_CheckUser();
$CustId = $Members_Row['id'];
$ThisCustomerRow = $db->H_SelectOneRow("SELECT * FROM customer WHERE id = '$CustId' " );
if($ThisCustomerRow['photo_t']){
    $custImg = '<img src="'.WEBSITE_IMAGE_DIR_V.$ThisCustomerRow['photo_t'].'">';
}else{
    $custImg = '';
}
?>

<body>

<div class="FullRow">
    <div class="PC_RightDiv">
        <div class="Pc_logoDiv">
            <div class="pc_SitelogoDiv"><img src="<?php echo $MembersPathHome ?>MembersCss/img/logo_1.png" /></div>
            <div class="pc_CustlogoDiv"><?php echo $custImg ?></div>
        </div>
        <div class="Pc_MainDiv_Back <?php echo $Back_Pc ?>">
            <div class="<?php echo $Pc_CenterDiv ." ".$Pc_CenterDiv_Other ?>">
                <?php require_once $content; ?>
            </div>
        </div>
    </div>
    <div class="PC_LeftDiv ForcePc">
        <?php require_once $content_left; ?>
    </div>
</div>

</body>

</html>