<?php
if(!defined('WEB_ROOT')) {	exit;}

#################################################################################################################################
###################################################    Get_PageVarList
#################################################################################################################################
function Get_PageVarList($Arr){
    
    if(isset($Arr['SubTabelType']) and $Arr['SubTabelType'] == '1'){
    $SubTabelType = '1';  
    $SubTabelName = $Arr['SubTabelName'];   
    }else{
    $SubTabelType = '0'; 
    $SubTabelName = "";    
    }    
    
   if(isset($Arr['Filter_Filde']) and trim($Arr['Filter_Filde']) != ''){
   $FilterType = "1";
   $Filter_Filde  = $Arr['Filter_Filde'] ;
   $SubTabel_CatId  = $Arr['SubTabel_CatId'] ;  
   }else{
   $FilterType = "0";
   $Filter_Filde  = "" ;
   $SubTabel_CatId  = "" ;      
   }


    return  array(
        'H1'=> ArrIss($Arr,"H1",""),
        'Tabel_Type'=> ArrIss($Arr,"Tabel_Type","CatId"),
        'TabelName'=> ArrIss($Arr,"TabelName","config_data"),
        'Fs_CatId'=> ArrIss($Arr,"Fs_CatId",""),
        
        'SectionName'=> ArrIss($Arr,"SectionName","manage_data"),
        'Fs_ListUrl'=> ArrIss($Arr,"ListUrl","List".$Arr['MainUrl']),
        'Fs_AddBut'=>  ArrIss($Arr,"Fs_AddBut","Add".$Arr['MainUrl']),
        'Fs_EditBut'=> ArrIss($Arr,"Fs_EditBut","Edit".$Arr['MainUrl']),
        'Fs_DellBut'=> ArrIss($Arr,"Fs_DellBut","Dell".$Arr['MainUrl']),
        'Fs_OrderBut'=> ArrIss($Arr,"Fs_OrderBut","Order".$Arr['MainUrl']),

        'Dell_S'=> ArrIss($Arr,"Dell_S","1"),
        'Fs_Subtabel'=> ArrIss($Arr,"Fs_Subtabel","0"),
        'Fs_Subtabel_Filde'=> ArrIss($Arr,"Fs_Subtabel_Filde","0"),
        
        'SubTabelType'=> $SubTabelType,
        'SubTabelName'=> $SubTabelName,
        'FilterType'=> $FilterType,
        'Filter_Filde'=> $Filter_Filde,
        'SubTabel_CatId'=> $SubTabel_CatId,
    );
} 

#################################################################################################################################
###################################################    Get_PageVarList_Levels
#################################################################################################################################
function Get_PageVarList_Levels($Arr){


    return  array(
        'H1'=> ArrIss($Arr,"H1",""),
        'SectionName'=> ArrIss($Arr,"SectionName","manage_data"),
        'TabelName'=>  ArrIss($Arr,"TabelName","config_data"),
        'Fs_ListUrl'=> ArrIss($Arr,"ListUrl","List".$Arr['MainUrl']),
        'Fs_AddBut'=> ArrIss($Arr,"Fs_AddBut","Add".$Arr['MainUrl']),
        'Fs_EditBut'=> ArrIss($Arr,"Fs_EditBut","Edit".$Arr['MainUrl']),
        'Fs_DellBut'=>  ArrIss($Arr,"Fs_DellBut","Dell".$Arr['MainUrl']),
        'Fs_OrderBut'=> ArrIss($Arr,"Fs_OrderBut","Order".$Arr['MainUrl']),
              
        'Dell_S'=> ArrIss($Arr,"Dell_S","1"),
        'Tabel_Type'=> ArrIss($Arr,"Tabel_Type","CatId"),
        'Fs_CatId'=>  ArrIss($Arr,"Fs_CatId",""),

        'ThisLevel'=> ArrIss($Arr,"ThisLevel","0"),
        'LevelNames'=> $Arr['LevelNames'],
        'LevelCatId'=> $Arr['LevelCatId'],
        'SubTabelType'=> "1",
        
        'Fs_Subtabel'=> ArrIss($Arr,"Fs_Subtabel","0"),
        'Fs_Subtabel_Filde'=> ArrIss($Arr,"Fs_Subtabel_Filde","0"),
        /*
          'SubTabelType'=> $SubTabelType,
          'SubTabelName'=> $SubTabelName,
          'FilterType'=> $FilterType,
          'Filter_Filde'=> $Filter_Filde,
          'SubTabel_CatId'=> $SubTabel_CatId,
          */
    );
    
    /*
    if(isset($Arr['SubTabelType']) and $Arr['SubTabelType'] == '1'){
    $SubTabelType = '1';
    $SubTabelName = $Arr['SubTabelName'];
    }else{
    $SubTabelType = '0';
    $SubTabelName = "";
    }

   if(isset($Arr['Filter_Filde']) and trim($Arr['Filter_Filde']) != ''){
   $FilterType = "1";
   $Filter_Filde  = $Arr['Filter_Filde'] ;
   $SubTabel_CatId  = $Arr['SubTabel_CatId'] ;
   }else{
   $FilterType = "0";
   $Filter_Filde  = "" ;
   $SubTabel_CatId  = "" ;
   }
*/
    
}


