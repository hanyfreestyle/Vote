<?php
if(!defined('WEB_ROOT')) {	exit;}
require_once 'Level_A_Javascript.php';

#################################################################################################################################
###################################################    
#################################################################################################################################
        $PageTitle = $Module_H1.$PageVarList['H1']." | ".$AdminLangFile['mainform_h1_add'] ;


###########################################################>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
OPen_Page($PageTitle);
 



Form_Open();

//hidden
echo '<input type="hidden" value="'.$PageVarList['TabelName'].'" name="TabelName" id="TabelName" />';



if($PageVarList['ThisLevel'] >= '1'){
$Arr_XX = array("Label" => 'on',"Active" => '0',"Filter_Filde"=> "cat_id" ,"Filter_Vall"=> $PageVarList['LevelCatId']['1'] );
$Err[] = NF_PrintSelect_2018("Chosen",$PageVarList['LevelNames']['1'],"col-md-3","level_1",$PageVarList['TabelName'],"req","0",$Arr_XX);
}    

if($PageVarList['ThisLevel'] >= "2" ){
Print_Level_SelList($PageVarList,"2");
}


if($PageVarList['ThisLevel'] >= "3" ){
Print_Level_SelList($PageVarList,"3");
}


if($PageVarList['ThisLevel'] >= "4" ){
Print_Level_SelList($PageVarList,"4");
}

 


echo '<div style="clear: both!important;"></div>';


$MoreS = array('Col' => "col-md-6",'Placeholder'=> "",'required' => 'required','Dir'=> "Ar_Lang");
$Err[] = NF_PrintInput("Text",$ALang['mainform_mainfilde_name'],"name","","","req",$MoreS);


if(ADD_EN == '1'){
    $MoreS = array('Col' => "col-md-6",'Placeholder'=> "",'required' => 'required', 'Dir'=> "En_Lang");
    $Err[] = NF_PrintInput("Text",$ALang['mainform_mainfilde_name'].ENLANG,"name_en","","","req",$MoreS);
}

Form_Close_New("1",$Fs_ListUrl);


if(isset($_POST['B1'])){
    if($Err != '1'){
        Vall($Err,"LevelsAddData",$PageVarList,"1",$USER_PERMATION_Add);
    }
}


 
###########################################################<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
Close_Page();


?>
