<div class="report_list_cont">
    <div class="row">
    <div class="col-md-8 col-8  text-right"><span class="back_s back_s_pr back_s1">تقرير فريق العمل</span></div>
    <div class="col-md-4 col-4 text-center"><span class="back_s back_s1">يونيو 2021</span></div>
    </div>
</div>
<div class="report_list_cont mt-2">
    <div class="row">
        <div class="col-md-8 col-8  text-right"><span class="back_s back_s_pr back_s2">الموظف</span></div>
        <div class="col-md-4 col-4 text-center"><span class="back_s back_s2">التقييم</span></div>
    </div>
</div>
<?php
$sql= "select * from employee where id = '3' ";
$row = $db->H_SelectOneRow($sql);
?>

<div class="report_list_cont mt-2">
    <div class="row">

        <?php
        for ($i = 1; $i <=30; $i++) {
        ?>
            <div class="col-md-8 col-8 mb-2  text-right">
                <span class="back_s back_s_pr2 back_s3">
                    <span class="d-stop font-weight-bold">اسم الموظف : </span>
                    <span > <a href="index.php?view=EmployeesView&id=3">هارى باتيل نانيكوا</a> </span>
                    <span class="report_list_img" ><img src="<?php echo WEBSITE_IMAGE_DIR_V.$row['photo'] ?>" ></span>
                </span>
            </div>
            <div class="col-md-4 col-4 mb-2 text-center">
                <span class="back_s back_s3 evl_num">
                    <?php echo rand(50,100)?> %
                </span>
            </div>
        <?php
        }
        ?>


    </div>
</div>