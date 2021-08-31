<?php
if(!defined('WEB_ROOT')) {	exit;}
#################################################################################################################################
###################################################    
#################################################################################################################################
        $PageTitle = $Module_H1.$PageVarList['H1']." | ".$AdminLangFile['mainform_h1_dell'] ;
        $ThisTabelName = $PageVarList['TabelName']  ;
        $Tabel_Type =  $PageVarList['Tabel_Type']  ;
        $Fs_DellBut = $PageVarList['Fs_DellBut'];
        $Fs_Subtabel = $PageVarList['Fs_Subtabel'];;
        $Fs_Subtabel_Filde = $PageVarList['Fs_Subtabel_Filde'];
             
        

###########################################################>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
OPen_Page($PageTitle);

$row = $db->H_CheckTheGet("id","id",$ThisTabelName,"2");
$id = $row['id'];
extract($row);


if($Fs_Subtabel != '0' and $Fs_Subtabel_Filde != '0' ){

    if($row['count'] >=  '1'){
        New_Print_Alert("4",$AdminLangFile['mainform_err_dell_mass']." ".$row[$NamePrint]);
        PrintDeleteButConfirm($Fs_ListUrl,"");
    }else{

        $already = $db->H_Total_Count("SELECT id FROM $Fs_Subtabel WHERE $Fs_Subtabel_Filde = '$id'");
        if($already > 0) {
            UpdateFildeForDell($ThisTabelName,"count",$already,$id) ;
            New_Print_Alert("4",$AdminLangFile['mainform_err_dell_mass']." ".$row[$NamePrint]);
            PrintDeleteButConfirm($Fs_ListUrl,"");
        }else{
            if(isset($_GET['Confirm'])){
                $db->H_DELETE_FromId($ThisTabelName,$id);
                Redirect_Page_2("index.php?view=".$Fs_ListUrl);
            }else{
                New_Print_Alert("4",$AdminLangFile['mainform_confirm_dell_mass']." ".$row[$NamePrint]);
                PrintDeleteButConfirm($Fs_ListUrl,$Fs_DellBut."&id=".$id);
            }
        }
    }

}else{
    New_Print_Alert("4",$AdminLangFile['mainform_err_dell_mass']." ".$row[$NamePrint]);
    PrintDeleteButConfirm($Fs_ListUrl,"");
}


###########################################################<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
Close_Page();

?>