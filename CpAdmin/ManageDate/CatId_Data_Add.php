<?php
if(!defined('WEB_ROOT')) {	exit;}

#################################################################################################################################
###################################################    
#################################################################################################################################
        $PageTitle = $Module_H1.$PageVarList['H1']." | ".$AdminLangFile['mainform_h1_add'] ;


###########################################################>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
OPen_Page($PageTitle);
 

Form_Open();

     if($PageVarList['SubTabelType'] == '1'){
        if($PageVarList['FilterType'] == '1'){
            $Arr = array("Label" => 'on',"Active" => '1',"Filter_Filde"=> $PageVarList['Filter_Filde'] ,"Filter_Vall"=> $PageVarList['SubTabel_CatId'] );
        }else{
            $Arr = array("Label" => 'on',"Active" => '1');
        }
        $Err[] = NF_PrintSelect_2018("Chosen",$ALang['managedate_sel_menu_cat'],"col-md-3","pro_id",$PageVarList['SubTabelName'],"req","0",$Arr);
        echo '<div style="clear: both!important;"></div>';
    }else{
        echo '<input type="hidden" value="0" name="pro_id" />';
    }   

$MoreS = array('Col' => "col-md-6",'Placeholder'=> "",'required' => 'required','Dir'=> "Ar_Lang");
$Err[] = NF_PrintInput("Text",$ALang['mainform_mainfilde_name'],"name","","","req",$MoreS);


if(ADD_EN == '1'){
    $MoreS = array('Col' => "col-md-6",'Placeholder'=> "",'required' => 'required', 'Dir'=> "En_Lang");
    $Err[] = NF_PrintInput("Text",$ALang['mainform_mainfilde_name'].ENLANG,"name_en","","","req",$MoreS);
}

Form_Close_New("1",$Fs_ListUrl);


if(isset($_POST['B1'])){
    if($Err != '1'){
        Vall($Err,"CatIdAddData",$PageVarList,"1",$USER_PERMATION_Add);
    }
}


 
###########################################################<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
Close_Page();

?>