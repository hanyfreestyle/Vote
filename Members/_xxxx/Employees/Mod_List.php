<?php
if(!defined('WEB_ROOT')) {	exit;}
###########################################################>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
OPen_Page($PageTitle);


$cust_id = $Members_Row['id'] ;
$THESQL = "select * from employee where cust_id = '$cust_id' order by postion ";
$THELINK = "view=".$view;
$ConfigP['datatabel'] = '0';
$PERpage = "20";

$already = $db->H_Total_Count($THESQL);
if ($already > 0){

    $TaBelArr = array('Tabel'=>"employee", "But"=>'1', 'DataTabelID'=> "" );
    TableOpen_Header($TaBelArr);
    Table_TH_Print('1',"#","20");
    Table_TH_Print("1",$ALang['employees_f_name'],"100");
    Table_TH_Print('1',$ALang['employees_f_mobile'],"50");
    Table_TH_Print('1',$ALang['employees_f_jop'],"50");
    Table_TH_Print('1',$ALang['employees_photo'],"50");
    Table_TH_Print('1',"","20");
    Table_TH_Print('1',"","20");
    Table_TH_Print('1',"","20");
    Table_TH_Print('1',"","20");
    Table_TH_Print('1',"","20");
    Table_TH_Print('1','<input type="checkbox" name="Check_ctr" value="yes" onClick="Check(document.myform.Check_ctr)">',"20");
    TableClose_Header();

    $NOPAGE = GETTHEPAGE ($THESQL ,$PERpage);
    if ($NOPAGE != 1){
        if($ConfigP['datatabel'] == '1' and DATATABELVIEW == '1'  ){
            $Name = $db->SelArr($THESQL);
        }else{
            $Name = $db->SelArr($THESQL ,true,$PERpage,PAGING_NEXT_PREV_NUM,$THELINK,5);
        }

        for($i = 0; $i < count($Name); $i++) {
            $id = $Name[$i]['id'];
            $x = $i+1;

            echo '<tr>';
            Table_TD_Print("1",$x,"C");
            Table_TD_Print("1",$Name[$i]['name'],"R");
            Table_TD_Print("1",$Name[$i]['mobile'],"C");
            Table_TD_Print("1",$Name[$i]['jop'],"C");
            Table_TD_Print_Photo("1",$Name[$i]['photo_t'],"C");
            
            $Oth = array('OtherStyle'=>"NewButStyle");
            Table_TD_Print_Option('1',NF_PrintBut_TD('2',$ALang['mainform_edit'],"EmployeesEdit&id=".$id,"btn-success","fa-pencil"),"C",$Oth);
            
            $ViewUrl = "EmployeesQR.php?id=".$Name[$i]['id'] ;
            Table_TD_Print_Option('1',NF_PrintBut_TD('Full_Url',$ALang['cust_qr'],$ViewUrl,"btn-inverse","fa-qrcode","1"),"C",$Oth);

            $ViewUrl = EVALUATION_URL.$Name[$i]['name_m'] ;
            Table_TD_Print_Option('1',NF_PrintBut_TD('Full_Url',$ALang['cust_view_url'],$ViewUrl,"btn-warning","fa-eye-slash","1"),"C",$Oth);

            Table_TD_Print_Option('1',NF_PrintBut_TD('2',$ALang['employees_delete'],"EmployeesDelete&id=".$id,"btn-danger","fa-window-close"),"C",$Oth);
            Table_TD_Print_Option('1',CheckUnitState($Name[$i]['state']),"C",$Oth);
            Table_TD_Print_Option('1',PrintCheckBox_New($id),"C",$Oth);
            
            echo '</tr>';
        }
    }

    CloseTabel();

}else{
    Alert_NO_Content();
}

###########################################################<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
Close_Page();
?>