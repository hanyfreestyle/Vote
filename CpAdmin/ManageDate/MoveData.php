<?php
if(!defined('WEB_ROOT')) {	exit;}


#################################################################################################################################
###################################################    
#################################################################################################################################
      $PageTitle = "تحويل البيانات";
      $PageTitle     = $Module_H1.$PageTitle ;
      $ThisTabelName = "sa_neighborhoods" ;
       
###########################################################>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
OPen_Page($PageTitle);
 
$ConfigP['datatabel'] = "0";
$PERpage = "50" ;
$orderby = "order by cityId " ;
$DataTabelId = " " ;
$ActiveMode = ""  ;



if(isset($_POST['D_Move'])){
    if(intval($_POST['city_id']) == "0"){
      New_Print_Alert("4","برجاء تحديد المدينة");   
    }else{
        

    
    if(isset($_POST['id_id']) and count($_POST['id_id']) != '0'){
      $EmailCount = count($_POST['id_id']);
      
       for ($i = 0; $i < $EmailCount; $i++){
            $id =  $_POST['id_id'][$i]  ;
            
            
            $MyData = $db->H_SelectOneRow( "select * from sa_neighborhoods where id = '$id' ");
  
  
            $server_data = array (
            'cat_id'=> "Area",
            'pro_id'=> $_POST['city_id'],
            'name'=> $MyData['nameAr'],
            'name_en'=> $MyData['nameAr'],
            'state'=> "1"
            );
           
          
           
           $db->AutoExecute("config_data",$server_data,AUTO_INSERT);
           $db->H_DELETE_FromId("sa_neighborhoods",$id);
        }  
      
             
    }else{
      New_Print_Alert("4","برجاء تحديد المحتوى");  
    }
    }
}



if(isset($_POST['D_Dell'])){
    if(isset($_POST['id_id']) and count($_POST['id_id']) != '0'){
        $EmailCount = count($_POST['id_id']);
        for ($i = 0; $i < $EmailCount; $i++){
            $id =  $_POST['id_id'][$i]  ;
            $db->H_DELETE_FromId("sa_neighborhoods",$id);
        } 
         Redirect_Page(LASTREFFPAGE);  
    }else{
      New_Print_Alert("4","برجاء تحديد المحتوى");  
    }
}


 
$ProID = Get_ProId_Move();
 
$ProIdFilter = $ProID['ProIdFilter']; 

$THESQL = "SELECT * FROM $ThisTabelName where id != '0'  $ProIdFilter $ActiveMode $orderby ";

$THELINK = "view=".$view.$ProID['ProIdLink'];


$already = $db->H_Total_Count($THESQL);
if ($already > 0){
    
 
$AddBut = '<button type="submit"  name="AddBut" class="mb-sm btn btn-success">AddBut</button>';
$OtherBut  = '<div class="row PanelMin TopButAction"><div class="col-md-12">';
$OtherBut .='<button type="submit"  name="D_Move" class="mb-sm btn btn-success">نقل</button> ';
$OtherBut .='<button type="submit"  name="D_Dell" class="mb-sm btn btn-danger ">حذف</button> ';
$OtherBut .='</div> </div><div style="clear: both;"></div>';
 


   ///// Open_Header
$TaBelArr = array('Tabel'=>$ThisTabelName,"But"=>'0','Del'=>'1', 'DataTabelID'=> $DataTabelId ,'OtherBut'=>$OtherBut);        
TableOpen_Header($TaBelArr);

$Arr = array("Label" => 'off',"Active" => '0','Order'=> "order by count desc" , "Filter_Filde"=> "cat_id" , "Filter_Vall"=> "City");      
$Err[] = NF_PrintSelect_2018("Chosen","قائمة المدن","col-md-3","city_id","config_data","",0,$Arr);	
echo '<div style="clear: both!important;"></div>';


Table_TH_Print('1',"ID","50");
Table_TH_Print('1',"الاسم","200");
Table_TH_Print('1',"ID","50");



/*
Table_TH_Print($PageVarList['SubTabelType'],$ALang['managedate_sel_menu_cat'],"200");


Table_TH_Print(ADD_EN,$ALang['mainform_mainfilde_name'].ENLANG,"200");
if($PageVarList['Fs_OrderBut'] != "" and $PageVarList['SubTabelType'] == '1' ){Table_TH_Print('1',"","50");}    
Table_TH_Print('1',"","50");
Table_TH_Print('1',"","50");
Table_TH_Print($PageVarList['Dell_S'],"","50");

*/
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
Table_TD_Print("1",$Name[$i]['nameAr'],"C");  
 
$ThisCatNameLink = '<a href="index.php?view=MoveData&ProId='.$Name[$i]['cityId'].'">'.$Name[$i]['cityId'].' مجموعة </a>';
Table_TD_Print("1",$ThisCatNameLink,"C");   

/*
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
*/


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



function Get_ProId_Move(){
    if(isset($_GET['ProId'])){
    $ProId = intval($_GET['ProId']) ;
    $ProIdFilter = " and cityId = '$ProId' "; 
    $ProIdLink = "&ProId=".$ProId;  
    }else{
    $ProIdFilter = ""; 
    $ProIdLink = "";   
    }
    return array('ProIdFilter'=>$ProIdFilter ,"ProIdLink"=>$ProIdLink) ; 
}


?>
