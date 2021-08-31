<?php

 

if(!defined('WEB_ROOT')) {	exit;}

    if($ConfigP['datatabel'] != '1' and $USER_PERMATION_Edit == '1'){
        $VallOf_Arr = array('PageCount' => 'perpage_'.$SectionName, 'PageOrder' => "order_".$SectionName , 'OrderList' => $Order_ByList);
        ConfigElement_UpdateAjex($VallOf_Arr);
    }


    
 
 
$TaBelArr = array('Tabel'=>$ThisTabelName, "But"=>'1', 'DataTabelID'=> $DataTabelId );        
TableOpen_Header($TaBelArr);


Table_TH_Print('1',"ID","20");
Table_TH_Print("1",$ALang['cust_name'],"120"); 
Table_TH_Print("1",$ALang['new_member_type'],"120"); 
Table_TH_Print('1',$ALang['cust_mobile'],"70");
Table_TH_Print('1',"","50");

Table_TH_Print('1',"","20"); 
Table_TH_Print('1',"","20");
Table_TH_Print('1',"","20");
Table_TH_Print('1',"","20");
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
Table_TD_Print("1",GetMemberType($Name[$i]['member_type']),"C");
Table_TD_Print(1,$Name[$i]['mobile'],"C");

Table_TD_Print_Photo("1",$Name[$i]['photo_t'],"C"); 


$Oth = array('OtherStyle'=>"NewButStyle");
Table_TD_Print_Option('1',NF_PrintBut_TD('2',$ALang['mainform_edit'],"EditCustomer&id=".$id,"btn-info","fa-pencil"),"C",$Oth);
Table_TD_Print_Option('1',NF_PrintBut_TD('2',"ادارة الاستبيانات","SurveyList&CatId=".$id,"btn-primary","fa-list-ol"),"C",$Oth);

Table_TD_Print_Option('1',NF_PrintBut_TD('2',$ALang['cust_manage_branch'],"BranchManage&id=".$id,"btn-primary","fa-map-marker"),"C",$Oth);
Table_TD_Print_Option('1',NF_PrintBut_TD('2',$ALang['cust_profile_h1'],"Profile&id=".$id,"btn-primary","fa-user"),"C",$Oth);



$ViewUrl = "Customer_Branch_QR.php?id=".$Name[$i]['id'] ;
Table_TD_Print_Option('1',NF_PrintBut_TD('Full_Url',$ALang['cust_qr'],$ViewUrl,"btn-inverse","fa-qrcode","1"),"C",$Oth);


$ViewUrl = CUSTOMER_QR_URL.$Name[$i]['name_m'] ;
Table_TD_Print_Option('1',NF_PrintBut_TD('Full_Url',$ALang['cust_view_url'],$ViewUrl,"btn-warning","fa-eye-slash","1"),"C",$Oth);


Table_TD_Print_Option('1',CheckUnitState($Name[$i]['state']),"C",$Oth);
Table_TD_Print_Option('1',PrintCheckBox_New($id),"C",$Oth); 

Table_TD_Print_Option('1',NF_PrintBut_TD('2',$ALang['mainform_delete'],"CustomerDelete&id=".$id,"btn-danger","fa-window-close"),"C",$Oth);

echo '</tr>';
} 
}

///// CloseTabel   
CloseTabel();

#################################################################################################################################
###################################################   RterunOrder
#################################################################################################################################
function GetMemberType($state) {
    global $ALang ;
    switch($state) {
        case "0":
            $order = $ALang['new_member_0'] ;
            break;
        case "1":
            $order = $ALang['new_member_1'];
            break;
        default:
            $order = ' Errrrr ';
    }
    return $order;
}

 
?>