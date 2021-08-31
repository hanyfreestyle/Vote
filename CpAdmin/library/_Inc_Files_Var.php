<?php

if(isset($_SERVER['HTTP_REFERER'])) {
define('LASTREFFPAGE', $_SERVER['HTTP_REFERER']);
}
$AdminLangFile['Mfname'] = "Filde Name";
$PopUpPageS ="";
$ThisPageForReport = "";
$UserSQlFilter = "";
$HomePage = "";
$ThisPageName="";
$ThisIsFilterPage ="";
$ArrForm="";
$order_by_cat = "";
$Contacts_Button = "";
$RowCount = "";
$Depart="";
$ErrDate  ="";
$Period_Lang = ""; 
$Sction = "";
$OPenBlank = "";
$SubLineFilter =""; 
$ErrForm = ""; 
$ReqFilterDate = "";



#################################################################################################################################
###################################################   religion
#################################################################################################################################
/*
$Religion_Arr = array(
    '1' =>  $AdminLangFile['customer_religion_muslim'],
    '2' =>  $AdminLangFile['customer_religion_christian'],
);
function RterunReligion($state) {
    global $AdminLangFile ;
    switch($state) {
        case "1":
            $order = $AdminLangFile['customer_religion_muslim'] ;
            break;
        case "2":
            $order = $AdminLangFile['customer_religion_christian'];
            break;
        default:
            $order = "";
    }
    return $order;
}
*/
#################################################################################################################################
###################################################   RterunOrder
#################################################################################################################################
function RterunOrder($state) {
    switch($state) {
        case "1":
            $order = '  ORDER BY id DESC ';
            break;
        case "2":
            $order = ' ORDER BY id ASC ';
            break;
        default:
            $order = ' ORDER BY id DESC ';
    }
    return $order;
}
function RterunOrder_DataTabel($state) {
    switch($state) {
        case "1":
            $order = "NewTableOrder";
            break;
        case "2":
            $order = 'MyCustmer';
            break;
        default:
            $order = 'MyCustmer';
    }
    return $order;
}
$Order_ByList = array(
    '1' =>  $AdminLangFile['mainform_newest_to_older'],
    '2' =>  $AdminLangFile['mainform_older_to_newest'],
);


function Rterun_ActiveMode($state) {
    switch($state) {
        case "0":
            $order = "";
            break;
        case "1":
            $order = " and state = '1' ";
            break;
        default:
            $order = '';
    }
    return $order;
}


##############################################################################################################################################################
################################ LangAdd_Redirect
##############################################################################################################################################################
$LangAdd_Redirect = array(
    '1' => $AdminLangFile['mainform_lang_redirect_new'],
    '2' => $AdminLangFile['mainform_lang_redirect_list'],
    '3' => $AdminLangFile['mainform_lang_redirect_list_update'],
);
function LangAdd_Redirect($state) {
    switch($state) {
        case "1":
            $order = Redirect_Page_2("index.php?view=Add");
            break;
        case "2":
            $order = Redirect_Page_2("index.php?view=List");
            break;
        case "3":
            $order = Redirect_Page_2("index.php?view=UpdateLang");
            break;
        default:
            $order = Redirect_Page_2("index.php?view=Add");
    }
    return $order;
}
##############################################################################################################################################################
################################ LangEdit_Redirect
##############################################################################################################################################################
$LangEdit_Redirect = array(
    '1' => $AdminLangFile['mainform_lang_redirect_list'],
    '2' => $AdminLangFile['mainform_lang_redirect_list_update'],
    '3' =>  $AdminLangFile['mainform_lang_redirect_list_cat'],
);
function LangEdit_Redirect($state,$Cat_Id) {
    switch($state) {
        case "1":
            $order = Redirect_Page_2("index.php?view=List");
            break;
        case "2":
            $order = Redirect_Page_2("index.php?view=UpdateLang");
            break;
        case "3":
            $order = Redirect_Page_2("index.php?view=List&Cat_Id=".$Cat_Id);
            break;
        default:
            $order = Redirect_Page_2(LASTREFFPAGE);
    }
    return $order;
}

