<?php
if(!defined('WEB_ROOT')) {	exit;}

###########################################################>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
OPen_Page($PageTitle);

$row = $db->H_CheckTheGet("CatId","id","customer","2");
$cust_id = $row['id'] ;

Print_Top_Survey_Menu($cust_id);


echo '<div style="clear: both!important;"></div>';

PrintFildInformation("col-md-6",$ALang['cust_name'],$row['name']);
PrintFildInformation("col-md-6",$ALang['cust_name_2'],$row['name_2']);
echo '<div style="clear: both!important;"></div>';

$THESQL = "select * from survey where cust_id = '$cust_id' order by postion ";
$THELINK = "view=".$view;
$ConfigP['datatabel'] = '0';
$PERpage = "20";

$already = $db->H_Total_Count($THESQL);
if ($already > 0){




$TaBelArr = array('Tabel'=>"survey", "But"=>'1', 'DataTabelID'=> "" );        
TableOpen_Header($TaBelArr);


Table_TH_Print('1',"ID","20");
Table_TH_Print("1",$ALang['cust_name'],"120"); 
Table_TH_Print('1',"","20");
Table_TH_Print('1',"","20");
Table_TH_Print('1',"","20");   
Table_TH_Print('1','<input type="checkbox" name="Check_ctr" value="yes" onClick="Check(document.myform.Check_ctr)">',"20");   
Table_TH_Print('1',"","20");


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
Table_TD_Print("1",$Name[$i]['name'],"R");



 
 

$Oth = array('OtherStyle'=>"NewButStyle");
 
Table_TD_Print_Option('1',NF_PrintBut_TD('2',$ALang['mainform_edit'],"EditSurvey&id=".$id,"btn-success","fa-pencil"),"C",$Oth);
Table_TD_Print_Option('1',NF_PrintBut_TD('2',"ترتيب المحتوى","SurveyListSort&CatId=".$id,"btn-info","fa-sort-amount-desc"),"C",$Oth); 
 
Table_TD_Print_Option('1',CheckUnitState($Name[$i]['state']),"C",$Oth);
Table_TD_Print_Option('1',PrintCheckBox_New($id),"C",$Oth); 

Table_TD_Print_Option('1',NF_PrintBut_TD('2',$ALang['mainform_delete'],"CustomerDelete&id=".$id,"btn-danger","fa-window-close"),"C",$Oth);

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