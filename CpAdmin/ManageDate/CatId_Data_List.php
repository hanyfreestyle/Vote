<?php
if(!defined('WEB_ROOT')) {	exit;}


#################################################################################################################################
###################################################    
#################################################################################################################################
      $PageTitle     = $Module_H1.$PageVarList['H1']." | ".$AdminLangFile['mainform_h1_list'] ;
      $ThisTabelName = $PageVarList['TabelName']  ;
       
###########################################################>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
OPen_Page($PageTitle);
 
$ConfigP['datatabel'] = $ConfigP['datatabel_'.$PageVarList['SectionName']];
$PERpage = $ConfigP['perpage_'.$PageVarList['SectionName']] ;
$orderby = RterunOrder($ConfigP['order_'.$PageVarList['SectionName']]) ;
$DataTabelId = RterunOrder_DataTabel($ConfigP['order_'.$PageVarList['SectionName']]) ;
$ActiveMode =  Rterun_ActiveMode($ConfigP['activemode_'.$PageVarList['SectionName']])  ;


//print_r3($PageVarList);

Add_But_NewOne($PageVarList);


$SqlCat_ID = Get_SqlCat_ID($PageVarList);
$ProID = Get_ProId();
$ProIdFilter = $ProID['ProIdFilter']; 

$THESQL = "SELECT * FROM $ThisTabelName where id != '0' $SqlCat_ID $ProIdFilter $ActiveMode $orderby ";
$THELINK = "view=".$Fs_ListUrl.$ProID['ProIdLink'];


$already = $db->H_Total_Count($THESQL);
if ($already > 0){
    
if($already > $ConfigP['datamax_'.$PageVarList['SectionName']]){
        $ConfigP['datatabel'] = '0';
}


/// UpdateConfigElement 
Print_UpdateConfigElement($ConfigP,$PageVarList);


    
    ///// Open_Header
$TaBelArr = array('Tabel'=>$ThisTabelName,"But"=>'1', 'DataTabelID'=> $DataTabelId );        
TableOpen_Header($TaBelArr);

Table_TH_Print('1',"ID","50");
Table_TH_Print($PageVarList['SubTabelType'],$ALang['managedate_sel_menu_cat'],"200");

Table_TH_Print('1',$ALang['mainform_mainfilde_name'],"200");
Table_TH_Print(ADD_EN,$ALang['mainform_mainfilde_name'].ENLANG,"200");
if($PageVarList['Fs_OrderBut'] != "" and $PageVarList['SubTabelType'] == '1' ){Table_TH_Print('1',"","50");}    
Table_TH_Print('1',"","50");
Table_TH_Print('1',"","50");
Table_TH_Print($PageVarList['Dell_S'],"","50");
echo '<th class="TD_50"><input type="checkbox" name="Check_ctr" value="yes" onClick="Check(document.myform.Check_ctr)"></th>';


///// TableClose_Header
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

echo '<tr>';
Table_TD_Print("1",$Name[$i]['id'],"C"); 

if($PageVarList['SubTabelType']){
$ThisCatName = GetNameFromID($PageVarList['SubTabelName'],$Name[$i]['pro_id'],$NamePrint);
$ThisCatNameLink = '<a href="index.php?view='.$Fs_ListUrl.'&ProId='.$Name[$i]['pro_id'].'">'.$ThisCatName.'</a>';
Table_TD_Print("1",$ThisCatNameLink,"C");    
}


Table_TD_Print("1",$Name[$i]['name'],"R"); 
Table_TD_Print(ADD_EN,$Name[$i]['name_en'],"C");

if($PageVarList['Fs_OrderBut'] != "" and $PageVarList['SubTabelType'] == '1' ){
$Order_Like = $PageVarList['Fs_OrderBut']."&ProId=".$Name[$i]['pro_id'];    
Table_TD_Print_Option('1',NF_PrintBut_TD('1',$AdminLangFile['mainform_but_order'],$Order_Like,"btn-info","fa-sort-amount-desc"),"C");  
  
}  

Table_TD_Print_Option('1',NF_PrintBut_TD('1',$ALang['mainform_edit'],$PageVarList['Fs_EditBut']."&id=".$id,"btn-info","fa-pencil"),"C");


if($PageVarList['Dell_S'] == '1'){
if($Name[$i]['count'] == '0'){
Table_TD_Print_Option('1',NF_PrintBut_TD('1',$ALang['mainform_delete'],$PageVarList['Fs_DellBut']."&id=".$id,"btn-danger","fa-window-close"),"C");
}else{
echo '<td align="center"></td>';    
}
}

Table_TD_Print('1',CheckUnitState($Name[$i]['state']),"C");
Table_TD_Print('1',PrintCheckBox_New($id),"C"); 



echo '</tr>';
} 
}
	
    
///// CloseTabel   
CloseTabel();

}else{ 
Alert_NO_Content();         
}



###########################################################<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
Close_Page();

?>
