<?php

###########################################################>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
OPen_Page($PageTitle);






if(!defined('WEB_ROOT')) {	exit;}
 
$row = $db->H_SelectOneRow("select * from config_sms "); 
extract($row);
 
 

Form_Open();

NF_PrintRadio_Active ("2_Line","col-md-4",$ALang['webconfig_send_confirm'],"email_send_state",$email_send_state);

$Arr = array("Label" => 'on');      
$Err[] = NF_PrintSelect_2018("Chosen",$AdminLangFile['webconfig_email_account'],"col-md-3","email_account","config_email","req",$email_account,$Arr);	

echo '<div style="clear: both!important;"></div>';

$MoreS = array('Col' => "col-md-6",'Placeholder'=> "",'required' => 'required', 'Dir'=> "Ar_Lang" );
$Err[] = NF_PrintInput("TextEdit",$AdminLangFile['webconfig_email_subject'],"email_subject","","","req",$MoreS);


$MoreS = array('Col' => "col-md-12",'Placeholder'=> "",'required' => 'required','Dir'=> "Ar_Lang"  );
$Err[] = NF_PrintInput("TextAreaEdit",$ALang['webconfig_customer_mass'],"email_message","1","0","req",$MoreS);


Form_Close('2');

if(isset($_POST['B1'])){
Vall($Err,"EditSMSEmailConfig",$db,"1",$GroupPermation);
}



#################################################################################################################################
###################################################    
#################################################################################################################################
function EditSMSEmailConfig($db){
    global $ALang ;
    $ThIsIsTest = '0';
 
    $server_data = array (
        'email_send_state'=> PostIsset('email_send_state')  ,
        'email_account'=> PostIsset('email_account')  ,
        'email_subject'=> PostIsset('email_subject')  ,
        'email_message'=> PostIsset('email_message')  ,
    );
   
    if($ThIsIsTest == '1'){
        print_r3($server_data);
    }else{
            $add_server = $db->AutoExecute("config_sms",$server_data,AUTO_UPDATE,"");
            Redirect_Page_2(LASTREFFPAGE);
    }
}


###########################################################<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
Close_Page();

?>
 