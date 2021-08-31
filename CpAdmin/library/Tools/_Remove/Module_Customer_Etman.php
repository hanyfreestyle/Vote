<?php
if(!defined('WEB_ROOT')) {	exit;}




#################################################################################################################################
###################################################    Cust_Print_SystemInfo
#################################################################################################################################
function Cust_Print_SystemInfo($PageType,$row){
    global $ALang ;
    global $ConfigP ;
    
    if($PageType == 'Edit'){
        $EditFilde = "Edit";
        $branch = $row['branch'];
        
        $filter_1 = $row['filter_1']; $filter_2 = $row['filter_2']; $filter_3 = $row['filter_3'];
        $empl_1 =  $row['empl_1']; $empl_2 = $row['empl_2']; $empl_3 = $row['empl_3'];
        
        $payment = $row['payment'];
        
    }else{
        $EditFilde = "";
        $branch = "";
       $filter_1 =""; $filter_2 = ""; $filter_3 = "";
        $empl_1 = ""; $empl_2 = ""; $empl_3 = "";
        $payment = "";
    }
    
    
    if($ConfigP['tape_view'] == '1'){
        echo '<div id="SystemInfo" class="tab-pane fade">';
        echo BR;
    }else{
        New_Print_Alert("2",$ALang['cust_alert_system_info']);
    }
    echo '<div style="clear: both!important;"></div>';

    $Arr = array("Label" => 'on',"Active" => '1',"Filter_Filde"=> "cat_id" ,"Filter_Vall"=> "f_branch");
    $Err[] = NF_PrintSelect_2018("Chosen",$ALang['cust_branch'],"col-md-3","branch","config_data","req",$branch,$Arr);

   
    $MoreS = array('Col'=> "col-md-3",'required' => 'required data-parsley-type="digits"','Dir'=> "En_Lang" );
    $Err[] = NF_PrintInput("Text".$EditFilde,$ALang['cust_code'],"s_code","","","req-num",$MoreS);
   
    $Arr = array("Label" => 'on',"Active" => '1',"Filter_Filde"=> "cat_id" ,"Filter_Vall"=> "payment");
    $Err[] = NF_PrintSelect_2018("Chosen",$ALang['cust_payment'],"col-md-3","payment","config_data","req",$payment,$Arr);
    
   
    
    $MoreS = array('Col'=> "col-md-3",'required' => 'required data-parsley-type="digits"','Dir'=> "En_Lang" );
    $Err[] = NF_PrintInput("Text".$EditFilde,$ALang['cust_price_code'],"price_code","","","req-num",$MoreS);
    
 
    echo '<div style="clear: both!important;"></div>';

    $Arr = array("Label" => 'on',"Active" => '1',"Filter_Filde"=> "cat_id" ,"Filter_Vall"=> "filter_1");
    $Err[] = NF_PrintSelect_2018("Chosen",$ALang['cust_custfilter_1'],"col-md-3","filter_1","config_data","req",$filter_1,$Arr);
    
    $Arr = array("Label" => 'on',"Active" => '1',"Filter_Filde"=> "cat_id" ,"Filter_Vall"=> "filter_2");
    $Err[] = NF_PrintSelect_2018("Chosen",$ALang['cust_custfilter_2'],"col-md-3","filter_2","config_data","req",$filter_2,$Arr);

    $Arr = array("Label" => 'on',"Active" => '1',"Filter_Filde"=> "cat_id" ,"Filter_Vall"=> "filter_3");
    $Err[] = NF_PrintSelect_2018("Chosen",$ALang['cust_custfilter_3'],"col-md-3","filter_3","config_data","req",$filter_3,$Arr);

    
    
    echo '<div style="clear: both!important;"></div>';   

    $Arr = array("Label" => 'on',"Active" => '1',"Filter_Filde"=> "cat_id" ,"Filter_Vall"=> "sales_empl");
    $Err[] = NF_PrintSelect_2018("Chosen",$ALang['cust_empl_1'],"col-md-3","empl_1","config_data","req",$empl_1,$Arr);
    $Err[] = NF_PrintSelect_2018("Chosen",$ALang['cust_empl_2'],"col-md-3","empl_2","config_data","req",$empl_2,$Arr);
    $Err[] = NF_PrintSelect_2018("Chosen",$ALang['cust_empl_3'],"col-md-3","empl_3","config_data","req",$empl_3,$Arr);
    
    echo '<div style="clear: both!important;"></div>'.BR;
    if($ConfigP['tape_view'] == '1'){echo '</div>';}
    
}
#################################################################################################################################
###################################################    Cust_Print_Address
#################################################################################################################################
function Cust_Print_Address($PageType,$row){
    global $ALang ;
    global $ConfigP ;
    
    if($ConfigP['tape_view'] == '1'){
        echo '<div id="Address" class="tab-pane fade">';
        echo BR;
    }else{
        New_Print_Alert("2",$ALang['cust_alert_address']);
    }
    
    if($PageType == 'Edit'){
        $EditFilde = "Edit";
        $country_id = $row['country_id'];
        $CityId = $row['city_id'];
        $AreaId = $row['area_id'];
    }else{
        $EditFilde = "";
        $country_id = "";
        $CityId = '0';
        $AreaId = '0';
    }
    
    $Arr = array("Label" => 'on',"Active" => '0',"Filter_Filde"=> "cat_id" ,"Filter_Vall"=> "Country");
    $Err[] = NF_PrintSelect_2018("Chosen",$ALang['cust_country'],"col-md-3","country_id","config_data","req",$country_id,$Arr);

    if(isset($_POST['city_id'])){
        $CityId = intval($_POST['city_id']);
    }
    $SQL_Line_City  = "select * from config_data where cat_id = 'City' and id = '$CityId' ";
    $Arr = array("Label" => 'on',"Active" => '0',"SQL_Line_Send"=> $SQL_Line_City );
    $Err[] = NF_PrintSelect_2018("Chosen",$ALang['cust_city'],"col-md-3","city_id","f_location","req",$CityId,$Arr);
    
    
    if(isset($_POST['area_id'])){
        $AreaId = intval($_POST['area_id']);
    }
    $SQL_Line_Area  = "select * from config_data where cat_id = 'Area' and id = '$AreaId' ";
    $Arr = array("Label" => 'on',"Active" => '0', "SQL_Line_Send"=> $SQL_Line_Area);
    $Err[] = NF_PrintSelect_2018("Chosen",$ALang['cust_area'],"col-md-3","area_id","f_location","req",$AreaId,$Arr);
    
    echo '<div style="clear: both!important;"></div>'; 
    
    $MoreS = array('Col' => "col-md-6",'required' => 'data-parsley-minlength="25"');
    $Err[] = NF_PrintInput("TextArea".$EditFilde,$ALang['cust_address'],"address","0","0","req",$MoreS);
    $MoreS = array('Col'=>"col-md-6" ,'required' => '' );
    $Err[] = NF_PrintInput("TextArea".$EditFilde,$ALang['cust_notes'],"notes","0","0","option",$MoreS);
    echo '<div style="clear: both!important;"></div>'.BR;
    if($ConfigP['tape_view'] == '1'){echo '</div>';}
}







