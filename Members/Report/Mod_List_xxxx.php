<?php
$cust_id = $Members_Row['id'] ;
$THESQL = "select * from employee where cust_id = '$cust_id' order by postion ";
$THELINK = "view=".$view;
$ConfigP['datatabel'] = '0';
$PERpage = "4";

$already = $db->H_Total_Count($THESQL);
if ($already > 0){
?>
    <table>
        <thead>
        <tr>
            <th scope="col" width="20px">#</th>
            <th scope="col" class="text-right"><?php echo  $ALang['employees_f_name'] ?></th>
            <th scope="col" class="text-right"><?php echo  $ALang['employees_f_mobile'] ?></th>
            <th scope="col" class="text-right"><?php echo  $ALang['employees_f_jop'] ?></th>
            <th scope="col" class="text-right"><?php echo  $ALang['employees_photo'] ?></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php

        $NOPAGE = GETTHEPAGE ($THESQL ,$PERpage);
        if ($NOPAGE != 1){

            $Name = $db->SelArr($THESQL ,true,$PERpage,PAGING_NEXT_PREV_NUM,$THELINK,5);

            for($i = 0; $i < count($Name); $i++) {
                $id = $Name[$i]['id'];
                $x = $i+1;

                if($Name[$i]['photo_t']){
                    $print_photo = '<img src="'.WEBSITE_IMAGE_DIR_V.$Name[$i]['photo_t'].'" class="viewPhotoIntoTable">';
                }else{
                    $print_photo = "";

                }


                echo '<tr>';
                    echo '<td  class="text-right" data-label="#">'.$x.'</td>';
                    echo '<td  class="text-right" data-label="'.$ALang['employees_f_name'].'">'.$Name[$i]['name'].'</td>';
                    echo '<td  class="text-right" data-label="'.$ALang['employees_f_mobile'].'">'.$Name[$i]['mobile'].'</td>';
                    echo '<td  class="text-right" data-label="'.$ALang['employees_f_jop'].'">'.$Name[$i]['jop'].'</td>';
                    echo '<td  class="text-right" data-label="'.$ALang['employees_photo'].'">'.$print_photo.'</td>';
                    echo '<td class="text-right" data-label="">';
                    echo '<div class="text-right tableListDivBut">';
                    /*
                    echo NF_PrintBut_TD('22',$ALang['mainform_edit'],"EmployeesEdit&id=".$id,"btn-success","fa-pencil");
                    $ViewUrl = "EmployeesQR.php?id=".$Name[$i]['id'] ;
                    echo NF_PrintBut_TD('Full_Url22',$ALang['cust_qr'],$ViewUrl,"btn-info","fa-qrcode","1");
                    echo NF_PrintBut_TD('22',$ALang['surveys_delete_survey'],"EmployeesDelete&id=".$id,"btn-danger","fa-window-close");
                    */
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
    echo $db->pager;
   # echo '</div>';


}else{
    Alert_NO_Content();
}


if($DetectMobile->isMobile() == '1') {
?>
    <p class="VeiwBackToHome">
        <a href="<?php echo $MembersPathHome ?>" class="text-center dashbord_but">????????????????</a>
    </p>
<?php
}


?>




