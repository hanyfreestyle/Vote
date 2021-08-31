<?php
if(!defined('WEB_ROOT')) {	exit;}


#################################################################################################################################
###################################################    Clear_SESSION
#################################################################################################################################
function Clear_SESSION($ViewPage){
    global $view;
    if($view == $ViewPage){
      if(!isset($_GET['page'])){
        UnsetAllSession('FilterDate');        
      }
    }else{
      UnsetAllSession('FilterDate');
    }
}


#################################################################################################################################
###################################################    Print_Persent_Chart
#################################################################################################################################
function Print_Persent_Chart($Row){
    global $ConfigP ;

    if($ConfigP['persent'] == '1'){

        if($Row['filter_3'] == '381' and $ConfigP['active_only'] == '1' ){
            $HHHH =  '<em class="fa  faIconss fa-minus-circle"></em>';
            Table_TD_Print(1,$HHHH,"C");
        }else{
            $MyArr=array("Style"=>"","Size"=>"sm","ChangeColor"=>'1');
            $CustChart =  Print_Circle_Chart($Row['persent'],$MyArr);
            Table_TD_Print($ConfigP['persent'],$CustChart,"C");
        }
    }
    
}

#################################################################################################################################
###################################################    UpdateStateLine
#################################################################################################################################
function UpdateStateLine(){
    global $ConfigP ;
    $UpdateState = "";
    $CustFilter = "";

    if($ConfigP['active_only'] == '1'){
        $CustFilter = " and  filter_3 != '381' ";
    }

    if(intval($ConfigP['quality']) == '0'){
        $QualityLine = " ";
    }else{
        $QualityLine = " or  persent <=  ". intval($ConfigP['quality']);
    }

    $UpdateState = " and ( review = '1' or a_review = '1' $QualityLine  ) $CustFilter ";
    return $UpdateState ;
}



#################################################################################################################################
###################################################    Customer_Print_Tabel_AdminReview
#################################################################################################################################
function Customer_Print_Tabel_AdminReview($RowS,$MyArr=array()){

    if($RowS['a_review'] == '1'){
        $TypeStyle = "ClosedD"  ;


    }elseif($RowS['a_review'] == '2'){

        $TypeStyle = "SamiClosed"  ;

    }elseif($RowS['a_review'] == '999'){

        $TypeStyle = "ReOpenD"  ;
    }else{
        $TypeStyle = ""  ;
    }

    return $TypeStyle;

}


#################################################################################################################################
###################################################    Table_New_IconStyle
#################################################################################################################################
function Table_New_IconStyle($State,$SoursBut,$But,$MyArr=array()){
    $NewBut = "";
    if($State == '1'){
        $NewBut = $SoursBut ;
        $NewBut .= $But ;
    }else{
        $NewBut = $SoursBut ;
    }

    return $NewBut ;
}




#################################################################################################################################
###################################################    
#################################################################################################################################
function Print_Top_Survey_Menu($cust_id){
echo '<div class="row"><div class="col-md-12 Row_Top">';
echo  NF_PrintBut_TD("1","اضافة استبيان جديد","SurveyAdd&CatId=".$cust_id,"btn-success","fa-plus-circle");
echo  NF_PrintBut_TD("1","عرض الاستبيانات","SurveyList&CatId=".$cust_id,"btn-info","fa-list");
echo  NF_PrintBut_TD("1","ترتيب المحتوى","SurveySort&CatId=".$cust_id,"btn-warning","fa-sort-amount-desc");
echo '</div></div>';

    
}


?>