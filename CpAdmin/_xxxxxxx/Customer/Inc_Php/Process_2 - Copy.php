<?php






#################################################################################################################################
###################################################    Branch_Add
#################################################################################################################################
function Branch_Add($PostName,$Cust_id){
    global $db;
   
   if(trim(PostIsset($PostName)) != ""){
        $Branch = array (
                'cat_id'=> "Branch",
                'cust_id'=> $Cust_id,
                'area_id'=>  PostIsset("branch_area"),
                'name'=> PostIsset($PostName),
                'name_en'=> PostIsset($PostName),
                'state'=> "1",
       );
       $db->AutoExecute("customer_data",$Branch,AUTO_INSERT);   
   }

}


#################################################################################################################################
###################################################    Add_New_Branch
#################################################################################################################################
function Add_New_Branch($db){
           
           
            $Cust_id = $_POST['cust_id'];
            
            Branch_Add("branch_name",$Cust_id);
            Branch_Add("branch_name_02",$Cust_id);
            Branch_Add("branch_name_03",$Cust_id);
            Branch_Add("branch_name_04",$Cust_id);
            Redirect_Page_2(LASTREFFPAGE);
} 







 
?>