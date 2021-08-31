<?php

#################################################################################################################################
###################################################   Etman_Customer_FilterForm
#################################################################################################################################
function Etman_Customer_FilterForm($ArrSend=array()){
    global $ALang ;
    $CoClea ="" ;
    $DateOff = ArrIsset($ArrSend,"DateOff","0");
    $LabelView = ArrIsset($ArrSend,"LabelView","on");
 
   
 
 
    if($LabelView == 'off'){
    $ALang['mainform_from_date'] = "" ; $ALang['mainform_to_date'] ="" ;   
    }
    
    echo '<form class="FilterForm FilterFormStyle" method="POST" name="Filter" id="validate-form" data-parsley-validate >';
    
 
    if($DateOff == '0'){
    $MoreS = array('Col' => "col-md-3",'required' => '');
    $Err[] = NF_PrintInput("DateEdit2",$ALang['mainform_from_date'],"date_from","0","0","option",$MoreS);
    $CoClea = ClearCol($CoClea);
    $Err[] = NF_PrintInput("DateEdit2",$ALang['mainform_to_date'],"date_to","0","0","option",$MoreS);
    $CoClea = ClearCol($CoClea);
    }
    
    echo '<div style="clear: both!important;"></div>';
    $CoClea = 0;
    $SQlFiltyer =  explode_Line($ArrSend['Members_Row']['complaint_id']);  
    $SQL_Line_Send = "select * from config_data where id != '0' $SQlFiltyer";
    $Arr = array("SQL_Line_Send" => $SQL_Line_Send, "Label" => $LabelView,"Active" => '1','Order'=> "order by postion"  );
    $Err[] = NF_PrintSelect_2018("Chosen",$ALang['member_list_complaint'],"col-md-3","complaint_id","config_data","optin","",$Arr);
    $CoClea = ClearCol($CoClea);
    

    $SQlFiltyer =  explode_Line($ArrSend['Members_Row']['citylist_id']);  
    $SQL_Line_Send = "select * from config_data where id != '0' $SQlFiltyer";
    $Arr = array("SQL_Line_Send" => $SQL_Line_Send, "Label" => $LabelView,"Active" => '1','Order'=> "order by postion"  );
    $Err[] = NF_PrintSelect_2018("Chosen",$ALang['member_list_city'],"col-md-3","city_id","config_data","optin","",$Arr);
    $CoClea = ClearCol($CoClea);
    
    
    $SQlFiltyer =  explode_Line($ArrSend['Members_Row']['branchlist_id']);  
    $SQL_Line_Send = "select * from config_data where id != '0' $SQlFiltyer";
    $Arr = array("SQL_Line_Send" => $SQL_Line_Send, "Label" => $LabelView,"Active" => '1','Order'=> "order by postion"  );
    $Err[] = NF_PrintSelect_2018("Chosen",$ALang['member_list_area'],"col-md-3","area_id","config_data","optin","",$Arr);
    $CoClea = ClearCol($CoClea);        
    
    
    echo '<div style="clear: both!important;"></div>';
///    print_r3($ArrSend['Members_Row']);
    
 
    echo '<div style="clear: both!important;"></div>';
    echo '<div class="col-md-12 col-sm-12 col-xs-12 form-group">';
    echo '<input type="submit" name="CustFliter" class="ArButForm btn btn-default" value="'.$ALang['mainform_filter_but'].'" />';
    echo '</div>';

    echo '</form>';

}

#################################################################################################################################
###################################################    Etman_Customer_Filter_SQl_Line
#################################################################################################################################
function  Etman_Customer_Filter_SQl_Line($ArrSend=array()){
    $End_SQL_Line = " "  ;

    $End_SQL_Line .= Filter_Post_Date("date_from","date_add","From");
    $End_SQL_Line .= Filter_Post_Date("date_to","date_add","To");
    
    $End_SQL_Line .= Filter_Post_ListBox("complaint_id","complaint_id");
    $End_SQL_Line .= Filter_Post_ListBox("city_id","city_id");
    $End_SQL_Line .= Filter_Post_ListBox("area_id","area_id");
    
    return $End_SQL_Line ;
}

#################################################################################################################################
###################################################   Filter_Post_Date
#################################################################################################################################
function Filter_Post_Date($Post_Name,$Filde_Name,$State){
    $LineSend = "";
    if(isset($_POST[$Post_Name]) and $_POST[$Post_Name] != ''){
        $TimeStamp =  strtotime($_POST[$Post_Name]);

        if($State == "From" ){
            $LineSend = " and ".$Filde_Name."  >= " .$TimeStamp ;
        }elseif($State == "To"){
            $LineSend = " and ".$Filde_Name."  <= " .$TimeStamp ;
        }
    }
    return $LineSend ;
}

#################################################################################################################################
###################################################    Filter_Post_ListBox
#################################################################################################################################
function Filter_Post_ListBox($Post_Name,$Filde_Name){
    $LineSend = "";
    if(isset($_POST[$Post_Name])){
        $SendVal = intval($_POST[$Post_Name]) ;
        if($SendVal  == '0'){
            $LineSend = "" ;
        }else{
            $LineSend = " and ".$Filde_Name." = " .$SendVal ;
        }
    }
    return $LineSend ;
}


#################################################################################################################################
###################################################    Report_Block_Resulte
#################################################################################################################################
function Report_Block_Resulte($TotalCount,$Members_Row){
    global $db ;
    global $ALang ;
    $CustId = $Members_Row['id'];
  
    echo '<div style="clear: both!important;"></div>';

    $CountCustomer = $db-> H_Total_Count("SELECT id FROM complaint where cust_id = '$CustId' ");
    ReportBlockPrint("col-md-3",$ALang['member_report_1'],intval($CountCustomer),"fa-file-text","alert-info");
    ReportBlockPrint("col-md-3",$ALang['report_totalcount'],intval($TotalCount),"fa-filter","alert-warning");
    $Persent = intval(($TotalCount / $CountCustomer)*100);
    ReportBlockPrint("col-md-3",$ALang['report_persent'],"% ".$Persent,"fa-eye","alert-success");
   
    echo '<div style="clear: both!important;"></div>';          
}




#################################################################################################################################
###################################################   explode_Line 
#################################################################################################################################
function explode_Line($Val){

    $Ch_Arr = explode('-',$Val);
    $Ch_Arr =  array_filter($Ch_Arr);
    $SQlFiltyer =  UnitTypeFilter_Form_From_One($Ch_Arr);
    return $SQlFiltyer ; 
}




#################################################################################################################################
###################################################   Etman_Customer_FilterForm
#################################################################################################################################
function Etman_FilterMonth($ArrSend=array()){
    global $ALang ;
    global $MonthName_Ar ;
    $CoClea ="" ;

    echo '<form class="FilterForm FilterFormStyle" method="POST" name="Filter" id="validate-form" data-parsley-validate >';


    $Arr = array("StartFrom" => '1',"Label" => "on", "ChangePrintVall"=> '0' );  
    $Err[] = NF_PrintSelect_2018("ArrFrom",$ALang['member_month_filter'],"col-md-4","thismonthe",$MonthName_Ar,"req","",$Arr);

    echo '<div style="clear: both!important;"></div>';
 
    echo '<div style="clear: both!important;"></div>';
    echo '<div class="col-md-12 col-sm-12 col-xs-12 form-group">';
    echo '<input type="submit" name="MonthFliter" class="ArButForm btn btn-default" value="'.$ALang['mainform_filter_but'].'" />';
    echo '</div>';

    echo '</form>';

}

	
?>