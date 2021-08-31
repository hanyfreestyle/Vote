<?php
if(!defined('WEB_ROOT')) {	exit;}
 

#################################################################################################################################
###################################################   CustmerSqlFiterLine
#################################################################################################################################
function  CustmerSqlFiterLine(){
  $End_SQL_Line = " "  ;

  if(isset($_POST['date_from'])){
      $End_SQL_Line .= CustmerSqlFiterLineFromPost_Date($_POST['date_from'],"date_add","From");
  }

  if(isset($_POST['date_to'])){
      $End_SQL_Line .= CustmerSqlFiterLineFromPost_Date($_POST['date_to'],"date_add","To");
  }

  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018("user_id","user_id");
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018("ticket_state","state");
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018("ticket_cust","ticket_cust");
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018("lead_cat","lead_cat");
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('cust_type',"c_type");
  if(isset($_POST['cust_type']) AND intval($_POST['cust_type'])!= '0'){
      $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018("cust_type_2","c_type_2");
  }

  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('lead_type',"lead_type");
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018("lead_sours","lead_sours");
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('jop_id',"jop_id");
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('kind_id',"kind_id");
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('religion',"religion");
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('social_id',"social_id");
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('live_id',"live_id");
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('country_id',"country_id");
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('countrylive_id',"countrylive_id");
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('city_id',"city_id");
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('cash_id',"cash_id");
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('date_id',"date_id");
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('area_id',"area_id");
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('unit_id',"unit_id");
  if(isset($_POST['pro_area'])){
      $End_SQL_Line .= CustmerSqlFiterLineFromPostAsLike($_POST['pro_area'],"pro_area");
  }


  return $End_SQL_Line ;
    
}


function  CustmerSqlFiterLine_ForVisits(){
  $End_SQL_Line = " "  ;
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018("user_id","user_id"); 
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('ticket_state',"state");
  
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('ticket_cust',"ticket_cust"); 
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('lead_cat',"lead_cat"); 
  
  
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018("cust_type","c_type"); 
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('cust_type_2',"c_type_2"); 
  
  
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('lead_type',"lead_type");   
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('lead_sours',"lead_sours");   
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('jop_id',"jop_id");  
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('kind_id',"kind_id");  
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('social_id',"social_id");  
  
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('live_id',"live_id");  
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('country_id',"country_id");  
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('countrylive_id',"countrylive_id");  
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('city_id',"city_id");  

  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('cash_id',"cash_id");  
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('date_id',"date_id");  
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('area_id',"area_id");  
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_2018('unit_id',"unit_id"); 

  if(isset($_POST['pro_area'])){
      $End_SQL_Line .= CustmerSqlFiterLineFromPostAsLike($_POST['pro_area'],"pro_area");
  }
  return $End_SQL_Line ;
    
}

#################################################################################################################################
###################################################   CountDayForLoop
#################################################################################################################################
function CountDayForLoop($start_date,$end_date){
    $Def = $end_date - $start_date  ;
    if($Def == '0'){
     $countday = '1' ;  
    }else{
      $countday = ($Def / 86400)+1 ;  
    }
   $countday =  round($countday);
    
return $countday ;
}


function CountDayForLoop_Confirm($start_date,$end_date){
    $start_date = strtotime($start_date); 
    $end_date =  strtotime($end_date); 

$Def = $end_date - $start_date  ;
    if($Def == '0'){
     $countday = '1' ;  
    }else{
      $countday = ($Def / 86400)+1 ;  
    }
return $countday ;
}




#################################################################################################################################
###################################################   OtherSqlFiterLine
#################################################################################################################################
function  OtherSqlFiterLine($Filed){
  $End_SQL_Line = " "  ;
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_Date($_POST['date_from'],$Filed,"From"); 
  $End_SQL_Line .= CustmerSqlFiterLineFromPost_Date($_POST['date_to'],$Filed,"To");  
  $End_SQL_Line .= CustmerSqlFiterLineFromPost($_POST['user_id'],"user_id"); 
  return $End_SQL_Line ;
}