#################################################################################################################################
###################################################    Add_But_NewOne
#################################################################################################################################
function Add_But_NewOne($PageVarList){
    global $ALang ;
 
    echo '<div class="row"><div class="col-md-12 Row_Top">';
    echo  NF_PrintBut_TD('1',$ALang['mainform_but_addnew'],$PageVarList['Fs_AddBut'],"btn-success","fa-plus-circle");
  
    if($PageVarList['Fs_OrderBut'] != "" and $PageVarList['SubTabelType'] != '1' ){
    echo  NF_PrintBut_TD('1',$ALang['mainform_but_order'],$PageVarList['Fs_OrderBut'],"btn-info","fa-sort-amount-desc");    
    }

    echo '</div></div>';
}

#################################################################################################################################
###################################################   Get_SqlCat_ID
#################################################################################################################################
function Get_SqlCat_ID($PageVarList){
   
    $Fs_CatId   = $PageVarList['Fs_CatId'];
     
    if($PageVarList['Tabel_Type'] == 'CatId'){
        $SqlCat_ID = " and cat_id = '$Fs_CatId' "    ;
    }else{
        $SqlCat_ID = " "    ;
    }
    return $SqlCat_ID ;
}


function Get_ProId(){
    if(isset($_GET['ProId'])){
    $ProId = intval($_GET['ProId']) ;
    $ProIdFilter = " and pro_id = '$ProId' "; 
    $ProIdLink = "&ProId=".$ProId;  
    }else{
    $ProIdFilter = ""; 
    $ProIdLink = "";   
    }
    return array('ProIdFilter'=>$ProIdFilter ,"ProIdLink"=>$ProIdLink) ; 
}
#################################################################################################################################
###################################################    
#################################################################################################################################
function Get_Levels_Id(){
    if(isset($_GET['Level_1'])){
    $Level_1 = intval($_GET['Level_1']) ;
    $SQL_Filter = " and level_1 = '$Level_1' "; 
    $SQL_Link = "&Level_1=".$Level_1; 
    
    }elseif(isset($_GET['Level_2'])){
   
    $Level_2 = intval($_GET['Level_2']) ;
    $SQL_Filter = " and level_2 = '$Level_2' "; 
    $SQL_Link = "&Level_2=".$Level_2; 

    }elseif(isset($_GET['Level_3'])){ 

    $Level_3 = intval($_GET['Level_3']) ;
    $SQL_Filter = " and level_3 = '$Level_3' "; 
    $SQL_Link = "&Level_3=".$Level_3; 
    
   
    }elseif(isset($_GET['Level_4'])){
   
    $Level_4 = intval($_GET['Level_4']) ;
    $SQL_Filter = " and level_4 = '$Level_4' "; 
    $SQL_Link = "&Level_4=".$Level_4; 
   
    }else{
    $SQL_Filter = ""; 
    $SQL_Link  = "";   
    }
    return array('SQL_Filter'=>$SQL_Filter ,"SQL_Link"=>$SQL_Link ) ; 
}


