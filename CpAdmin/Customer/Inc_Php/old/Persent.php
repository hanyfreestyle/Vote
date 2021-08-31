<?php


#################################################################################################################################
###################################################    
#################################################################################################################################
function Get_Persent_Arr($ConfigP){
    global $ALang ; 
    $Persent_Arr = array();
 
    if($ConfigP['ch_name'] == '1'){
    $ChName = array('FildeName'=>'name','FildeType'=>"lens",'CompareType'=>'>','FildeValue'=>$ConfigP['cust_namecount'],'Err'=>$ALang['persent_name']);
    array_push($Persent_Arr,$ChName);    
    }    
        
    if($ConfigP['ch_religion'] == '1'){
    $ChReligion = array('FildeName'=>'religion','FildeType'=>"int",'CompareType'=>'!=','FildeValue'=>'0','Err'=>$ALang['persent_religion']);
    array_push($Persent_Arr,$ChReligion);    
    }  
        
    if($ConfigP['ch_mobile'] == '1'){
    $Chmobile = array('FildeName'=>'mobile','FildeType'=>"lens",'CompareType'=>'>=','FildeValue'=>'11','Err'=>$ALang['persent_mobile']);
    array_push($Persent_Arr,$Chmobile);    
    }   
    
    if($ConfigP['ch_address'] == '1'){
    $Chaddress = array('FildeName'=>'address','FildeType'=>"lens",'CompareType'=>'>=','FildeValue'=>$ConfigP['address_count'],'Err'=>$ALang['persent_address']);
    array_push($Persent_Arr,$Chaddress);    
    }   
    
  
    if($ConfigP['ch_product_cat'] == '1'){
    $Ch_product_cat = array('FildeName'=>'product_cat','FildeType'=>"lens",'CompareType'=>'>=','FildeValue'=>'2','Err'=>$ALang['persent_product_cat']);
    array_push($Persent_Arr,$Ch_product_cat);    
    }   
    
    
          
 return $Persent_Arr ;   
}


 
#################################################################################################################################
###################################################
#################################################################################################################################
function Edit_Persent($TableName,$Persent_Arr,$IDD="0",$Arr=array()){
    global $db;
    $Count_Persent_Arr = count($Persent_Arr);

    if($IDD != '0'){
        $ThisIdd = intval($IDD);
        $NewLine = " where id = '$ThisIdd' ";
    }

    $SellDate = $db->SelArr("SELECT * FROM $TableName $NewLine ");

    for($i = 0; $i < count($SellDate); $i++) {
        $NewPersent = '0';
        $Persent = '0';
        $ThisUpdateIdd = $SellDate[$i]['id'];

        for ($xx = 0; $xx < count($Persent_Arr); $xx++) {
            
            
            $ThisFildeIwillCheck = $SellDate[$i][$Persent_Arr[$xx]['FildeName']];

            $NewPersent = FildeIwillCheck($ThisFildeIwillCheck,$Persent_Arr[$xx]);

            $Persent = $Persent + $NewPersent ;
        }

        
        $Update_Persent = ( $Persent / $Count_Persent_Arr) * 100 ;
 
        
        
        $server_data = array ('persent'=> intval($Update_Persent));

        $db->AutoExecute($TableName,$server_data,AUTO_UPDATE,"id = $ThisUpdateIdd");

    }
}

#################################################################################################################################
###################################################    CompareType
#################################################################################################################################
function CompareType($AA,$BB,$Type){
    $SendVall = '0';
    if($Type == '='){
        if($AA == $BB ){
            $SendVall = '1';
        }
    }elseif($Type == '>'){
        if($AA > $BB ){
            $SendVall = '1';
        }
    }elseif($Type == '>='){
        if($AA >= $BB ){
            $SendVall = '1';
        }
    }elseif($Type == '<'){
        if($AA < $BB ){
            $SendVall = '1';
        }
    }elseif($Type == '<='){
        if($AA <= $BB ){
            $SendVall = '1';
        }
    }elseif($Type == '!='){
        if($AA != $BB ){
            $SendVall = '1';
        }
    }

    return $SendVall ;
}

#################################################################################################################################
###################################################    FildeIwillCheck
#################################################################################################################################
function FildeIwillCheck($Val,$CheckArr){
    $SendCheck = "0";

    if($CheckArr['FildeType'] == 'lens'){
        $Val_Length = trim($Val);
        $Val_Length = mb_strlen($Val_Length,'UTF-8');
        $SendCheck = CompareType($Val_Length,$CheckArr['FildeValue'],$CheckArr['CompareType']);
    }elseif($CheckArr['FildeType'] == 'int'){


        $SendCheck = CompareType($Val,$CheckArr['FildeValue'],$CheckArr['CompareType']);
    }

    return $SendCheck ;
}
#################################################################################################################################
###################################################    PersentEditPageChart
#################################################################################################################################
function PersentEditPageChart($row){
    global $ConfigP ;
    $Persent_Arr = Get_Persent_Arr($ConfigP) ; 
    
    
    
    if($row['persent'] != '100'){
    $SendErrMass = "";
    for ($xx = 0; $xx < count($Persent_Arr); $xx++) {
        $ThisFildeIwillCheck = $row[$Persent_Arr[$xx]['FildeName']];
        $NewPersent = FildeIwillCheck($ThisFildeIwillCheck,$Persent_Arr[$xx]);
        if($NewPersent == '0'){
            $SendErrMass .= $Persent_Arr[$xx]['Err']." ".BR;
        }

    }
    
    echo '<div style="clear: both!important;"></div>';
    echo '<div class="col-md-9 MyMassView">';
    New_Print_Alert("5",$SendErrMass);
    echo '</div>';

    if(intval($row['persent']) != '0'){
        $ChartArr = array('ChangeColor'=>'1');
        echo '<div class="MyChartView">';
        echo Print_Circle_Classyloader($row['persent'],$ChartArr);
        echo '</div>';
    }
    
    
    echo '<div style="clear: both!important;"></div>'.BR;
    }
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


































 



    
    

    
    
    
    
    
    
    
    
	
?>