#################################################################################################################################
###################################################    Cust_Print_SystemInfo_Profile
#################################################################################################################################
function Cust_Print_SystemInfo_Profile($row){
    global $ALang ;
    global $CONFIG_DATA_Arr ;
    global $NamePrint ;
    echo '<div id="SystemInfo" class="tab-pane fade">';
    echo '<div style="clear: both!important;"></div>';
   
    $Branch = findValue_FromArr($CONFIG_DATA_Arr,"id",$row['branch'],$NamePrint);
    $payment = findValue_FromArr($CONFIG_DATA_Arr,"id",$row['payment'],$NamePrint);

    $empl_1 = findValue_FromArr($CONFIG_DATA_Arr,"id",$row['empl_1'],$NamePrint);
    $empl_2 = findValue_FromArr($CONFIG_DATA_Arr,"id",$row['empl_2'],$NamePrint);
    $empl_3 = findValue_FromArr($CONFIG_DATA_Arr,"id",$row['empl_3'],$NamePrint);
    
    
    
    $filter_1 = findValue_FromArr($CONFIG_DATA_Arr,"id",$row['filter_1'],$NamePrint);
    $filter_2 = findValue_FromArr($CONFIG_DATA_Arr,"id",$row['filter_2'],$NamePrint);
    $filter_3 = findValue_FromArr($CONFIG_DATA_Arr,"id",$row['filter_3'],$NamePrint);
    
 
    PrintFildInformation("col-md-3",$ALang['cust_branch'],$Branch);
    PrintFildInformation("col-md-3",$ALang['cust_code'],$row['s_code']);
    PrintFildInformation("col-md-3",$ALang['cust_payment'],$payment);
    PrintFildInformation("col-md-3",$ALang['cust_price_code'],$row['price_code']);
    echo '<div style="clear: both!important;"></div>';

 
    
    
    PrintFildInformation("col-md-3",$ALang['cust_custfilter_1'],$filter_1);
    PrintFildInformation("col-md-3",$ALang['cust_custfilter_2'],$filter_2);
    PrintFildInformation("col-md-3",$ALang['cust_custfilter_3'],$filter_3);
    echo '<div style="clear: both!important;"></div>';


    PrintFildInformation("col-md-3",$ALang['cust_empl_1'],$empl_1);
    PrintFildInformation("col-md-3",$ALang['cust_empl_2'],$empl_2);
    PrintFildInformation("col-md-3",$ALang['cust_empl_3'],$empl_3);


    
    
    echo '<div style="clear: both!important;"></div>'.BR;
    echo '</div>';
}
#################################################################################################################################
###################################################    Cust_Print_Address_Profile
#################################################################################################################################
function Cust_Print_Address_Profile($row){
    global $ALang ;
    global $NamePrint ;
    global $CONFIG_DATA_Arr ;
    global $db ;
    echo '<div id="Address" class="tab-pane fade">';
 
    $Country_id = findValue_FromArr($CONFIG_DATA_Arr,"id",$row['country_id'],$NamePrint);
    $City_id = findValue_FromArr($CONFIG_DATA_Arr,"id",$row['city_id'],$NamePrint);
    $Area_id = findValue_FromArr($CONFIG_DATA_Arr,"id",$row['area_id'],$NamePrint);
    PrintFildInformation("col-md-3",$ALang['cust_country'],$Country_id);
    PrintFildInformation("col-md-3",$ALang['cust_city'],$City_id);
    PrintFildInformation("col-md-3",$ALang['cust_area'],$Area_id);
    echo '<div style="clear: both!important;"></div>';
    PrintFildInformation("col-md-6",$ALang['cust_address'],$row['address']);
    PrintFildInformation("col-md-6",$ALang['cust_notes'],$row['notes']);
    echo '<div style="clear: both!important;"></div>'.BR;
    echo '</div>';
}










