
<?php


$cust_id = $Members_Row['id'] ;
$THESQL = "select * from employee where cust_id = '$cust_id' order by postion ";
$THELINK = "view=".$view;
$ConfigP['datatabel'] = '0';
$PERpage = "3000";

$already = $db->H_Total_Count($THESQL);
if ($already > 0){
?>
    <div class="page_h1"><?php echo $PageTitle ?></div>
    <table class="resTable">
        <thead>
        <tr>

            <th scope="col" class="text-right"><?php echo  $ALang['employees_f_name'] ?></th>
            <th scope="col" class="text-right"><?php echo  $ALang['employees_f_mobile'] ?></th>
            <th scope="col" class="text-right"><?php echo  $ALang['employees_f_jop'] ?></th>
            <th scope="col" width="120" class="text-right"></th>
            <th scope="col" class="text-right"></th>
        </tr>
        </thead>
        <tbody>
        <?php

        $NOPAGE = GETTHEPAGE ($THESQL ,$PERpage);
        if ($NOPAGE != 1){

            $Name = $db->SelArr($THESQL ,true,$PERpage,PAGING_NEXT_PREV_NUM,$THELINK,5);

            for($i = 0; $i < count($Name); $i++) {
                $id = $Name[$i]['name_m'];
                $x = $i+1;

                if($Name[$i]['photo_t']){
                    $print_photo = '<img src="'.WEBSITE_IMAGE_DIR_V.$Name[$i]['photo_t'].'" class="viewPhotoIntoTable">';
                }else{
                    $print_photo = "";

                }


                echo '<tr>';

                    echo '<td  class="text-right" data-label="'.$ALang['employees_f_name'].'">'.$Name[$i]['name'].'</td>';
                    echo '<td  class="text-right" data-label="'.$ALang['employees_f_mobile'].'">'.$Name[$i]['mobile'].'</td>';
                    echo '<td  class="text-right" data-label="'.$ALang['employees_f_jop'].'">'.$Name[$i]['jop'].'</td>';
                    echo '<td  class="text-right tdImg" data-label="">'.$print_photo.'</td>';
                    echo '<td class="text-right tdBut NewTDBut" data-label="">';

                    echo '<div class="text-right  tableListDivButX">';
                    echo NF_PrintBut_TD('22',$ALang['surveys_delete_survey'],"SendEmail&id=".$id,"btn-email","fa-envelope");
                    echo NF_PrintBut_TD('22',$ALang['mainform_edit'],"EmployeesEdit&id=".$id,"btn-success","fa-pencil");
                    $ViewUrl = "EmployeesQR.php?id=".$Name[$i]['name_m'] ;
                    echo NF_PrintBut_TD('Full_Url22',$ALang['cust_qr'],$ViewUrl,"btn-info","fa-qrcode","1");

                    echo NF_PrintBut_TD('22',$ALang['surveys_delete_survey'],"EmployeesDelete&id=".$id,"btn-danger","fa-window-close");
                    echo NF_PrintBut_TD('22',$ALang['surveys_delete_survey'],"SendSMS&id=".$id,"btn-thumbs-up"," fa-thumbs-up");

                    echo  '</div>';

                    echo '</td>';

                echo '</tr>';
            }
        }
        ?>



        </tbody>
    </table>
<?php

   # echo '<div class="col-md-12 col-sm-12 col-xs-12">';
   # echo $db->pager;
   # echo '</div>';


}else{
    Alert_NO_Content();
}


if($DetectMobile->isMobile() == '1') {
?>
    <p class="VeiwBackToHome">
        <a href="<?php echo $MembersPathHome ?>" class="text-center dashbord_but">الرئيسية</a>
    </p>
<?php
}


?>