#################################################################################################################################
###################################################   ReportBlockPrint
#################################################################################################################################
function ReportBlockPrint($Col,$Titel,$Vall,$Icon="",$Color="bg-danger"){
echo '<div class="'.$Col.' report_widget">';
echo '<div class="panel widget">';
echo '<div class="row row-table row-flush">';
if($Icon){
echo '<div class="col-xs-4 '.$Color.' text-center">';
echo '<em class="fa '.$Icon.' fa-2x"></em>';
echo '</div>';  
$textCol = 'col-xs-8';  
}else{
$textCol = 'col-xs-12';      
}
echo '<div class="'.$textCol.'">';
echo '<div class="panel-body text-center">';
echo '<h4 class="mt0">'.$Vall.'</h4>';
echo '<p class="mb0 text-muted">'.$Titel.'</p>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
}


#################################################################################################################################
###################################################   GetSendArrToChart
#################################################################################################################################
function GetSendArrToChart($SellTabel,$SellFiled,$MasterT,$MasterTFilterFiled,$MasterTFilterFiledValue,$MasterTSellFiled  ){
    global $db ;
    $Name = $db->SelArr("SELECT * FROM $SellTabel where $SellFiled  != '0' ");
    $EndArr = array();
    for($i = 0; $i < count($Name); $i++) {
    $ThisId = $Name[$i]['id'] ;
    $SubCount = mysql_num_rows(mysql_query("SELECT id FROM $MasterT where $MasterTFilterFiled = $MasterTFilterFiledValue
      and  $MasterTSellFiled = $ThisId "));
        if($SubCount != '0') {
              $NewVall =  array ('name'=> $Name[$i]['name'] , 'count'=> $SubCount);
            array_push($EndArr,$NewVall);
        }
    }
    $EndArr = array_sort($EndArr, 'count', SORT_DESC);
    return $EndArr ;
}


#################################################################################################################################
###################################################   CharPrintArr
#################################################################################################################################
function CharPrintArr($Col,$ItamID,$Titel,$Arr,$Collapse="1"){
            global $db ;
            global $AdminLangFile ;
echo '<div class="'.$Col.' col-sm-12 col-xs-12 ChartRight">';
if($Collapse == '1'){
echo '<div class="panel panel-default"><div class="panel-heading">';
echo '<a href="#" data-perform="panel-collapse" data-toggle="tooltip" title="Collapse Panel" class="pull-right"><em class="fa fa-minus"></em></a>';
echo '<div class="panel-title">'.$Titel.'</div>';
echo '</div>';
echo '<div class="panel-collapse">';
echo '<div class="panel-body">';    
}else{
echo '<div class="ChartTitle">'.$Titel.'</div>';    
}
////////////
echo '<div class="My_Chart_Container ">';
echo '<div id="'.$ItamID.'" class="placeholder"></div>';
echo '</div>';
echo '<div class="My_Chart_Legend '. $ItamID .'" ></div>';
///////////
if($Collapse == '1'){ 
echo '</div>';
echo '</div>';
echo '</div> ';
}
echo '</div>';
?>  
<script type="text/javascript">
$(function() {
        var data = [
<?php
//$Arr = array("Tabel"=>"f_cust_type","Filde"=>"count","LIMIT"=>"5",  );
$Tabel = $Arr['Tabel'];
$Name =  $Tabel ;
if(isset($Arr['Filde'])){ $Filde = $Arr['Filde'];}
if(isset($Arr['MasterTabel'])){ $MasterTabel = $Arr['MasterTabel'];}
if(isset($Arr['MasterFilde'])){ $MasterFilde = $Arr['MasterFilde'];}

$LIMIT = $Arr['LIMIT'];


$TotalCount = $Arr['TotalCount'];
if(count($Name) < $LIMIT){
 $LIMIT = count($Name)  ;   
} 
$EndCount = "0" ;
for($i = 0; $i < $LIMIT ; $i++) {
$Percent_V = ($Name[$i]['count']/$TotalCount)*100 ;  
$EndCount = $EndCount+$Name[$i]['count'];  
$Percent_V = round($Percent_V, 0);
$Percent = '('. $Percent_V .'%)'; 
$LabelPrint = $Name[$i]['name']." ".$Name[$i]['count']." ".$Percent;
if($Name[$i]['id'] == '0'){
echo '{ label: "'.$LabelPrint.'", color:"#ff0000", data: '.$Percent_V.'},' ;     
}else{
echo '{ label: "'.$LabelPrint.'",   data: '.$Percent_V.'},' ;     
}
} 
$OtherVall = $TotalCount-($EndCount) ;
if($OtherVall != '0' ){
$Percent_V = ($OtherVall/$TotalCount)*100 ;    
$Percent_V = round($Percent_V, 0);
$Percent = '('. $Percent_V .'%)'; 
$LabelPrint = $AdminLangFile['report_other_vall']." ".$OtherVall." ".$Percent;
echo '{ label: "'.$LabelPrint.'", color:"#303dd5",  data: '.$Percent_V.'},' ;       
}
?>       
];
var placeholder = $("#<?php echo $ItamID ?>");
    $.plot(placeholder, data, {
        colors: ["#b2d766", "#ff8154", "#878bb8",  "#ffe989", "#4ac9b4"],
        series: {
            pie: {
                    show: true,
                    radius: 1,
                    innerRadius: 0.5,
                label: {
                    show: true,
                    radius: 3/4,
                    formatter: labelFormatter,
                    background: {
                    opacity: 0.8,
                    color: '#000'
                    }
                }
            }
        },
        legend: {
            show: true,
            container: ".<?php echo $ItamID ?>",
        }
    });
});
function labelFormatter(label, series) {
return "<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>" + Math.round(series.percent) + "%</div>";
}
</script>
<?php 
}


#################################################################################################################################
###################################################   ChartNewPrint
#################################################################################################################################
function ChartNewPrint($Col,$ItamID,$Titel,$Arr,$Collapse="1"){
            global $db ;
            global $AdminLangFile ;
echo '<div class="'.$Col.' col-sm-12 col-xs-12 ChartRight">';
if($Collapse == '1'){
echo '<div class="panel panel-default"><div class="panel-heading">';
echo '<a href="#" data-perform="panel-collapse" data-toggle="tooltip" title="Collapse Panel" class="pull-right"><em class="fa fa-minus"></em></a>';
echo '<div class="panel-title">'.$Titel.'</div>';
echo '</div>';
echo '<div class="panel-collapse">';
echo '<div class="panel-body">';    
}else{
echo '<div class="ChartTitle">'.$Titel.'</div>';    
}
////////////
echo '<div class="My_Chart_Container ">';
echo '<div id="'.$ItamID.'" class="placeholder"></div>';
echo '</div>';
echo '<div class="My_Chart_Legend '. $ItamID .'" ></div>';
///////////
if($Collapse == '1'){ 
echo '</div>';
echo '</div>';
echo '</div> ';
}
echo '</div>';
?>  
<script type="text/javascript">
$(function() {
        var data = [
<?php
//$Arr = array("Tabel"=>"f_cust_type","Filde"=>"count","LIMIT"=>"5",  );
$Tabel = $Arr['Tabel'];
$Filde = $Arr['Filde'];
$LIMIT = $Arr['LIMIT'];
$MasterTabel = $Arr['MasterTabel'];
$MasterFilde = $Arr['MasterFilde'];
$TotalCount = $Arr['TotalCount'];
if($Arr['Type'] == 'TabelList'){
$Name = $db->SelArr("SELECT * FROM $Tabel order by $Filde desc LIMIT $LIMIT ");	    
}elseif($Arr['Type'] == 'SendArr'){
$Name =  $Tabel ; 
}
if(count($Name) < $LIMIT){
 $LIMIT = count($Name)  ;   
} 
$EndCount = "0" ;
for($i = 0; $i < $LIMIT ; $i++) {
$Percent_V = ($Name[$i][$Filde]/$TotalCount)*100 ;  
$EndCount = $EndCount+$Name[$i][$Filde ];  
$Percent_V = round($Percent_V, 0);
$Percent = '('. $Percent_V .'%)'; 
$LabelPrint = $Name[$i]['name']." ".$Name[$i][$Filde]." ".$Percent;
echo '{ label: "'.$LabelPrint.'",  data: '.$Percent_V.'},' ;   
} 
if($MasterTabel){
if($Arr['Type'] == 'TabelList'){    
$already = mysql_num_rows(mysql_query("SELECT id FROM $MasterTabel WHERE $MasterFilde = '0'"));
}elseif($Arr['Type'] == 'SendArr'){
$MasterTabelFilter = $Arr['MasterTabelFilter']; 
$MasterTabelFilterVall = $Arr['MasterTabelFilterVall'];         
$already = mysql_num_rows(mysql_query("SELECT id FROM $MasterTabel WHERE $MasterFilde = '0' and $MasterTabelFilter = $MasterTabelFilterVall "));    
}    
if($already > '0'){
$Percent_V = ($already/$TotalCount)*100 ;    
$Percent_V = round($Percent_V, 0);
$Percent = '('. $Percent_V .'%)'; 
$LabelPrint = $AdminLangFile['customer_unknow_vall']." ".$already." ".$Percent;
echo '{ label: "'.$LabelPrint.'", color:"#ff0000",  data: '.$Percent_V.'},' ;     
}    
}
$OtherVall = $TotalCount-($EndCount+$already) ;
if($OtherVall != '0' ){
$Percent_V = ($OtherVall/$TotalCount)*100 ;    
$Percent_V = round($Percent_V, 0);
$Percent = '('. $Percent_V .'%)'; 
$LabelPrint = $AdminLangFile['customer_other_vall']." ".$OtherVall." ".$Percent;
echo '{ label: "'.$LabelPrint.'", color:"#303dd5",  data: '.$Percent_V.'},' ;       
}
?>       
];
var placeholder = $("#<?php echo $ItamID ?>");
    $.plot(placeholder, data, {
        colors: ["#b2d766", "#ff8154", "#878bb8",  "#ffe989", "#4ac9b4"],
        series: {
            pie: {
                    show: true,
                    radius: 1,
                    innerRadius: 0.5,
                label: {
                    show: true,
                    radius: 3/4,
                    formatter: labelFormatter,
                    background: {
                    opacity: 0.8,
                    color: '#000'
                    }
                }
            }
        },
        legend: {
            show: true,
            container: ".<?php echo $ItamID ?>",
        }
    });
});
function labelFormatter(label, series) {
return "<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>" + Math.round(series.percent) + "%</div>";
}
</script>
<?php 
}

#################################################################################################################################
###################################################   
#################################################################################################################################


#################################################################################################################################
###################################################    Chart30_One_Arr
#################################################################################################################################
function Chart30_One_Arr($Arr){
  global $RowUsreInfo ; 
  $ThSisUser = "user_".$RowUsreInfo['user_id'] ;     
   $Arr_NewTickets = array();
   $Count_Ticket =  array(
     'label' => $Arr['Label']." ". $Arr['Total'],
     'color' => $Arr['Color'] ,
     'data' => $Arr['M_Send'],
    );
    array_push($Arr_NewTickets,$Count_Ticket);  
    $jsonFile = 'json/'.$ThSisUser.'_'.$Arr['F_Name'].'.json' ; 
    $fp = fopen($jsonFile, 'w');
    fwrite($fp, json_encode($Arr_NewTickets));
    fclose($fp);  
    
    return array('jsonFile'=> $jsonFile,'Total'=> $Arr['Total'],'Data'=> $Count_Ticket );  
}

function Chart2019_One_Arr($Arr){
  global $CustMembers_Id ; 
  $ThSisUser = "user_".$CustMembers_Id ;     
   $Arr_NewTickets = array();
   $Count_Ticket =  array(
     'label' => $Arr['Label']." ". $Arr['Total'],
     'color' => $Arr['Color'] ,
     'data' => $Arr['M_Send'],
    );
    array_push($Arr_NewTickets,$Count_Ticket);  
    $jsonFile = 'json/'.$ThSisUser.'_'.$Arr['F_Name'].'.json' ; 
    $fp = fopen($jsonFile, 'w');
    fwrite($fp, json_encode($Arr_NewTickets));
    fclose($fp);  
    
    return array('jsonFile'=> $jsonFile,'Total'=> $Arr['Total'],'Data'=> $Count_Ticket );  
}


#################################################################################################################################
###################################################    Chart30_View
#################################################################################################################################
function Chart30_View($JsonFile){
echo '<div class="row">';
echo '<div class="col-lg-12">';
echo '<div data-source="'.$JsonFile.'" class="chart-line flot-chart"></div>';
//echo '<div data-source="json/'.$ThSisUser.'_new_tickets.json" class="chart-line flot-chart"></div>';
echo '</div>';
echo '</div>';
echo '<div style="clear: both!important;"></div>'.BR.BR; 
    
}
#################################################################################################################################
###################################################    Chart30_View_All
#################################################################################################################################
function Chart30_View_All($GetArr,$Name){
  global $RowUsreInfo ; 
  $ThSisUser = "user_".$RowUsreInfo['user_id'] ;  
    
    $jsonFile = 'json/'.$ThSisUser.'_'.$Name.'.json' ; 
    $fp = fopen($jsonFile, 'w');
    fwrite($fp, json_encode($GetArr));
    fclose($fp);       
      
echo '<div class="row">';
echo '<div class="col-lg-12">';
echo '<div data-source="'.$jsonFile.'" class="chart-line flot-chart"></div>';
//echo '<div data-source="json/'.$ThSisUser.'_new_tickets.json" class="chart-line flot-chart"></div>';
echo '</div>';
echo '</div>';
echo '<div style="clear: both!important;"></div>'.BR.BR; 
    
}




#################################################################################################################################
###################################################    
#################################################################################################################################
function Print_CSS_StyleForChart(){
    for ($i = 1; $i <= 100 ; $i++) {
    
        $MosterColor = "#fafafa";
        $NewColor = '#0094cb';
        $NewStyle = '';
    
    
     
        $NewColor = '#f35839';
        $NewStyle = '.danger';
    
        $NewColor = '#ff902b';
        $NewStyle = '.warning';
    
        $NewColor = '#7bbf62';
        $NewStyle = '.success';        
        
        $NewColor = '#0094cb';
        $NewStyle = '.primary';  
    
        $NewColor = '#3babc8';
        $NewStyle = '.info';  
    
        $NewColor = '#494d4d';
        $NewStyle = '.inverse';          
     
        $NewColor = '#ac8dd1';
        $NewStyle = '.purple';  
     
        if($i > 50){
        $YY = 270+(($i-50)*3.6);
        $XX = "270";
        $More50Color = $NewColor ;
        }else{
        $YY = "90"  ;
        $XX = 90+(($i)*3.6); 
        $More50Color = $MosterColor ;      
        }
    
    
    $ZZ = $i ;
    echo $NewStyle.'.Hradial_bar_'.$ZZ.' 
    {background-image: linear-gradient('.$YY.'deg, '.$More50Color.' 50%, transparent 50%, transparent),
                       linear-gradient('.$XX.'deg, '.$NewColor.'  50%, '.$MosterColor.' 50%, '.$MosterColor.');}'.BR;   
    }    
}


#################################################################################################################################
###################################################    
#################################################################################################################################
function Print_Circle_Chart($Val,$MyArr=array()){
    $Size = ArrIsset($MyArr,"Size","lg"); /// lg - sm - xs
    $Style =  ArrIsset($MyArr,"Style","col-md-3"); ///  col-md-3
    $Val = intval($Val);
    
    if($Val == '0'){
    $ChartVall = '100';    
    }else{
    $ChartVall = $Val;    
    }
    
    if(isset($MyArr['ChangeColor']) and $MyArr['ChangeColor'] == "1"){
    $Color = Rterun_Circle_ChangeColor_Name($Val);
    }else{
    $Color =  ArrIsset($MyArr,"Color","primary"); ///  warning danger success primary info inverse purple    
    }
     
$SendChart = "";
$SendChart .= '<div class="'.$Style.'">';
$SendChart .=  '<div data-label="'.$Val.'%" 
class="Hradial_bar '.$Color.' Hradial_bar_'.$ChartVall.' Hradial_bar_'.$Size.' "></div>';
$SendChart .=  '</div>';  
return $SendChart ;
}


#################################################################################################################################
###################################################    Print_Circle_Classyloader
#################################################################################################################################
function Print_Circle_Classyloader($Val,$MyArr=array()){
    $Style =  ArrIsset($MyArr,"Style","col-md-3"); ///  col-md-3
    $FontSize = ArrIsset($MyArr,"FontSize","50"); ///  col-md-3
    
    if(isset($MyArr['ChangeColor'])){
    $Color =  Rterun_Circle_ChangeColor($Val,$MyArr); 
    }else{
    $Color =  ArrIsset($MyArr,"Color","primary"); ///  warning danger success primary info inverse purple
    $Color =  Rterun_Circle_Color($Color);        
    }
    
    $SendChart = "";
    $SendChart .= '<div class="'.$Style.'">';
    $SendChart .= '<canvas 
    data-toggle="classyloader" 
    data-percentage="'.$Val.'" 
    data-speed="0" 
    data-font-size="'.$FontSize.'px" 
    data-diameter="90" 
    data-line-color="'.$Color.'" 
    data-remaining-line-color="rgba(200,200,200,0.9)" 
    data-line-width="15" >
    </canvas>';
    $SendChart .=  '</div>';  
    
  return $SendChart ;
}

#################################################################################################################################
###################################################    
#################################################################################################################################

function Rterun_Circle_Color($state) {
    ///  warning danger success primary info inverse purple
    switch($state) {
        case "warning":
            $order = '#ff902b';
            break;
        case "danger":
            $order = '#f35839';
            break;
        case "success":
            $order = '#7bbf62';
            break;
        case "primary":
            $order = '#0094cb';
            break;
        case "info":
            $order = '#3babc8';
            break;            
        case "inverse":
            $order = '#494d4d';
            break;   
        case "purple":
            $order = '#ac8dd1';
            break;   
        default:
            $order = '#0094cb';
    }
    return $order;
}
#################################################################################################################################
###################################################    
#################################################################################################################################

function Rterun_Circle_ChangeColor_Name($Val,$MyArr=array()){
    if(!isset($MyArr["ColorGroup"])){
     if($Val <= 40){
        $Color = "danger";       
     }elseif($Val <= 65){
        $Color = "warning"; 
     }elseif($Val <= 85){
        $Color = "primary"; 
     }elseif($Val <= 100){
        $Color = "success"; 
     }     
    
    }else{
    }
    
   return $Color;
}

function Rterun_Circle_ChangeColor($Val,$MyArr=array()){
    if(!isset($MyArr["ColorGroup"])){
     if($Val <= 40){
        $Color = "#f35839";       
     }elseif($Val <= 65){
        $Color = "#ff902b"; 
     }elseif($Val <= 85){
        $Color = "#0094cb"; 
     }elseif($Val <= 100){
        $Color = "#7bbf62"; 
     }     
        
    }else{
    }
    
   return $Color;
}

#################################################################################################################################
###################################################    
#################################################################################################################################




#################################################################################################################################
###################################################   CharPrintArr
#################################################################################################################################
function CharPrintArr_2019($ItamID,$Titel,$Arr){
            global $db ;
            global $AdminLangFile ;
            $Col = ArrIsset($Arr,'Col',"col-md-3");
            $DefClear = ArrIsset($Arr,'DefClear',"4");
            $Collapse = ArrIsset($Arr,'Collapse',"1");
            $LIMIT = ArrIsset($Arr,'Limit_View',"5");
            $StopViewOneRecord =  ArrIsset($Arr,'StopViewOneRecord',"1"); 
            if($StopViewOneRecord == '1'){
            $CountOff_Table_Arr_Come = intval(count($Arr['Tabel']));    
            }else{
            $CountOff_Table_Arr_Come = "2";                
            }
            
            
 

if($CountOff_Table_Arr_Come > '1' ){
    
           
echo '<div class="'.$Col.' col-sm-12 col-xs-12 ChartRight">';
if($Collapse == '1'){
echo '<div class="panel panel-default"><div class="panel-heading">';
echo '<a href="#" data-perform="panel-collapse" data-toggle="tooltip" title="Collapse Panel" class="pull-right"><em class="fa fa-minus"></em></a>';
echo '<div class="panel-title">'.$Titel.'</div>';
echo '</div>';
echo '<div class="panel-collapse">';
echo '<div class="panel-body">';    
}else{
echo '<div class="ChartTitle">'.$Titel.'</div>';    
}
////////////
echo '<div class="My_Chart_Container ">';
echo '<div id="'.$ItamID.'" class="placeholder"></div>';
echo '</div>';
echo '<div class="My_Chart_Legend '. $ItamID .'" ></div>';
///////////
if($Collapse == '1'){ 
echo '</div>';
echo '</div>';
echo '</div> ';
}
echo '</div>';
?>  
<script type="text/javascript">
$(function() {
        var data = [
<?php
//$Arr = array("Tabel"=>"f_cust_type","Filde"=>"count","LIMIT"=>"5",  );
$Tabel = $Arr['Tabel'];
$Name =  $Tabel ;
if(isset($Arr['Filde'])){ $Filde = $Arr['Filde'];}
if(isset($Arr['MasterTabel'])){ $MasterTabel = $Arr['MasterTabel'];}
if(isset($Arr['MasterFilde'])){ $MasterFilde = $Arr['MasterFilde'];}

//$LIMIT = $Arr['LIMIT'];


$TotalCount = $Arr['TotalCount'];
if(count($Name) < $LIMIT){
 $LIMIT = count($Name)  ;   
} 
$EndCount = "0" ;
for($i = 0; $i < $LIMIT ; $i++) {
$Percent_V = ($Name[$i]['count']/$TotalCount)*100 ;  
$EndCount = $EndCount+$Name[$i]['count'];  
$Percent_V = round($Percent_V, 0);
$Percent = '('. $Percent_V .'%)'; 
$LabelPrint = $Name[$i]['name']." ".$Name[$i]['count']." ".$Percent;
if($Name[$i]['id'] == '0'){
echo '{ label: "'.$LabelPrint.'", color:"#ff0000", data: '.$Percent_V.'},' ;     
}else{
echo '{ label: "'.$LabelPrint.'",   data: '.$Percent_V.'},' ;     
}
} 
$OtherVall = $TotalCount-($EndCount) ;
if($OtherVall != '0' ){
$Percent_V = ($OtherVall/$TotalCount)*100 ;    
$Percent_V = round($Percent_V, 0);
$Percent = '('. $Percent_V .'%)'; 
$LabelPrint = $AdminLangFile['report_other_vall']." ".$OtherVall." ".$Percent;
echo '{ label: "'.$LabelPrint.'", color:"#303dd5",  data: '.$Percent_V.'},' ;       
}
?>       
];
var placeholder = $("#<?php echo $ItamID ?>");
    $.plot(placeholder, data, {
        colors: ["#b2d766", "#ff8154", "#878bb8",  "#ffe989", "#4ac9b4"],
        series: {
            pie: {
                    show: true,
                    radius: 1,
                    innerRadius: 0.5,
                label: {
                    show: true,
                    radius: 3/4,
                    formatter: labelFormatter,
                    background: {
                    opacity: 0.8,
                    color: '#000'
                    }
                }
            }
        },
        legend: {
            show: true,
            container: ".<?php echo $ItamID ?>",
        }
    });
});
function labelFormatter(label, series) {
return "<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>" + Math.round(series.percent) + "%</div>";
}
</script>
<?php

$RowCount = ClearCol($Arr['RowCount'],$DefClear); 
}else{
$RowCount = $Arr['RowCount'];     
}
  
return $RowCount ;
} 





#################################################################################################################################
###################################################    
#################################################################################################################################

#################################################################################################################################
###################################################    
#################################################################################################################################

#################################################################################################################################
###################################################    
#################################################################################################################################

#################################################################################################################################
###################################################    
#################################################################################################################################

#################################################################################################################################
###################################################    
#################################################################################################################################

#################################################################################################################################
###################################################    
#################################################################################################################################

#################################################################################################################################
###################################################    
#################################################################################################################################

#################################################################################################################################
###################################################    
#################################################################################################################################







	
?>