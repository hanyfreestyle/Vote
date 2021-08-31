<?php
if(!defined('WEB_ROOT')) {	exit;}



#################################################################################################################################
###################################################    PrintFildComplaint
#################################################################################################################################
function PrintFildComplaint($Size,$Titel,$Info){
    echo '<div class="'.$Size.' col-sm-12 col-xs-12 DirRight ComplaintInfo">';
    echo '<div class="col-md-6 Name">'.$Titel.'</div>';
    echo '<div class="col-md-6 Info">'.nl2br($Info).'</div>';
    echo '</div>';    
}

#################################################################################################################################
###################################################    Update_Complaint_View
#################################################################################################################################
function Update_Complaint_View($row){
    global $db ;
    
    if($row['view'] == '0'){
    $id = $row['id'];
    $server_data = array ('view'=> "1" );
    $db->AutoExecute("complaint",$server_data,AUTO_UPDATE,"id = $id");
    }
    
}





function Add_Test_Data($Members_Row){
global   $db ;

$Complaint_Arr =  explode('-',$Members_Row['complaint_id']);
$Complaint_Arr =  array_filter($Complaint_Arr);

$Branchlist_Arr = explode('-',$Members_Row['branchlist_id']);
$Branchlist_Arr =  array_filter($Branchlist_Arr);
 

#print_r3($Complaint_Arr);
#print_r3($Branchlist_Arr);

echo ConvertDateToCalender_2("1546293600").BR;  
$StartDate = "1546293600" ;
$StartDate = $StartDate - 86400 ;
 
for ($i = 1; $i <= 75; $i++) {
 $StartDate = $StartDate+86400;
 $RandNum =  rand(1,60);
 $RandNum =  rand(1,10);
 
 
    for ($x = 1; $x <= $RandNum ; $x++) {
        
        
        $Complaint_id = array_random($Complaint_Arr);
        $Branchlist_id = array_random($Branchlist_Arr);
        $City_id = GetNameFromID("config_data",$Branchlist_id,"pro_id"); 

         
       $Month =  intval(date("m",$StartDate));
       $Year =  intval(date("Y",$StartDate));
       $NameMUrl = Rand_String_H("10").$x  ;
 
        $server_data = array ('id'=> NULL ,
            'date_add'=> $StartDate ,
            'name_m'=> $NameMUrl ,
        
            'date_month'=> $Month."-".$Year,
            'date_year'=> $Year,
            'date_time'=>  $StartDate,
        
           'cust_mobile'=>"0555555884",
           'cust_name'=>"اسم العميل",
                    
            'complaint_id'=> $Complaint_id  ,
            'city_id'=> $City_id  ,
            'area_id'=> $Branchlist_id  ,
            'cust_id'=>  $Members_Row['id']   ,
            'state'=> "1" ,
            'view'=> "0" ,
        ); 
        
        print_r3($server_data);
       # $db->AutoExecute("complaint",$server_data,AUTO_INSERT);
          
    }
   
// echo  $rand_keys = array_rand($Ch_Arr,1).BR;  
 echo ConvertDateToCalender_2($StartDate)." ".$StartDate.BR;  
   
} 
}





