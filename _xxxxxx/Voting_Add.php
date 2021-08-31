<?php
$Customer_ID = intval($WebMeta['id']);	




$SQL_Line = "SELECT * FROM customer WHERE id = '$Customer_ID' " ;
$CustomerRow = $db->H_SelectOneRow($SQL_Line);
 
$MobileErr = "";

if(isset($_POST['SaveData'])){
    $PhoneNumber = Clean_Mypost($_POST['cust_mobile']) ;
    $PhoneValidate =  $PhoneNumber[0].$PhoneNumber[1];
    if($PhoneValidate == '05'){
        $CountSendData =  CountSendData() ;
        if($CountSendData >= '2'){
            Save_Voting();
        }else{
            $MobileErr = $ALang['new_minimum_survey'];
        }
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
echo $ALang['new_voting_mass'];
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
 


/*
#################################################################################################################################
###################################################     Customer Name
#################################################################################################################################
echo '<div class="form-group col-md-12" ><span class="NameMass">'.$ALang['hform_add_fname_mass'].'</span></div>';
$MoreS = array('Col' => "col-md-12",'Placeholder'=> $ALang['hform_add_fname'],'required' => '');
$Err[] = NF_PrintInput("Text","","cust_name","0","1","optin",$MoreS);
*/


#################################################################################################################################
#################################################################################################################################
#################################################################################################################################
#################################################################################################################################
###################################################    
#################################################################################################################################
$VotingList_SQl = "select * from survey where cust_id = '$Customer_ID' and state = '1' order by postion  ";
$already = $db->H_Total_Count($VotingList_SQl);
if($already > '0'){
    $Name = $db->SelArr($VotingList_SQl);
    //hidden
    
    for($i = 0; $i < count($Name); $i++) {
       $SurveyId = $Name[$i]['id'];
       $Lsit_SQL_Line = "SELECT id,name FROM survey_list where cat_id  = '$SurveyId' and state = '1' order by postion " ;
       $Arr = array("Label" => 'off' ,'SQL_Line_Send'=> $Lsit_SQL_Line );      
       $Err[] = NF_PrintSelect_2018("Chosen",$Name[$i]['name'],"col-md-12","votelistid_".$SurveyId,"","",0,$Arr); 
       echo '<input type="hidden" value="'.$SurveyId.'" name="id_id[]" />';
        
    } 
}


echo '<div class="form-group col-md-12">';
echo '<button class="btnx btn-default_x" name="SaveData" type="submit">'.$ALang['hform_add_fsend'].'</button>';
echo '</div>';


echo '</div></div></form> ';







#################################################################################################################################
###################################################  Save_Voting
#################################################################################################################################
function Save_Voting(){
    global $db ;
    $ThIsIsTest = '0';
    $cust_id = Clean_Mypost($_POST['cust_id']);
    $cust_mobile = Clean_Mypost($_POST['cust_mobile']);
    $Cust_url= Clean_Mypost($_POST['cust_url']);
    $TAddDate = FULLDate_ForToday();
    $date_add = $TAddDate['Stamp'] ;
    $SendCount = $db->H_Total_Count("SELECT id FROM survey_vote where cust_mobile = '$cust_mobile' and date_add = '$date_add' ");
    if($ThIsIsTest == '1'){
        #print_r3($_POST);
    }

    if($SendCount == '0'){

        for ($i = 0; $i < count($_POST['id_id']); $i++) {
            $VoteId = $_POST['id_id'][$i];
            $VoteVall = "votelistid_".$VoteId ;
            $VoteVall_Save = PostIsset_Intval($VoteVall);

            if($VoteVall_Save != '0'){
                $Server_Data = array ('id'=> NULL ,
                    'date_add'=> $TAddDate['Stamp'] ,
                    'cust_id'=> $cust_id,
                    'cust_mobile'=>Clean_Mypost($_POST['cust_mobile']),
                    'cat_id'=> $VoteId,
                    'vote'=> $VoteVall_Save,
                );
            }
            if($VoteVall_Save != '0'){
                if($ThIsIsTest == '1'){
                    print_r3($Server_Data);
                }else{
                    $db->AutoExecute("survey_vote",$Server_Data,AUTO_INSERT);
                }
            }
        }
        Redirect_Page_2(WEB_ROOT."VotingDone/".$Cust_url);
    }else{
        Redirect_Page_2(WEB_ROOT."VotingDone/".$Cust_url);
    }
}



function CountSendData(){
   
   $SendData = '0';
    for ($i = 0; $i < count($_POST['id_id']); $i++) {
        $VoteId = $_POST['id_id'][$i];
        $VoteVall = "votelistid_".$VoteId ;
        $VoteVall_Save = PostIsset_Intval($VoteVall);
        if($VoteVall_Save != '0'){
         $SendData = $SendData+1 ;    
        }    
    }
    
    return $SendData ;
}

?>
