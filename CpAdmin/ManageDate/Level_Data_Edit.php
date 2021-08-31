<?php
if(!defined('WEB_ROOT')) {	exit;}
require_once 'Level_A_Javascript.php';
#################################################################################################################################
###################################################    
################################################################################################################################# 
        $PageTitle = $Module_H1.$PageVarList['H1']." | ".$AdminLangFile['mainform_h1_edit'] ;
        $ThisTabelName = $PageVarList['TabelName']  ;
        $ThisISEditPage = '1';
###########################################################>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
OPen_Page($PageTitle);



$row = $db->H_CheckTheGet("id","id",$ThisTabelName,"2");
$id = $row['id'];
extract($row);



$Already = CountTheLevel($PageVarList);



 

Form_Open();

//hidden
echo '<input type="hidden" value="'.$PageVarList['TabelName'].'" name="TabelName" id="TabelName" />';


if($PageVarList['ThisLevel'] >= '1'  ){
    if($Already == '0'){
        $Arr_XX = array("Label" => 'on',"Active" => '0',"Filter_Filde"=> "cat_id" ,"Filter_Vall"=> $PageVarList['LevelCatId']['1'] );
        $Err[] = NF_PrintSelect_2018("Chosen",$PageVarList['LevelNames']['1'],"col-md-3","level_1",$PageVarList['TabelName'],"req",$row['level_1'],$Arr_XX);
    }else{
        $P = GetNameFromID($ThisTabelName,$row['level_1'],$NamePrint);
        PrintFildInformation("col-md-3",$PageVarList['LevelNames']['1'],$P);
        echo '<input type="hidden" value="'.$row['level_1'].'" name="level_1" />';
    }
}


if($PageVarList['ThisLevel'] >= "2" ){
    if($Already == '0'){
        Print_Level_SelList($PageVarList,"2");
    }else{
        $P = GetNameFromID($ThisTabelName,$row['level_2'],$NamePrint);
        PrintFildInformation("col-md-3",$PageVarList['LevelNames']['2'],$P);
        echo '<input type="hidden" value="'.$row['level_2'].'" name="level_2" />';
    }
}


if($PageVarList['ThisLevel'] >= "3" ){
    if($Already == '0'){
        Print_Level_SelList($PageVarList,"3");
    }else{
        $P = GetNameFromID($ThisTabelName,$row['level_3'],$NamePrint);
        PrintFildInformation("col-md-3",$PageVarList['LevelNames']['3'],$P);
        echo '<input type="hidden" value="'.$row['level_3'].'" name="level_3" />';
    }
}

if($PageVarList['ThisLevel'] >= "4" ){
    Print_Level_SelList($PageVarList,"4");
}


echo '<div style="clear: both!important;"></div>';


$MoreS = array('Col' => "col-md-6",'Placeholder'=> "",'required' => 'required','Dir'=> "Ar_Lang");
$Err[] = NF_PrintInput("TextEdit",$ALang['mainform_mainfilde_name'],"name","","","req",$MoreS);

if(ADD_EN == '1'){
$MoreS = array('Col' => "col-md-6",'Placeholder'=> "",'required' => 'required', 'Dir'=> "En_Lang");
$Err[] = NF_PrintInput("TextEdit",$ALang['mainform_mainfilde_name'].ENLANG,"name_en","","","req",$MoreS);
}


 

 
Form_Close_New("2",$Fs_ListUrl);


if(isset($_POST['B1'])){
if($Err != '1'){    
Vall($Err,"LevelsEditData",$PageVarList,"1",$USER_PERMATION_Edit);
}  
}            


###########################################################<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
Close_Page();	
?>
