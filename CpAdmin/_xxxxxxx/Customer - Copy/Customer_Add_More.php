
<div id="Mody" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
<h4 id="myModalLabel" class="modal-title"><?php echo $ALang['cust_add_more_contact']?></h4>
</div>

<div class="modal-body">
<div class="row Parent_Info">
<?php


Form_Open();
//hidden 
echo '<input type="hidden" name="cust_id" value="'.$row['id'].'" />';

$MoreS = array('Col' => "col-md-6",'Placeholder'=> "",'required' => 'required','Dir'=> "Ar_Lang");
$Err[] = NF_PrintInput("Text",$ALang['cust_name'],"sub_name","1","1","req",$MoreS);

$MoreS = array('Col' => "col-md-6",'Placeholder'=> "",'required' => 'required','Dir'=> "Ar_Lang");
$Err[] = NF_PrintInput("Text",$ALang['cust_sub_re'],"sub_rel","1","1","req",$MoreS);

echo '<div style="clear: both!important;"></div>';
$MoreS = array('Col' => "col-md-6",'Placeholder'=> "",'required' => 'required data-parsley-type="digits" data-parsley-minlength="11"', 'Dir'=> "En_Lang" );
$Err[] = NF_PrintInput("Text",$ALang['cust_mobile']."1","sub_mobile","1","0","req-num",$MoreS);

$MoreS = array('Col' => "col-md-6",'Placeholder'=> "",'required' => 'data-parsley-type="digits" data-parsley-minlength="11"', 'Dir'=> "En_Lang" );
$Err[] = NF_PrintInput("Text",$ALang['cust_mobile']."2","sub_mobile_2","400","0","optin-num",$MoreS);

echo '<div style="clear: both!important;"></div>';


$MoreS = array('Col' => "col-md-6",'Placeholder'=> "",'required' => 'data-parsley-type="email"', 'Dir'=> "En_Lang" );
$Err[] = NF_PrintInput("Text",$ALang['cust_email'],"sub_email","400","0","optin-email",$MoreS);

Form_Close_3('1',"Customer_AddMore");

?>
</div>
</div>
<div class="modal-footer">
<button type="button" data-dismiss="modal" class="btn btn-default"><?php echo $AdminLangFile['mainform_but_close']?></button>
</div>
</div>
</div>
</div> 
   
   

   
   
   