#################################################################################################################################
###################################################    HandleDuplicate
#################################################################################################################################
function ManageDate_HandleDuplicate($Tabel,$Filde,$Post,$id="0",$IdFilde="id",$Arr=array()){
    global $db ;
    global $AdminLangFile ;
    $Err = ""; $FilterIdd = "";$SubFildeFilter="";

    if($id != '0' ){
     $FilterIdd = " and $IdFilde != '$id' ";   
    }
    
    if(isset($Arr['SubFilde'])){
    $SubFildeFilter = " and ".$Arr['SubFilde']." = '".$Arr['SubFildeVal']."'";    
    }
    
    if(isset($Arr['SubFilterProId'])){
    $SubFildeFilter = $SubFildeFilter . " and ".$Arr['SubFilterProId']." = '".$Arr['SubFilterProIdVal']."'";  
    }

    $Name = PostIsset($Post);
    $already = $db->H_Total_Count("select * from $Tabel where $Filde = '$Name' $SubFildeFilter $FilterIdd ");
    if($already > '0'){
        SendJavaErrMass($Name." ".$AdminLangFile['mainform_name_add_err']);
        $Err = '1';
    }
    return  array('Val'=> $Name , 'Err'=> $Err );
}


#################################################################################################################################
###################################################   CatIdAddData
#################################################################################################################################
function CatIdAddData($PageVarList){
    $ThsiIsTest = '0';
    global $db ;
    global $Fs_ListUrl ;
    $ThisTabelName = $PageVarList['TabelName'];


    if($PageVarList['Tabel_Type'] == 'CatId'){
    $FilterCatId = array('SubFilde'=> 'cat_id','SubFildeVal'=> $PageVarList['Fs_CatId']);
    }else{
    $FilterCatId = array();    
    }
   
    if($PageVarList['SubTabelType'] == '1'){
    $FilterCatId = $FilterCatId + array( 'SubFilterProId'=> 'pro_id' , "SubFilterProIdVal"=> PostIsset_Intval("pro_id"));    
    } 
   

   
   
    $Name =  ManageDate_HandleDuplicate($ThisTabelName,"name",'name',"0","id",$FilterCatId);
    if(ADD_EN == '1'){
        $Name_En =   ManageDate_HandleDuplicate($ThisTabelName,"name_en",'name_en',"0","id",$FilterCatId);
    }else{
        $Name_En = $Name ;
    }
    $server_data = array ('id'=> NULL ,
        'name'=> $Name['Val']  ,
        'name_en'=> $Name_En['Val'] ,
        'cat_id'=>  $PageVarList['Fs_CatId']  ,
        'pro_id'=> $_POST['pro_id']  ,
        'state'=> "1"  ,
    );

    if($PageVarList['Tabel_Type'] != 'CatId'){
    unset($server_data['cat_id']);    
    }    

    if($ThsiIsTest == '1'){
        print_r3($server_data);
    }else{
        if( $Name['Err'] != '1' and  $Name_En['Err'] != '1' ){
            $db->AutoExecute($ThisTabelName,$server_data,AUTO_INSERT);
            Redirect_Page_2("index.php?view=".$Fs_ListUrl);
        }
    }
}

