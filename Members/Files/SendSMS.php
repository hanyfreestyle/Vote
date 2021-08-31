<?php
require_once 'SendDefVall.php';
if(isset($_POST['SaveData'])){
    $PhoneNumber = Clean_Mypost($_POST['customer_mobile']) ;
    $PhoneValidate =  $PhoneNumber[0].$PhoneNumber[1];
    if($PhoneValidate == '05'){
        SendSMS();
    }else{
        $MobileErr = $ALang['hform_add_mobileerr'];
    }
}

if($DetectMobile->isMobile() == '1') {
?>
    <div class="mobile_sms_send_mass">
        <?php echo  $PrintMassView ?>
    </div>
    <div class="col-12 mt-3 FormStyle">
        <form method="post" action="#"  id="validate-form" data-parsley-validate >
            <?php
           # echo '<input type="hidden" value="'.$CustId.'" name="cust_id" />';
            echo '<input type="hidden" value="'.$EmployeeRow['id'].'" name="emp_id"  />';


            $MoreS = array('Col' => "col-md-12",'Placeholder'=> $ALang['evl_form_add_fmobile'],'required' => 'required data-parsley-type="number" '.MOBILE_REQUIRED_TYPE );
            $Err[] = NF_PrintInput("Numbers","","customer_mobile","0","1","req",$MoreS);
            echo '<div class="col-md-12"><span class="MobileErr ">'.$MobileErr.'</span></div>';

            echo '<div class="form-group col-md-12 text-center" >';
            echo '<button class="btnx btn-default_x" name="SaveData" type="submit">'.$ALang['hform_add_fsend'].'</button>';
            echo '</div>';
            ?>
        </form>
    </div>
    <div class="mt-2" >
        <a href="<?php echo $PageUrl_employees ?>" class="text-center dashbord_but">عرض الموظفين</a>
        <a href="<?php echo $MembersPathHome ?>" class="text-center dashbord_but">الرئيسية</a>
    </div>
<?php
}else{

    require_once 'req_pc_sms_emp.php';
?>
    <div class="employee_container_for_sms_pc_form">
        <div class="pc_sms_send_mass">
            <?php echo  $PrintMassView ?>
        </div>
        <div class="rowX">
            <div class="col-12X">
                <form method="post" action="#"  id="validate-form" data-parsley-validate >
                    <?php
                    # echo '<input type="hidden" value="'.$CustId.'" name="cust_id" />';
                    echo '<input type="hidden" value="'.$EmployeeRow['id'].'" name="emp_id"  />';

                    $MoreS = array('Col' => "col-md-12",'Placeholder'=> $ALang['evl_form_add_fmobile'],'required' => 'required data-parsley-type="number" '.MOBILE_REQUIRED_TYPE );
                    $Err[] = NF_PrintInput("Numbers","","customer_mobile","0","1","req",$MoreS);
                    echo '<div class="col-md-12"><span class="MobileErr ">'.$MobileErr.'</span></div>';

                    echo '<div class="form-group col-md-12 text-center" >';
                    echo '<button class="btnx btn-default_x" name="SaveData" type="submit">'.$ALang['hform_add_fsend'].'</button>';
                    echo '</div>';
                    ?>
                </form>


            </div>
        </div>

        <div class="mt-2" >
            <a href="<?php echo $PageUrl_employees ?>" class="text-center dashbord_but">عرض الموظفين</a>
        </div>
    </div>

<?php
}
?>


