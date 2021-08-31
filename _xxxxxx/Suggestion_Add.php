<?php
#AddFildeToTabel("complaint_suggestion","des","cust_mobile","text","","0");
$Customer_ID = intval($WebMeta['id']);	

$SQL_Line = "SELECT * FROM customer WHERE id = '$Customer_ID' " ;
$CustomerRow = $db->H_SelectOneRow($SQL_Line);
 
$MobileErr = "";

if(isset($_POST['SaveData'])){
    $PhoneNumber = Clean_Mypost($_POST['cust_mobile']) ;
    $PhoneValidate =  $PhoneNumber[0].$PhoneNumber[1];

    if($PhoneValidate == '05'){
        Save_Suggestion();
    }else{
        $MobileErr = $ALang['hform_add_mobileerr'];
    }
}



#################################################################################################################################
###################################################    Customer Info
#################################################################################################################################
echo '<div class="container"><div class="row ">';
echo '<div class="col-md-12 Customer_Name Font01">'.$CustomerRow['name'].'</div>';


####################################################################### View Logo 
if($CustomerRow['photo']){
$Path = WEBSITE_IMAGE_DIR_V.$CustomerRow['photo'] ;
echo '<div class="col-md-12 Customer_Logo">';
echo '<img src="'.$Path.'" />';
echo ' </div>';    
}

####################################################################### View Mass
echo '<div style="clear: both!important;"></div>';
echo '<div class="col-md-12 Customer_Mass Font01 ">';
echo $ALang['new_suggestion_mass'];
echo '</div>';


echo '</div></div>';



#################################################################################################################################
###################################################    Start Form
#################################################################################################################################
echo '<div style="clear: both!important;"></div>';
 
echo '<form method="post" action="#"  id="validate-form" data-parsley-validate >';

//hidden
echo '<input type="hidden" value="'.$Customer_ID.'" name="cust_id" id="Cust_id" />';
echo '<input type="hidden" value="'.$CustomerRow['name_m'].'" name="cust_url" id="cust_url" />';
 
 

#################################################################################################################################
###################################################    Customer Mobile
#################################################################################################################################
$MoreS = array('Col' => "col-md-12",'Placeholder'=> $ALang['hform_add_fmobile'],'required' => 'required data-parsley-type="number" '.MOBILE_REQUIRED_TYPE );
$Err[] = NF_PrintInput("Numbers","","cust_mobile","0","1","req",$MoreS);
echo '<div class="form-group col-md-12" ><span class="MobileErr">'.$MobileErr.'</span></div>';
 



#################################################################################################################################
###################################################     Customer Name
#################################################################################################################################
echo '<div class="form-group col-md-12" ><span class="NameMass">'.$ALang['hform_add_fname_mass'].'</span></div>';
$MoreS = array('Col' => "col-md-12",'Placeholder'=> $ALang['hform_add_fname'],'required' => '');
$Err[] = NF_PrintInput("Text","","cust_name","0","1","optin",$MoreS);




#################################################################################################################################
###################################################     Customer Name
#################################################################################################################################
echo '<div class="form-group col-md-12" ></div>';
$MoreS = array('Col' => "col-md-12",'Placeholder'=> $ALang['new_suggestion_textarea'],'required' => 'required');
$Err[] = NF_PrintInput("TextArea","","des","0","1","req",$MoreS);



 
echo '<div class="form-group col-md-12">';
echo '<button class="btnx btn-default_x" name="SaveData" type="submit">'.$ALang['hform_add_fsend'].'</button>';
echo '</div>';


echo '</div></div></form> ';





 

#################################################################################################################################
###################################################  SendFormData  
#################################################################################################################################
function Save_Suggestion(){
    global $db ;
    $ThIsIsTest = '1';
    $cust_id = Clean_Mypost($_POST['cust_id']);
    $cust_mobile = Clean_Mypost($_POST['cust_mobile']);
    $Cust_url= Clean_Mypost($_POST['cust_url']);

    $TAddDate = FULLDate_ForToday();
    $date_add = $TAddDate['Stamp'] ;
    $SendCount = $db->H_Total_Count("SELECT id FROM complaint_suggestion where cust_mobile = '$cust_mobile' and date_add = '$date_add' "); 

    if($SendCount == '0'){
    
    $Server_Data = array ('id'=> NULL ,
        ##
        'date_add'=> $TAddDate['Stamp'] ,
        'date_month'=> $TAddDate['Month']."-".$TAddDate['Year'],
        'date_year'=> $TAddDate['Year'],
        'date_time'=>  time() ,
        ##
        'cust_id'=> Clean_Mypost($_POST['cust_id']),
        ##
        'cust_mobile'=>Clean_Mypost($_POST['cust_mobile']),
        'cust_name'=>Clean_Mypost($_POST['cust_name']),
        'des'=> NiceTrim2013_Meta(Clean_Mypost($_POST['des']),"3000"),
        ##
        'state'=> "1",
        'view'=> "0",
    );
    

     
    $db->AutoExecute("complaint_suggestion",$Server_Data,AUTO_INSERT);
    Redirect_Page_2(WEB_ROOT."SuggestionDone/".$Cust_url);
    }else{
     Redirect_Page_2(WEB_ROOT."SuggestionDone/".$Cust_url);   
    }
}


?>