#################################################################################################################################
################################################### CatIdEditData  
#################################################################################################################################
function CatIdEditData($PageVarList){
    global $db ;
    global $Fs_ListUrl ;
    $ThsiIsTest = '0';
    $id = $_GET['id'];
    $ThisTabelName = $PageVarList['TabelName'];

    if( $PageVarList['Tabel_Type'] == 'CatId'){
    $FilterCatId = array('SubFilde'=> 'cat_id','SubFildeVal'=>$PageVarList['Fs_CatId']);
    }else{
    $FilterCatId = array();    
    }
    
    if($PageVarList['SubTabelType'] == '1'){
    $FilterCatId = $FilterCatId + array( 'SubFilterProId'=> 'pro_id' , "SubFilterProIdVal"=> PostIsset_Intval("pro_id"));    
    } 
    
      
    $Name =  ManageDate_HandleDuplicate($ThisTabelName,"name",'name',$id,"id",$FilterCatId);
    if(ADD_EN == '1'){
        $Name_En =   ManageDate_HandleDuplicate($ThisTabelName,"name_en",'name_en',$id,"id",$FilterCatId);
    }else{
        $Name_En = $Name ;
    }
    $server_data = array (
        'name'=> $Name['Val']  ,
        'name_en'=> $Name_En['Val'] ,
        'pro_id'=>  PostIsset_Intval("pro_id")  ,
    );
    if( $ThsiIsTest == '1'){
        print_r3($server_data);
    }else{
        if( $Name['Err'] != '1' and  $Name_En['Err'] != '1' ){
            $db->AutoExecute($ThisTabelName,$server_data,AUTO_UPDATE,"id = $id");
            Redirect_Page_2("index.php?view=".$Fs_ListUrl);
        }
    }
}




#################################################################################################################################
###################################################    LevelsAddData
#################################################################################################################################
function LevelsAddData($PageVarList){
    $ThsiIsTest = '0';
    global $db ;
    global $Fs_ListUrl ;
    $ThisTabelName = $PageVarList['TabelName'];
    $Pro_id = '0';


    if($PageVarList['Tabel_Type'] == 'CatId'){
    $FilterCatId = array('SubFilde'=> 'cat_id','SubFildeVal'=> $PageVarList['Fs_CatId']);
    }else{
    $FilterCatId = array();    
    }
    
    
    if($PageVarList['ThisLevel'] == '1'){
    $FilterCatId = $FilterCatId + array( 'SubFilterProId'=> 'level_1' , "SubFilterProIdVal"=> PostIsset_Intval("level_1"));    
    $Pro_id = PostIsset_Intval("level_1"); 
    } 
   
   
    if($PageVarList['ThisLevel'] == '2'){
    $FilterCatId = $FilterCatId + array( 'SubFilterProId'=> 'level_2' , "SubFilterProIdVal"=> PostIsset_Intval("level_2"));    
    $Pro_id = PostIsset_Intval("level_2"); 
    } 
   
 
    if($PageVarList['ThisLevel'] == '3'){
    $FilterCatId = $FilterCatId + array( 'SubFilterProId'=> 'level_3' , "SubFilterProIdVal"=> PostIsset_Intval("level_3")); 
    $Pro_id = PostIsset_Intval("level_3");    
    } 

    if($PageVarList['ThisLevel'] == '4'){
    $FilterCatId = $FilterCatId + array( 'SubFilterProId'=> 'level_4' , "SubFilterProIdVal"=> PostIsset_Intval("level_4"));
    $Pro_id = PostIsset_Intval("level_4");    
    } 
   
   
   
    $Name =  ManageDate_HandleDuplicate($ThisTabelName,"name",'name',"0","id",$FilterCatId);
    if(ADD_EN == '1'){
        $Name_En =   ManageDate_HandleDuplicate($ThisTabelName,"name_en",'name_en',"0","id",$FilterCatId);
    }else{
        $Name_En = $Name ;
    }

    $server_data = array();
    $server_data += array ('id'=> NULL ,
        'name'=> $Name['Val']  ,
        'name_en'=> $Name_En['Val'] ,
        'pro_id'=> $Pro_id ,
        'cat_id'=>  $PageVarList['Fs_CatId']  ,
        'level_1'=>   PostIsset_Intval("level_1") ,
        'level_2'=>   PostIsset_Intval("level_2") ,
        'level_3'=>   PostIsset_Intval("level_3") ,
        'level_4'=>   PostIsset_Intval("level_4") ,
        
        'state'=> "1"  ,
    );

    //$server_data +=array("hany"=> "test");
    
    
    if($ThsiIsTest == '1'){
        print_r3($server_data);
    }else{
        if( $Name['Err'] != '1' and  $Name_En['Err'] != '1' ){
            $db->AutoExecute($ThisTabelName,$server_data,AUTO_INSERT);
             Redirect_Page_2("index.php?view=".$Fs_ListUrl);
        }
    }
}


