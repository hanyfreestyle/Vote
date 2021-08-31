<?php
require_once '../include/inc_reqfile.php';
require_once('../library/Php_HtmlExcel.php');
echo '<meta http-equiv="content-type" content="text/html; charset=utf-8" />';

    $ThIsIsTest = '0';

    if($ThIsIsTest == '1'){
        $_POST['Export_File'] = "Done";
        $_POST['sql_line'] = "SELECT * FROM complaint where id != '1' " ;
        $tastyle = "border = '1'";
    }else{
        $tastyle ="";
    }

    if(isset($_POST['Export_File'])){
    $T_ARRAY_CONFIG_DATA  =  LoadTabelData_To_Arr("1" ,"config_data");
    
    
    $names = '<table '.$tastyle.' ><tr>';
    $names .= '<th>'.$ALang['member_list_date_add'].'</th>';
    $names .= '<th>'.$ALang['member_list_custname'].'</th>';
    $names .= '<th>'.$ALang['member_list_cust_mobiel'].'</th>';
    $names .= '<th>'.$ALang['member_list_complaint_2'].'</th>';
    $names .= '<th>'.$ALang['member_list_city'].'</th>';
    $names .= '<th>'.$ALang['member_list_area'].'</th>';
    $names .= '</tr>';


    $SQL_Get = $db->SelArr($_POST['sql_line']);
    for($i = 0; $i < count($SQL_Get); $i++) {
    
    $FullTime = ConvertDateToCalender_2($SQL_Get[$i]['date_time']);

    $complaint_id =  findValue_FromArr($T_ARRAY_CONFIG_DATA,"id",$SQL_Get[$i]['complaint_id'],"name");
    $city_id =  findValue_FromArr($T_ARRAY_CONFIG_DATA,"id",$SQL_Get[$i]['city_id'],"name");
    $area_id =  findValue_FromArr($T_ARRAY_CONFIG_DATA,"id",$SQL_Get[$i]['area_id'],"name");
        
   
    $names .= '<tr>';  
    $names .= '<td>'.$FullTime.'</td>';
    $names .= '<td>'.$SQL_Get[$i]['cust_name'].'</td>';
    $names .= '<td>'.$SQL_Get[$i]['cust_mobile'].'</td>';   
    $names .= '<td>'.$complaint_id.'</td>';
    $names .= '<td>'.$city_id.'</td>';
    $names .= '<td>'.$area_id.'</td>';
    
    $names .= '</tr>';    
    }    
    
    
    
    $names .= '</table>';
    
    echo  $names ;

        if($ThIsIsTest != '1'){
            $css = '
            .red {	color: red;}
            .text    { mso-number-format: "\@"; width:80pt;}
            ';

            $rep1 = array('<td>');
            $rep2 = array('<td class="text">');
            $names = str_replace($rep1,$rep2,$names);


            $xls = new HtmlExcel();
            $xls->setCss($css);
            $xls->addSheet("Names", $names);
            $FileName = date("Y-m-d_h-i-s");
            $xls->headers("Data_".$FileName.".xls");
            echo $xls->buildFile();
        }


    }



?>