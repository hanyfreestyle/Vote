<?php
$sql= "select * from employee where id = '3' ";
$row = $db->H_SelectOneRow($sql);
if($DetectMobile->isMobile() != '1') {
?>

<div class="employee_container_for_report_pc" >
    <div class="row">
        <div class="col-7">
            <div class="row">
                <div class="col-7">
                    <div class="emp_info pr-2 mb-2"><?php echo $ALang['evl_form_emp_name'] ?>  : <span><?php echo $row['name'] ?></span></div>
                    <div class="emp_info pr-2 mb-2"><?php echo $ALang['evl_form_emp_jop'] ?>  : <span><?php echo $row['jop'] ?></span></div>
                    <div class="emp_info pr-2 mb-2"><?php echo $ALang['evl_form_emp_mobile'] ?>  : <span class="MobileNum"><?php echo ChangeToArUnmber($row['mobile']) ?></span></div>
                </div>
                <div class="col-5 employeePhotoDiv">
                    <img src="<?php echo WEBSITE_IMAGE_DIR_V.$row['photo_t'] ?>" class="employee_photo">
                </div>
            </div>
        </div>
    </div>
    <div class="col-5">

    </div>
</div>
<?php
}
?>

<div class="report_list_cont">
    <div class="row">
        <?php
        $Name = $db->SelArr("SELECT * FROM survey ");
        for($i = 0; $i < count($Name); $i++) {
        ?>
            <div class="col-md-6 col-12 mb-2 text-right">
                <span class="back_s  back_s_pr2  back_s4">
                    <span class="crop_text survey_name"><?php echo  $Name[$i]['name'] ?></span>
                    <span class="survey_name_num" > <?php echo rand(50,100)?> %</span>
                </span>
            </div>
        <?php
        }
        ?>
    </div>
</div>


<div class="report_list_cont mt-2">
    <div class="row">

        <?php
        for ($i = 1; $i <=30; $i++) {
            ?>
            <div class="col-md-6 col-9 mb-2  text-right">
                <span class="back_s back_s_pr2 back_s3">
                    <span class="d-stop font-weight-bold">العميل : </span>
                    <span > اسم العميل  </span>
                    <span> 0555555555 </span>
                </span>
            </div>
            <div class="col-md-3 d-stop mb-2 text-center">
                <span class="back_s back_s3">
                   الرياض
                </span>
            </div>
            <div class="col-md-3 col-3 mb-2 text-center">
                <span class="back_s back_s3 evl_num">
                    <?php echo rand(50,100)?> %
                </span>
            </div>
            <?php
        }
        ?>
    </div>
</div>