#################################################################################################################################
###################################################   RterunOrderName
#################################################################################################################################
function RterunOrderName($state) {
    global $AdminLangFile ;
    switch($state) {
        case "1":
            $order = $AdminLangFile['mainform_list_by_order'];
            break;
        case "2":
            $order = $AdminLangFile['mainform_newest_to_older'] ;
            break;
        case "3":
            $order = $AdminLangFile['mainform_older_to_newest'];
            break;
        case "4":
            $order = ' ORDER BY date DESC ';
            break;
        default:
            $order = 'Error ';
    }
    return $order;
}

#################################################################################################################################
###################################################   ReturnPERpage
#################################################################################################################################
function ReturnPERpage($PERpage){
    if(intval($PERpage)<= "0"){
        $PERpage = "1";
    }else{
        $PERpage = $PERpage ;
    }
    return $PERpage ;
}
##############################################################################################################################################################
################################ CatAdd_Redirect
##############################################################################################################################################################
$CatAdd_Redirect = array(
'1' => $AdminLangFile['mainform_c_redirect_new'],
'2' => $AdminLangFile['mainform_c_redirect_list'],
'3' => $AdminLangFile['mainform_c_redirect_config'],
);

function CatAdd_Redirect($state) {
   switch($state) {
     case "1":
       $order = Redirect_Page_2("index.php?view=Cat_Add");
       break;
     case "2":
       $order = Redirect_Page_2("index.php?view=Cat_List");;
       break;
     case "3":
       $order = Redirect_Page_2("index.php?view=Config");;
       break;
     default:
       $order = Redirect_Page_2("index.php?view=Cat_Add");
   }
   return $order;
 }
 

##############################################################################################################################################################
################################ CatEdit_Redirect
############################################################################################################################################################## 
$CatEdit_Redirect = array(
//'1' => "عرض نفس المجموعة ",
'1' => $AdminLangFile['mainform_c_redirect_same'],
'2' => $AdminLangFile['mainform_c_redirect_list'],
'3' => $AdminLangFile['mainform_c_redirect_config'],
); 
function CatEdit_Redirect($state) {
   switch($state) {
     case "1":
       $order = Redirect_Page_2(LASTREFFPAGE);
       break;
     case "2":
       $order = Redirect_Page_2("index.php?view=Cat_List");;
       break;
     case "3":
       $order = Redirect_Page_2("index.php?view=Config");;
       break;
     default:
       $order = Redirect_Page_2(LASTREFFPAGE);
   }
   return $order;
 } 

##############################################################################################################################################################
################################ UnitEdit_Redirect
############################################################################################################################################################## 
$UnitEdit_Redirect = array(
'1' => $AdminLangFile['mainform_u_redirect_same'],
'2' => $AdminLangFile['mainform_u_redirect_list'],
'3' => $AdminLangFile['mainform_u_redirect_config'],
); 
function UnitEdit_Redirect($state) {
   switch($state) {
     case "1":
       $order = Redirect_Page_2(LASTREFFPAGE);
       break;
     case "2":
       $order = Redirect_Page_2("index.php?view=List");;
       break;
     case "3":
       $order = Redirect_Page_2("index.php?view=Config");;
       break;
     default:
       $order = Redirect_Page_2(LASTREFFPAGE);
   }
   return $order;
 } 
 
##############################################################################################################################################################
################################ UnitAdd_Redirect
############################################################################################################################################################## 
$UnitAdd_Redirect = array(
'1' => $AdminLangFile['mainform_u_redirect_new'],
'2' => $AdminLangFile['mainform_u_redirect_list'],
'3' => $AdminLangFile['mainform_u_redirect_config'],
);

function UnitAdd_Redirect($state) {
   switch($state) {
     case "1":
       $order = Redirect_Page_2("index.php?view=Add");
       break;
     case "2":
       $order = Redirect_Page_2("index.php?view=List");;
       break;
     case "3":
       $order = Redirect_Page_2("index.php?view=Config");;
       break;
     default:
       $order = Redirect_Page_2("index.php?view=Add");
   }
   return $order;
 }
  

?>
