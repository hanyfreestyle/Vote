<?php
if(!defined('WEB_ROOT')) {	exit;}

###########################################################>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
OPen_Page($PageTitle);

 
    $row = $db->H_CheckTheGet("id","id","customer_data","2");
    $Branch_IDD = $row['id'];
    $CustIdd = $row['cust_id']; 
    
    $Complaint_Tabel = $db->H_Total_Count("select id from complaint where branch_id = '$Branch_IDD'");
    
 
      

    if(isset($_GET['Confirm'])){
        
       if($Complaint_Tabel != '0'){
       $db->H_DELETE_Filte_With_Filde("complaint","branch_id",$Branch_IDD);
       }         

     $db->H_DELETE_Filte_With_Filde("customer_data","id",$Branch_IDD);  
              
        
     Redirect_Page_2("index.php?view=BranchManage&id=".$CustIdd);
        
    }else{
        
        
        PrintConfMass($Complaint_Tabel,"من سجل الشكاوى ");

        
        New_Print_Alert("4",$AdminLangFile['mainform_confirm_dell_mass']." ".$row['name']);
       
        
        PrintDeleteButConfirm("BranchManage&id=".$CustIdd,"BranchDell&id=".$Branch_IDD);
    }
 
    
    
 


function PrintConfMass($Vall,$SendMass){
    if(intval($Vall) != '0'){
    $Mass = " سيتم حذف عدد "." ".$Vall." ".$SendMass ;
    New_Print_Alert("2",$Mass);    
    }
     
}
###########################################################<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
Close_Page();

?>
