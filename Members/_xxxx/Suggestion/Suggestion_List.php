<?php
###########################################################>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
OPen_Page($PageTitle);



$ConfigP['datatabel'] ="0";
$PERpage = "10" ;
$orderby = "order by id " ;
$ViewPageing = "1";
#$SqlCat_ID = Get_SqlCat_ID($PageVarList);

$ThisTabelName = "complaint_suggestion";




$THESQL = "SELECT * FROM $ThisTabelName where state = '1' and  cust_id = '$CustMembers_Id' $NewState $orderby";
 
$already = $db->H_Total_Count($THESQL);
if($already > '0'){

ReportBlockPrint("col-md-3",$ALang['report_totalcount'],intval($already),"fa-filter","alert-warning");
echo '<div style="clear: both!important;"></div>'; 
    
$THELINK = "view=".$view;
$TableView = array('Date'=> "1",'CustName'=> "1",'CustMobile'=> "1",'Complaint'=> "1",'City'=> "1",'Area'=> "1");

require_once "../_Page/List_Suggestion_Inc.php";   
}else{
    echo '<div style="clear: both!important;"></div>'.BR.BR;
    Alert_NO_Content();
}
 




###########################################################<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
Close_Page();	



function Get_CatId(){
    if(isset($_GET['CatId'])){
    $CatId = intval($_GET['CatId']) ;
    $CatIdFilter = " and complaint_id = '$CatId' "; 
    $ProIdLink = "&CatId=".$CatId;  
    }else{
    $CatIdFilter = ""; 
    $ProIdLink = "";   
    }
    return array('ProIdFilter'=>$CatIdFilter ,"ProIdLink"=>$ProIdLink) ; 
}


function Get_CityId(){
    if(isset($_GET['CityId'])){
    $CatId = intval($_GET['CityId']) ;
    $CatIdFilter = " and city_id = '$CatId' "; 
    $ProIdLink = "&CityId=".$CatId;  
    }else{
    $CatIdFilter = ""; 
    $ProIdLink = "";   
    }
    return array('ProIdFilter'=>$CatIdFilter ,"ProIdLink"=>$ProIdLink) ; 
}

function Get_AreaId(){
    if(isset($_GET['AreaId'])){
    $CatId = intval($_GET['AreaId']) ;
    $CatIdFilter = " and area_id = '$CatId' "; 
    $ProIdLink = "&AreaId=".$CatId;  
    }else{
    $CatIdFilter = ""; 
    $ProIdLink = "";   
    }
    return array('ProIdFilter'=>$CatIdFilter ,"ProIdLink"=>$ProIdLink) ; 
}



?>