#################################################################################################################################
###################################################    LevelsAddData
#################################################################################################################################
function LevelsEditData($PageVarList){
    $ThsiIsTest = '0';
    $id = $_GET['id'];
    global $db ;
    global $Fs_ListUrl ;
    $ThisTabelName = $PageVarList['TabelName'];
   	$Pro_id = '0';
    


    if($PageVarList['Tabel_Type'] == 'CatId'){
    $FilterCatId = array('SubFilde'=> 'cat_id','SubFildeVal'=> $PageVarList['Fs_CatId']);
    }else{
    $FilterCatId = array();    
    }
    
    
    if($PageVarList['ThisLevel'] == '1'){
    $FilterCatId = $FilterCatId + array( 'SubFilterProId'=> 'level_1' , "SubFilterProIdVal"=> PostIsset_Intval("level_1")); 
    $Pro_id = PostIsset_Intval("level_1");   
    } 
   
   
    if($PageVarList['ThisLevel'] == '2'){
    $FilterCatId = $FilterCatId + array( 'SubFilterProId'=> 'level_2' , "SubFilterProIdVal"=> PostIsset_Intval("level_2"));
    $Pro_id = PostIsset_Intval("level_2");      
    } 
   
 
    if($PageVarList['ThisLevel'] == '3'){
    $FilterCatId = $FilterCatId + array( 'SubFilterProId'=> 'level_3' , "SubFilterProIdVal"=> PostIsset_Intval("level_3"));
    $Pro_id = PostIsset_Intval("level_3");      
    } 

    if($PageVarList['ThisLevel'] == '4'){
    $FilterCatId = $FilterCatId + array( 'SubFilterProId'=> 'level_4' , "SubFilterProIdVal"=> PostIsset_Intval("level_4"));
    $Pro_id = PostIsset_Intval("level_4");    
    } 
   
   
   
    $Name =  ManageDate_HandleDuplicate($ThisTabelName,"name",'name',$id,"id",$FilterCatId);
    if(ADD_EN == '1'){
        $Name_En =   ManageDate_HandleDuplicate($ThisTabelName,"name_en",'name_en',$id,"id",$FilterCatId);
    }else{
        $Name_En = $Name ;
    }

    $server_data = array();
    $server_data += array (
        'name'=> $Name['Val']  ,
        'name_en'=> $Name_En['Val'] ,
        'pro_id'=> $Pro_id ,
        'level_1'=>   PostIsset_Intval("level_1") ,
        'level_2'=>   PostIsset_Intval("level_2") ,
        'level_3'=>   PostIsset_Intval("level_3") ,
        'level_4'=>   PostIsset_Intval("level_4") ,
        
       
    );

    //$server_data +=array("hany"=> "test");
    
    
    if($ThsiIsTest == '1'){
        print_r3($server_data);
    }else{
        if( $Name['Err'] != '1' and  $Name_En['Err'] != '1' ){
            $db->AutoExecute($ThisTabelName,$server_data,AUTO_UPDATE,"id = $id");
            Redirect_Page_2("index.php?view=".$Fs_ListUrl);
        }
    }
}

#################################################################################################################################
###################################################  ArrIss
#################################################################################################################################
function ArrIss($Arr,$Name,$DefVall=""){
    if(isset($Arr[$Name])){
        $SendVal = $Arr[$Name] ;
    }else{
        $SendVal  = $DefVall;
    }
    return  $SendVal ;
}

#################################################################################################################################
###################################################  Print_UpdateConfigElement
#################################################################################################################################
function Print_UpdateConfigElement($ConfigP,$PageVarList,$More=array()){
    global $Order_ByList ;
    if($ConfigP['datatabel'] != '1'){
        $VallOf = array('PageCount' => 'perpage_'.$PageVarList['SectionName'], 'PageOrder' => "order_".$PageVarList['SectionName'] , 'OrderList' => $Order_ByList);
        UpdateConfigElement($VallOf);	
    }
}    



