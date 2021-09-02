<div class="page_h1"><?php echo $PageTitle ?></div>
<div style="clear: both!important;"></div>
<?php
$CustomerId = $Members_Row['id'];
$buttype= '2';

if($Members_Row['report_config'] == null){
    $row['date_from'] = date("m/d/Y",time());
    $row['date_to'] = date("m/d/Y",time());
    $row['sel_date_type'] ='1';
}else{
    $GitData = unserialize($Members_Row['report_config']);
    $row['date_from'] = date("m/d/Y",$GitData['date_from']);
    $row['date_to'] = date("m/d/Y",$GitData['date_to']);
    $row['sel_date_type'] = $GitData['sel_date_type'] ;

}
Form_Open();
echo '<input type="hidden" value="" name="cust_id" />';
echo  '<div class="row">';
?>
<div class="col-md-6 col-sm-12 col-xs-12 form-group DirRight ">
    <label class="control-label">من تاريخ  <span class="requiredText">*</span></label>
    <input type="text" name="date_from"  value="<?php echo hetseeEditNew("date_from") ?>" class="TypeText_x form-control datepicker" readonly  id="datepicker_from" required="">
</div>

<div class="col-md-6 col-sm-12 col-xs-12 form-group DirRight ">
    <label class="control-label">الى تاريخ <span class="requiredText">*</span></label>
    <input type="text" name="date_to"  value="<?php echo hetseeEditNew("date_to") ?>"  class="TypeText_x form-control datepicker" readonly  id="datepicker_to" required="">
</div>

<div class="col-md-6 col-sm-12 col-xs-12 form-group DirRight">
    <label class="control-label"> طريقة عرض التقرير <span class="requiredText">*</span></label>
    <select name="sel_date_type"  class="input-md chosen-select_2" required="">
        <option value="1" <?php echo  GetSel('sel_date_type','1') ?>>الشهر الحالى</option>
        <option value="2" <?php echo  GetSel('sel_date_type','2') ?> >الشهر السابق</option>
        <option value="3" <?php echo  GetSel('sel_date_type','3') ?>>الاسبوع الحالى </option>
        <option value="4" <?php echo  GetSel('sel_date_type','4') ?>>الاسبوع السابق </option>
        <option value="5" <?php echo  GetSel('sel_date_type','5') ?>>تحديد فترة زمنية </option>
    </select>
</div>
<?php
echo  '</div>';

Form_Close_New($buttype,"../ListPage/index.php?view=ReportList");

if(isset($_POST['B1'])){
    $SaveData = array(
        'date_from'=> strtotime($_POST['date_from']),
        'date_to'=> strtotime($_POST['date_to']),
        'sel_date_type'=> $_POST['sel_date_type'],
    );

    $SaveData = serialize($SaveData);
    $server_data = array ('report_config'=> $SaveData  );
    $db->AutoExecute("customer",$server_data,AUTO_UPDATE,"id = '$CustomerId'");
    Redirect_Page_2(LASTREFFPAGE);
}
?>

<link rel="stylesheet" href="<?php echo  WEB_ROOT?>Members/MembersCss/date/jquery-ui.css">
<script src="<?php echo  WEB_ROOT?>Members/MembersCss/date/jquery-ui.js"></script>
<script>
    $( function() {
        $( ".datepicker" ).datepicker({
            showOn: "button",
            buttonImage: "calendar.png",
            buttonImageOnly: true,
            buttonText: "Select date"
        });
    } );
</script>