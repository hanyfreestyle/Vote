<?php
#################################################################################################################################
###################################################    Start Form
#################################################################################################################################
$ErrMass = "";

if(isset($_POST['ValidationCode'])){
   $Send_VCode  = '9'.$ComplaintRow['v_code'] ; 
   $VCode  = intval('9'.Clean_Mypost($_POST['v_code'])) ; 

   if($Send_VCode == $VCode ){
   Confim_Complaint_Add($ComplaintRow,$CustomerRow); 
   }else{
   //$_POST['v_code'] = "";
   $ErrMass =  '<div class="col-md-12 Font01"><div class="alert err_code">'.$ALang['validation_mass_vcode_err'].'</div></div>';  
   } 
}
 
$v_code = GetVcodeCount() ;





echo '<div style="clear: both!important;"></div>';
echo  $ErrMass ;
echo '<form method="post" action="#"  id="validate-form" data-parsley-validate >';

//hidden
echo '<input type="hidden" value="'.$Customer_ID.'" name="cust_id" id="Cust_id" />';
echo '<input type="hidden" value="'.$Complaint_ID.'" name="complaint_id" id="complaint_id" />';
echo '<input type="hidden" value="'.$ComplaintRow['v_code'].'" name="send_v_code" id="send_v_code" />';

echo '<div style="clear: both!important;"></div>';

#################################################################################################################################
###################################################    Customer Mobile
#################################################################################################################################
$MoreS = array('Col' => "col-md-12",'Placeholder'=> $ALang['validation_v_code'],
'required' => 'required data-parsley-type="number" data-parsley-minlength="'.$v_code['Count'].'" data-parsley-maxlength="'.$v_code['Count'].'" ' );
$Err[] = NF_PrintInput("Numbers","","v_code","0","1","req",$MoreS);
 




echo '<div class="form-group col-md-12">';
echo '<button class="btnx btn-default_x" name="ValidationCode" type="submit">'.$ALang['validation_v_but'].'</button>';
echo '</div>';


echo '</div></div></form> ';
	
?>