#################################################################################################################################
###################################################    Print_Level_SelList
#################################################################################################################################
function Print_Level_SelList($PageVarList,$ThisLevel){
    global  $ThisISEditPage ;
    global $row ;
  //  print_r3($row);
    $TabelNameIs = $PageVarList['TabelName'];
    $BeforLevel = $ThisLevel-1 ;
    $BeforLevel_Text = 'level_'.$BeforLevel;
    $CatIdFilter = $PageVarList['LevelCatId'][$ThisLevel];
    $ThisVall_List = '0';


    if(isset($_POST['B1'])){
        $BeforLevel_Val = PostIsset_Intval($BeforLevel_Text);
        $SQL_Line_Send = "select * from $TabelNameIs where cat_id = '$CatIdFilter' and  $BeforLevel_Text = '$BeforLevel_Val' ";
    }else{
        if($ThisISEditPage == '1'){
        $BeforLevel_Val = $row[$BeforLevel_Text];    
        $SQL_Line_Send = "select * from $TabelNameIs where cat_id = '$CatIdFilter' and  $BeforLevel_Text = '$BeforLevel_Val' ";
        $ThisVall_List =  $row['level_'.$ThisLevel];
        }else{
           $SQL_Line_Send = "select * from $TabelNameIs where id = '0' ";
        }
    }


    $Arr = array("Label" => 'on',"Active" => '1','SQL_Line_Send' => $SQL_Line_Send);
    $Err[] = NF_PrintSelect_2018("Chosen",$PageVarList['LevelNames'][$ThisLevel],"col-md-3","level_".$ThisLevel,"","req",$ThisVall_List,$Arr);

    //hidden
    echo '<input type="hidden" value="'.$PageVarList['LevelCatId'][$ThisLevel].'" name="Leavel'.$ThisLevel.'_Catid" id="Leavel'.$ThisLevel.'_Catid" />';
    echo '<input type="hidden" value="'.$PageVarList['LevelNames'][$ThisLevel].'" name="Leavel'.$ThisLevel.'_Name" id="Leavel'.$ThisLevel.'_Name" />';

}

#################################################################################################################################
###################################################   CountTheLevel 
#################################################################################################################################
function CountTheLevel($PageVarList){
    global $db ;
    $Id = $_GET['id'];
    $TB_Name = $PageVarList['TabelName'];
    $Already = '0';
    
    if($PageVarList['ThisLevel'] == '1'){
    $Already = $db->H_Total_Count("select id from $TB_Name where level_2 = '$Id' ");
     }
 
    if($PageVarList['ThisLevel'] == '2'){
    $Already = $db->H_Total_Count("select id from $TB_Name where level_3 = '$Id' ");
    }
    
    if($PageVarList['ThisLevel'] == '3'){
    $Already = $db->H_Total_Count("select id from $TB_Name where level_4 = '$Id' ");
    }
     
    return $Already ;
}

#################################################################################################################################
###################################################   CountTheLevelDelete 
#################################################################################################################################

function CountTheLevelDelete($PageVarList){
    global $db ;
    $Id = $_GET['id'];
    $TB_Name = $PageVarList['TabelName'];
    $Already = '0';

    if($PageVarList['ThisLevel'] == '0'){
    $Already = $db->H_Total_Count("select id from $TB_Name where level_1 = '$Id' ");
    }

    if($PageVarList['ThisLevel'] == '1'){
    $Already = $db->H_Total_Count("select id from $TB_Name where level_2 = '$Id' ");
    }
 
    if($PageVarList['ThisLevel'] == '2'){
    $Already = $db->H_Total_Count("select id from $TB_Name where level_3 = '$Id' ");
    }
    
    if($PageVarList['ThisLevel'] == '3'){
    $Already = $db->H_Total_Count("select id from $TB_Name where level_4 = '$Id' ");
    }
     
    return $Already ;
}


?>