#################################################################################################################################
###################################################    
#################################################################################################################################



#################################################################################################################################
###################################################    
#################################################################################################################################
function Report_Print_ProductCat_Tabel($EndArr,$TotalCount){
    global $ConfigP ;
    
    

    if(isset($ConfigP['catpro_chartview'])){
       $ViewState = $ConfigP['catpro_chartview'] ; 
    }else{
       $ViewState = '0' ;   
    }
    
    if(isset($ConfigP['catpro_reslutcount']) and intval($ConfigP['catpro_reslutcount']) != '0'){
       $CountViweList  = $ConfigP['catpro_reslutcount'] ; 
    }else{
      $CountViweList  = count($EndArr) ; 
    }
    
        


    ///// Open_Header
    TableOpen_Header();

    Table_TH_Print('1',"مجموعة المنتجات","50");
    Table_TH_Print('1',"عدد العملاء ","50");
    Table_TH_Print($ViewState,"النسبة","50");

    ///// TableClose_Header
    TableClose_Header();

    for($i = 0; $i < $CountViweList ; $i++) {
        $Persent = ($EndArr[$i]['count'] /$TotalCount)*100 ;

        $MyArr=array("Style"=>"","Size"=>"sm","ChangeColor"=>'0');
        $CustChart =  Print_Circle_Chart($Persent,$MyArr);
    
        if($EndArr[$i]['count'] != '0'){
            echo '<tr>';
            Table_TD_Print('1',$EndArr[$i]['name'],"C");
            Table_TD_Print("1",$EndArr[$i]['count'],"C",array('OtherStyle'=>"Td_Count"));
            Table_TD_Print($ViewState,$CustChart,"C");
            echo '</tr>';
        }
    }


    ///// CloseTabel
    CloseTabel();
}



#################################################################################################################################
###################################################    
#################################################################################################################################

function Cust_Print_Complain_XX($PageType,$row){
    global $ALang ;
    global $ConfigP ;
 
    
    if($PageType == 'Edit'){
        $EditFilde = "Edit";
    }else{
        $EditFilde = "";
    }
    
    
    if($ConfigP['tape_view'] == '1'){
        echo '<div id="Contact" class="tab-pane fade in active">';
        echo BR;
    }else{
        New_Print_Alert("2",$ALang['cust_complain_h1']);
    }
    
 
    $MoreS = array('Col' => "col-md-6",'Placeholder'=> "",'required' => 'required ','Dir'=> "Ar_Lang");
    $Err[] = NF_PrintInput("Text".$EditFilde,$ALang['cust_complain'],"complain","1","1","req",$MoreS);
    
    
    echo '<div style="clear: both!important;"></div>'.BR;
    if($ConfigP['tape_view'] == '1'){echo '</div>';}
}







?>