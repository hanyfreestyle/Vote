<?php
if(!defined('WEB_ROOT')) {	exit;}
###########################################################>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
OPen_Page($PageTitle);

$Cust_Info = $db->H_CheckTheGet("CatId","id","customer","2");
$cust_id = $Cust_Info['id'] ;


Print_Top_Survey_Menu($cust_id);

echo '<div style="clear: both!important;"></div>';
PrintFildInformation("col-md-6",$ALang['cust_name'],$Cust_Info['name']);
PrintFildInformation("col-md-6",$ALang['cust_name_2'],$Cust_Info['name_2']);
echo '<div style="clear: both!important;"></div>';


$PageType = "Add";



 
if($PageType == 'Add'){
    $row = array();
    $EditFilde = "";
}elseif($PageType == 'Edit'){
    $EditFilde = "Edit";
}

$Def_Form_Arr =array( "PageType" => $PageType, 'EditRow' => $row);


Form_Open();
//
echo '<input type="hidden" value="'.$Cust_Info['id'].'" name="cust_id" />';
echo '<div style="clear: both!important;"></div>';

$MoreS = array('Col' => "col-md-12",'Placeholder'=> "",'required' => 'required','Dir'=> "Ar_Lang");
$Err[] = NF_PrintInput("Text".$EditFilde,"الاستبيان","name","","","req",$MoreS);

for ($i = 1; $i <= 7; $i++) {

    if($i >= '3'){
        $req1 = '';
        $req2 = '';
    }else{
        $req1 = 'required';
        $req2 = 'req';
    }

    $MoreS = array('Col' => "col-md-6",'Placeholder'=> "",'required' => $req1 ,'Dir'=> "Ar_Lang");
    $Err[] = NF_PrintInput("Text".$EditFilde,"الاجابة رقم ".$i,"optin".$i,"","",$req2,$MoreS);

}

echo '<div style="clear: both!important;"></div>';





 


echo '<div style="clear: both!important;"></div>'.BR;
 

Form_Close_New("1","SurveyList&id=".$cust_id);



if(isset($_POST['B1'])){
 Vall($Err,"Add_Survey",$db,"1",$USER_PERMATION_Add);
}



#################################################################################################################################
###################################################   Add_Survey 
#################################################################################################################################
function Add_Survey($db){
    $ThIsIsTest = '0';
    $server_data = array ('id'=> NULL ,
        'cust_id'=> PostIsset("cust_id") ,
        'name'=> PostIsset('name'),
        'state'=> "1"  ,
    );
    if($ThIsIsTest == '1'){
        print_r3($server_data);
    }else{
        $db->AutoExecute("survey",$server_data,AUTO_INSERT);
        $LastId = $db->GetId();
        for ($i = 1; $i <= 7; $i++) {
            if(trim(PostIsset("optin".$i)) != ''){
                $server_data = array ('id'=> NULL ,
                    'cat_id'=> $LastId ,
                    'cust_id'=> PostIsset("cust_id") ,
                    'name'=> PostIsset("optin".$i),
                    'state'=> "1"  ,
                );
                $db->AutoExecute("survey_list",$server_data,AUTO_INSERT);
            }
        }
        Redirect_Page_2("index.php?view=SurveyList&CatId=".PostIsset("cust_id"));
    }
}






  



###########################################################<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
Close_Page(); 
?>