function array_random($arr, $num = 1) {
    shuffle($arr);
   
    $r = array();
    for ($i = 0; $i < $num; $i++) {
        $r[] = $arr[$i];
    }
    return $num == 1 ? $r[0] : $r;
}






 /*

 

 
function Customer_GetRow(){
    $Line = "" ;
    $Line .= "c_type,c_type_2," ; 
    if(F_LEAD_TYPE == 1){$Line .= "lead_type," ; }
    if(F_LEAD_SOURS == 1){$Line .= "lead_sours," ;}
    if(F_CITY_ID == 1){$Line .= "city_id," ; }
    if(F_COUNTRY_ID == 1){$Line .= "country_id," ;}
    if(F_FULL_COUNTRY == '1'){$Line .= "countrylive_id,live_id," ;} 
    if(F_SOCIAL_ID == '1'){$Line .= "social_id," ;} 
    if(F_JOP_ID == '1'){$Line .= "jop_id," ;} 
    if(F_KIND_ID == '1'){$Line .= "kind_id," ;} 
    if(F_LEAD_CAT == '1'){$Line .= "lead_cat," ;} 
    $Line .= "id"; 
   return $Line ;
}
 
 
 function Ticket_GetRow(){
    $Line = "" ;
    $Line .= "c_type,c_type_2,user_id,state,ticket_cust," ;
    
if(F_LEAD_TYPE == 1){$Line .= "lead_type," ; }
if(F_LEAD_SOURS == 1){$Line .= "lead_sours," ;}
if(F_CITY_ID == 1){$Line .= "city_id," ; }
if(F_COUNTRY_ID == 1){$Line .= "country_id," ;}
if(F_FULL_COUNTRY == 1){$Line .= "countrylive_id,live_id," ;}
if(F_SOCIAL_ID ==1){$Line .= "social_id," ;}
if(F_JOP_ID == 1){$Line .= "jop_id," ;}
if(F_KIND_ID == 1){$Line .= "kind_id," ;}
if(F_LEAD_CAT ==1){$Line .= "lead_cat," ;}
if(F_CASH_ID == 1){$Line .= "cash_id," ;}
if(F_DATE_RECEIPT_ID == 1){$Line .= "date_id," ;}
if(F_AREA_ID == 1){$Line .= "area_id," ;}
if(F_UNIT_TYPE_ID == 1){$Line .= "unit_id," ;}
if(F_PROJECT_AREA == 1){$Line .= "pro_area," ;}   
if(F_COURS == 1){$Line .= "cours_id," ;}       
    $Line .= "id"; 
    
    return $Line ;
 }
 


function  CustmerSqlFiterLine_2018(){
  $End_SQL_Line = " "  ;
  if(isset($_POST['date_from'])){
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_Date($_POST['date_from'],"t.date_add","From");  
  }
  if(isset($_POST['date_to'])){
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_Date($_POST['date_to'],"t.date_add","To");    
  }
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('user_id',"t.user_id"); 
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('ticket_state',"t.state");
  
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('ticket_cust',"t.ticket_cust"); 
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('lead_cat',"t.lead_cat"); 
  
  
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('cust_type',"t.c_type"); 
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('cust_type_2',"t.c_type_2"); 
  
  
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('lead_type',"t.lead_type");   
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('lead_sours',"t.lead_sours");   
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('jop_id',"t.jop_id");  
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('kind_id',"t.kind_id");  
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('social_id',"t.social_id");  
  
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('live_id',"t.live_id");  
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('country_id',"t.country_id");  
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('countrylive_id',"t.countrylive_id");  
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('city_id',"t.city_id");  

  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('cash_id',"t.cash_id");  
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('date_id',"t.date_id");  
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('area_id',"t.area_id");  
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('unit_id',"t.unit_id"); 
  if(isset($_POST['pro_area'])){
  $End_SQL_Line .= CustmerSqlFiterLineFromPostAsLike($_POST['pro_area'],"t.pro_area");  
  }
  if(isset($_POST['cours_id'])){
  $End_SQL_Line .= CustmerSqlFiterLineFromPostAsLike($_POST['cours_id'],"t.cours_id");  
  }
  

  return $End_SQL_Line ;
    
}

  
$YearListArr = array(
'1'=> '2017',
'2'=> '2018',
'3'=> '2019',  
) ; 

 
function GetYearFrom_Date_To_List($state) {
   switch($state) {
     case "2017":
       $SelList = '1';
       break;
     case "2018":
       $SelList = '2';
       break;
     case "2019":
       $SelList = '3';
       break;
       
   default:
       $SelList = '2';
   }
   return $SelList;
}

function GetYearFrom_List_To_Date($state) {
   switch($state) {
     case "1":
       $SelList = '2017';
       break;
     case "2":
       $SelList = '2018';
       break;
     case "3":
       $SelList = '2019';
       break;
       
   default:
       $SelList = '2018';
   }
   return $SelList;
}

 #################################################################################################################################
###################################################   GetARDate
#################################################################################################################################
function GetMonthName_For_chart($Vall) {
 
 if(ADMIN_WEB_LANG == 'En'){
    
    switch($Vall) {
     case 1:
       $namemonth = "January";
       break;
     case 2:
       $namemonth = "February";
       break;
     case 3:
       $namemonth = "March ";
       break;
     case 4:
       $namemonth = "April ";
       break;
     case 5:
       $namemonth = "May ";
       break;
     case 6:
       $namemonth = "June ";
       break;
     case 7:
       $namemonth = "July ";
       break;
     case 8:
       $namemonth = "August ";
       break;
     case 9:
       $namemonth = "September ";
       break;
     case 10:
       $namemonth = "October ";
       break;
     case 11:
       $namemonth = "November ";
       break;
     case 12:
       $namemonth = "December ";
       break;
   }   
    
 }else{
    
   switch($Vall) {
     case 1:
       $namemonth = "يناير";
       break;
     case 2:
       $namemonth = "فبراير";
       break;
     case 3:
       $namemonth = "مارس";
       break;
     case 4:
       $namemonth = "إبريل";
       break;
     case 5:
       $namemonth = "مايو";
       break;
     case 6:
       $namemonth = "يونيو";
       break;
     case 7:
       $namemonth = "يوليو";
       break;
     case 8:
       $namemonth = "اغسطس";
       break;
     case 9:
       $namemonth = "سبتمبر";
       break;
     case 10:
       $namemonth = "اكتوبر";
       break;
     case 11:
       $namemonth = "نوفمبر";
       break;
     case 12:
       $namemonth = "ديسمبر";
       break;
   }    
   
 }
 

   return $namemonth ;
   
}


*/
?>