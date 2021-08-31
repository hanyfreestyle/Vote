<?php
if(!defined('WEB_ROOT')) {	exit;}

###########################################################>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
OPen_Page($PageTitle);

if($AdminConfig['admin'] == '1'){
    $row = $db->H_CheckTheGet("id","id","customer","2");
    $CustomerIDD = $row['id'];
    
    $Customer_sub = $db->H_Total_Count("select id from customer_sub where cust_id = '$CustomerIDD'");
    $Customer_Branch = $db->H_Total_Count("select id from customer_data where cust_id = '$CustomerIDD'");
    $Cust_Complaint = $db->H_Total_Count("select id from complaint where cust_id = '$CustomerIDD'");
 
        

    if(isset($_GET['Confirm'])){
      
 
       if($Customer_sub != '0'){
       $db->H_DELETE_Filte_With_Filde("customer_sub","cust_id",$CustomerIDD);
       }         
       
       if($Customer_Branch != '0'){
       $db->H_DELETE_Filte_With_Filde("customer_data","cust_id",$CustomerIDD);
       }
          
       if($Cust_Complaint != '0'){
       $db->H_DELETE_Filte_With_Filde("complaint","cust_id",$CustomerIDD);
       }
                 
       Image_Dell("2",$CustomerIDD,F_PATH_D,"customer","photo","photo_t");
         
       $db->H_DELETE_Filte_With_Filde("customer","id",$CustomerIDD);  
              
        
       Redirect_Page_2("index.php?view=ListCustomer");
        
    }else{
        PrintConfMass($Customer_sub,"من جدول وسائل الاتصال الاخرى ");
        PrintConfMass($Customer_Branch,"من جدول فروع العميل ");
        PrintConfMass($Cust_Complaint,"من سجل الشكاوى الخاصة بالعميل");
        
        New_Print_Alert("4",$AdminLangFile['mainform_confirm_dell_mass']." ".$row['name']);
       
        
        PrintDeleteButConfirm("ListCustomer","CustomerDelete&id=".$CustomerIDD);
    }
 
    
    
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
