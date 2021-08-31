<h3 class="H3_FontAr"><?php echo $PageTitle ?></h3>
<div class="row PanelMin"><div class="col-md-12">
<?php
if(!defined('WEB_ROOT')) {	exit;}
 
$row = $db->H_SelectOneRow("select * from config_sms "); 
extract($row);
 
 

Form_Open();
echo '<input type="hidden" name="charest"  value="UTF-8"/>';

$MoreS = array('Col' => "col-md-4",'Placeholder'=> "",'required' => 'required', 'Dir'=> "En_Lang" );
$Err[] = NF_PrintInput("TextEdit",$AdminLangFile['webconfig_sms_user'],"user_name","","","req",$MoreS);


$MoreS = array('Col' => "col-md-4",'Placeholder'=> "",'required' => 'required', 'Dir'=> "En_Lang" );
$Err[] = NF_PrintInput("TextEdit",$AdminLangFile['webconfig_sms_password'],"password","","","req",$MoreS);


$MoreS = array('Col' => "col-md-4",'Placeholder'=> "",'required' => 'required', 'Dir'=> "En_Lang" );
$Err[] = NF_PrintInput("TextEdit",$AdminLangFile['webconfig_sms_sender'],"sender","","","req",$MoreS);


echo '<div style="clear: both!important;"></div>';

 
$MoreS = array('Col' => "col-md-4",'Placeholder'=> "",'required' => 'required', 'Dir'=> "En_Lang" );
$Err[] = NF_PrintInput("TextEdit",$AdminLangFile['webconfig_vcode_count'],"vcode_count","","","req",$MoreS);


NF_PrintRadio_Active ("2_Line","col-md-4",$ALang['webconfig_send_confirm'],"send_confirm",$send_confirm);
NF_PrintRadio_Active ("2_Line","col-md-4",$ALang['webconfig_send_customer'],"send_customer",$send_customer);

echo '<div style="clear: both!important;"></div>';


$MoreS = array('Col' => "col-md-6",'Placeholder'=> "",'required' => 'required','Dir'=> "Ar_Lang"  );
$Err[] = NF_PrintInput("TextAreaEdit",$ALang['webconfig_confirm_mass'],"confim_mass","1","0","req",$MoreS);

$MoreS = array('Col' => "col-md-6",'Placeholder'=> "",'required' => 'required','Dir'=> "Ar_Lang"  );
$Err[] = NF_PrintInput("TextAreaEdit",$ALang['webconfig_customer_mass'],"customer_mass","1","0","req",$MoreS);


Form_Close('2');

if(isset($_POST['B1'])){
Vall($Err,"EditSMSConfig",$db,"1",$GroupPermation);
}



#################################################################################################################################
###################################################    
#################################################################################################################################
function EditSMSConfig($db){
    global $ALang ;
    $ThIsIsTest = '0';
 
    $server_data = array (
        'user_name'=> PostIsset('user_name')  ,
        'password'=> PostIsset('password')  ,
        'sender'=> PostIsset('sender')  ,
        'send_confirm'=> PostIsset('send_confirm')  ,
        'send_customer'=> PostIsset('send_customer')  ,  
        'confim_mass'=> PostIsset('confim_mass')  ,
        'customer_mass'=> PostIsset('customer_mass')  ,  
        'vcode_count'=> PostIsset('vcode_count')  ,
        
    );
   

    if($ThIsIsTest == '1'){
        print_r3($server_data);
    }else{
      
            $add_server = $db->AutoExecute("config_sms",$server_data,AUTO_UPDATE,"");
            Redirect_Page_2(LASTREFFPAGE);
      
    }
}



?>
</div></div>