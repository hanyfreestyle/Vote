    <?php
    $EmployeesList = $MembersPathHome."Employees/index.php?view=EmployeesList";
    $EmployeesAdd = $MembersPathHome."Employees/index.php?view=EmployeesAdd";

    ?>
    <div class="<?php echo $ViewDivStyle ?>">
        <a href="#" class="text-center def_but"><?php echo $ALang['employees_h1'] ?></a>
        <ul class="a_list">
            <li><a href="<?php echo $EmployeesList ?>"><?php echo $ALang['employees_list'] ?></a></li>
            <li><a href="<?php echo $EmployeesAdd ?>"><?php echo $ALang['employees_add'] ?></a></li>
        </ul>
        <a href="<?php echo $MembersPathHome ?>" class="text-center dashbord_but">الرئيسية</a>
    </div>

 