<?php
if(!defined('WEB_ROOT')) {	exit;}

#################################################################################################################################
###################################################   CustomerAddMore
#################################################################################################################################
function CustomerAddMore($db){
    global $DirURL ;
    $ThisIsTest = '0';
    $Cust_Id  = $_POST['cust_id'] ;
    $server_data = array (
        'id'=> NULL ,
        'cust_id'=> PostIsset_Intval('cust_id') ,
        'rel'=>  PostIsset("sub_rel"),
        'name'=> PostIsset("sub_name"),
        'mobile'=> PostIsset("sub_mobile"),
        'mobile_2'=> PostIsset("sub_mobile_2"),
        'email'=> PostIsset("sub_email"),
    );
    if($ThisIsTest){
        print_r3($server_data);
    }else{
        $db->AutoExecute("customer_sub",$server_data,AUTO_INSERT);
        $already = $db->H_Total_Count("SELECT id FROM customer_sub WHERE cust_id = '$Cust_Id'");
        UpdateFildeForDell("customer","sub_count",$already,$Cust_Id) ;
        Redirect_Page_2('index.php?view='.$DirURL.'&id='.$_POST['cust_id']);
    }
}
#################################################################################################################################
###################################################   DellMoreCustInfo
#################################################################################################################################
function  DellMoreCustInfo($CustId,$View,$ViewId){
    global $db ;
    $EmailCount = count($_POST['id_id']);
    for ($i = 0; $i < $EmailCount; $i++){
        $id =  $_POST['id_id'][$i]  ;
        $db->H_DELETE_FromId("customer_sub",$id);
    }
    $already = $db->H_Total_Count("SELECT id FROM customer_sub WHERE cust_id = '$CustId'");
    UpdateFildeForDell("customer","sub_count",$already,$CustId) ;
    Redirect_Page_2('index.php?view='.$View.'&id='.$ViewId);
}


#################################################################################################################################
###################################################    Cust_Print_TabsUl
#################################################################################################################################
function Cust_Print_TabsUl($PageType){
    global $ALang ;
    global $ConfigP ;
    if($ConfigP['tape_view'] == '1'){
        echo '<ul class="nav nav-tabs">';
        echo '<li class="active"><a href="#Contact" data-toggle="tab">
               <i class="fa fa-phone-square"></i><span class="tapmname">'.$ALang['cust_alert_info'].'</span></a></li>';
        if($PageType == 'Profile'){
            echo '<li><a href="#MoreInfo" data-toggle="tab"><i class="fa fa-users"></i>
            <span class="tapmname">'.$ALang['cust_more_contact'].'</span></a></li>';
        }
        echo '<li><a href="#Complaint" data-toggle="tab"><i class="fa fa-laptop"></i>
              <span class="tapmname">'.$ALang['cust_alert_complaint_info'].'</span></a></li>';   
        /*

        echo '<li><a href="#Address" data-toggle="tab"><i class="fa fa-map-marker "></i>
              <span class="tapmname">'.$ALang['cust_alert_address'].'</span></a></li>';
        echo '<li><a href="#Product" data-toggle="tab"><i class="fa fa-shopping-cart"></i>
              <span class="tapmname">'.$ALang['cust_alert_product'].'</span></a></li>';
              */
        echo '</ul>';
        echo '<div class="tab-content">';
    }
}

#################################################################################################################################
###################################################    Cust_Print_TabsClosedDiv
#################################################################################################################################
function Cust_Print_TabsClosedDiv(){
    global $ConfigP ;
    if($ConfigP['tape_view'] == '1'){echo '</div>';}
}


#################################################################################################################################
###################################################    Cust_Print_Info
#################################################################################################################################
function Cust_Print_Info_x($PageType,$row){
    global $ALang ;
    global $ConfigP ;
    
    #$Cust_namecount = intval($ConfigP['cust_namecount']);
    $Cust_namecount = "0";
    
    if($PageType == 'Edit'){
        $EditFilde = "Edit";
        $name_2_Req = 'required'; 
        $name_2_Req_php = 'req'; 
    }else{
        $EditFilde = "";
        $religion = "";
        $name_2_Req = ''; 
        $name_2_Req_php = ''; 
    }
    if($ConfigP['tape_view'] == '1'){
        echo '<div id="Contact" class="tab-pane fade in active">';
        echo BR;
    }else{
        New_Print_Alert("2",$ALang['cust_alert_info']);
    }
    
    $Arr = array("StartFrom" => '0',"Label" => 'on');
    $MemberTypeArr = array("0" => $ALang['new_member_0'],"1" => $ALang['new_member_1']);    
    $Err[] = NF_PrintSelect_2018("ArrFrom",$ALang['new_member_type'],"col-md-4","member_type",$MemberTypeArr,"req",ArrIsset($row,"member_type",'0'),$Arr);
 


    
    $MoreS = array('Col' => "col-md-4",'Placeholder'=> "",'required' => 'required','Dir'=> "Ar_Lang");
    $Err[] = NF_PrintInput("Text".$EditFilde,$ALang['cust_name'],"name","","","req",$MoreS);
    
    $MoreS = array('Col' => "col-md-4",'Placeholder'=> "",'required' => $name_2_Req ,'Dir'=> "Ar_Lang");
    $Err[] = NF_PrintInput("Text".$EditFilde,$ALang['cust_name_2'],"name_2","0","0",$name_2_Req_php,$MoreS);
 
    echo '<div style="clear: both!important;"></div>';
     
    
    $MoreS = array('Col'=> "col-md-3",'required' => 'data-parsley-type="digits" '.MOBILE_REQUIRED_TYPE , 'Dir'=> "En_Lang" );
    $Err[] = NF_PrintInput("Text".$EditFilde,$ALang['cust_mobile'],"mobile","0","0","optin-num",$MoreS);
        
    $MoreS = array('Col'=> "col-md-3",'required' => 'data-parsley-type="digits" '.MOBILE_REQUIRED_TYPE, 'Dir'=> "En_Lang" );
    $Err[] = NF_PrintInput("Text".$EditFilde,$ALang['cust_mobile'],"mobile_2","0","0","optin-num",$MoreS);
    
    
    $MoreS = array('Col' => "col-md-3",'required' => 'data-parsley-type="digits" '. PHONE_REQUIRED_TYPE, 'Dir'=> "En_Lang" );
    $Err[] = NF_PrintInput("Text".$EditFilde,$ALang['cust_phone'],"phone","0","0","optin-num",$MoreS);
    
    $MoreS = array('Col' => "col-md-3",'required' => 'data-parsley-type="digits" '. PHONE_REQUIRED_TYPE, 'Dir'=> "En_Lang" );
    $Err[] = NF_PrintInput("Text".$EditFilde,$ALang['cust_phone'],"phone_2","0","0","optin-num",$MoreS);
    
    echo '<div style="clear: both!important;"></div>';
    
    $MoreS = array('Col' => "col-md-3",'required' => 'data-parsley-type="digits" '. PHONE_REQUIRED_TYPE, 'Dir'=> "En_Lang" );
    $Err[] = NF_PrintInput("Text".$EditFilde,$ALang['cust_fax'],"fax","0","0","optin-num",$MoreS);
    
    $MoreS = array('Col' => "col-md-3",'Placeholder'=> "",'required' => 'data-parsley-type="email"', 'Dir'=> "En_Lang" );
    $Err[] = NF_PrintInput("Text".$EditFilde,$ALang['cust_email'],"email","0","0","optin-email",$MoreS);
    
    echo '<div style="clear: both!important;"></div>'.BR;
    
    
    echo '<div style="clear: both!important;"></div>'; 
    
    $MoreS = array('Col' => "col-md-6",'required' => '');
    $Err[] = NF_PrintInput("TextArea".$EditFilde,$ALang['cust_address'],"address","0","0","req",$MoreS);
    $MoreS = array('Col'=>"col-md-6" ,'required' => '' );
    $Err[] = NF_PrintInput("TextArea".$EditFilde,$ALang['cust_notes'],"notes","0","0","option",$MoreS);
    echo '<div style="clear: both!important;"></div>'.BR;
    
        
    if($ConfigP['tape_view'] == '1'){echo '</div>';}
}

#################################################################################################################################
###################################################    Cust_Print_LoginInfo
#################################################################################################################################
function Cust_Print_LoginInfo_x($PageType,$row){
    global $ALang ;
    global $ConfigP ;
 
    
    if($PageType == 'Edit'){
        $EditFilde = "Edit";
        $name_2_Req = ''; 
        $name_2_Req_php = ''; 
    }else{
        $EditFilde = "";
        $name_2_Req = 'required'; 
        $name_2_Req_php = 'req';         
    }
    
    
    if($ConfigP['tape_view'] == '1'){
        echo '<div id="Contact" class="tab-pane fade in active">';
        echo BR;
    }else{
        New_Print_Alert("2",$ALang['cust_login_h1']);
    }
    
 
    $MoreS = array('Col' => "col-md-6",'Placeholder'=> "",'required' => 'required data-parsley-minlength="5" ','Dir'=> "En_Lang");
    $Err[] = NF_PrintInput("Text".$EditFilde,$ALang['cust_login_user'],"user_name","1","1","req",$MoreS);
    
    $MoreS = array('Col' => "col-md-6",'Placeholder'=> "",'required' => $name_2_Req,'Dir'=> "En_Lang");
    $Err[] = NF_PrintInput("Text",$ALang['cust_login_pass'],"user_pass","0","1",$name_2_Req_php,$MoreS);
 
 
    
    echo '<div style="clear: both!important;"></div>'.BR;
    if($ConfigP['tape_view'] == '1'){echo '</div>';}
}


#################################################################################################################################
###################################################    Cust_Print_LoginInfo
#################################################################################################################################
function Cust_Print_SMS_Config_x($PageType,$row){
    global $ALang ;
    global $ConfigP ;
 
    
    if($PageType == 'Edit'){
        $EditFilde = "Edit";
        $name_2_Req = ''; 
        $name_2_Req_php = ''; 
    }else{
        $EditFilde = "";
        $name_2_Req = 'required'; 
        $name_2_Req_php = 'req';         
    }
    
    
    if($ConfigP['tape_view'] == '1'){
        echo '<div id="Contact" class="tab-pane fade in active">';
        echo BR;
    }else{
        New_Print_Alert("2",$ALang['cust_sms_config']);
    }
    
 
    $MoreS = array('Col'=> "col-md-6",'required' => 'required data-parsley-type="digits" '. MOBILE_REQUIRED_TYPE , 'Dir'=> "En_Lang" );
    $Err[] = NF_PrintInput("Text".$EditFilde,$ALang['cust_sms_mobile'],"sms_mobile","0","0","req-num",$MoreS);
    
    $MoreS = array('Col' => "col-md-6",'Placeholder'=> "",'required' => 'required data-parsley-type="email"', 'Dir'=> "En_Lang" );
    $Err[] = NF_PrintInput("Text".$EditFilde,$ALang['cust_sms_email'],"sms_email","0","0","req-email",$MoreS);
    
    echo '<div style="clear: both!important;"></div>'.BR;
    if($ConfigP['tape_view'] == '1'){echo '</div>';}
}

#################################################################################################################################
###################################################    Cust_Print_Product
#################################################################################################################################
function Cust_Print_Complain($PageType,$row){
 
    global $ALang ;
    global $ConfigP ;
    if($ConfigP['tape_view'] == '1'){
        echo '<div id="Complaint" class="tab-pane fade">';
        echo BR;
    }else{
        New_Print_Alert("2",$ALang['cust_complain_h1']);
    }
    if($PageType == 'Edit'){
        $EditFilde = "Edit";
        $Complaint_id = $row['complaint_id'];
        $StateNum = " " ;
 
    }else{
        $EditFilde = "Add";
        $Complaint_id = "";
        $StateNum =" and state = '1' " ;
 
    }
    
        $MySQL = "SELECT * FROM config_data where cat_id = 'Complaint' $StateNum  ";
        $ArrData = array('Req'=> 'req','MinReq'=> '2',"PageView"=> $EditFilde );
        Checkbox_2019("SQL","complaint_id",$MySQL,$Complaint_id,$ArrData);
        
        
    echo '<div style="clear: both!important;"></div>'.BR;
    if($ConfigP['tape_view'] == '1'){echo '</div>';}
}


#################################################################################################################################
###################################################    Cust_Print_CityList
#################################################################################################################################
function Cust_Print_CityList($PageType,$row){
 
   global $ALang ;
    global $ConfigP ;
    if($ConfigP['tape_view'] == '1'){
        echo '<div id="Complaint" class="tab-pane fade">';
        echo BR;
    }else{
        New_Print_Alert("2",$ALang['cust_citylist_h1']);
    }
    if($PageType == 'Edit'){
        $EditFilde = "Edit";
        $City_id = $row['citylist_id'];
        $StateNum = " " ;
 
    }else{
        $EditFilde = "Add";
        $City_id = "";
        $StateNum =" and state = '1' " ;
 
    }
    
        $MySQL = "SELECT * FROM config_data where cat_id = 'City' $StateNum  order by postion ";
        $ArrData = array('Req'=> 'req','MinReq'=> '1',"PageView"=> $EditFilde, "Col_2"=> "col-md-2" );
        Checkbox_2019("SQL","citylist_id",$MySQL,$City_id,$ArrData);
        
        
    echo '<div style="clear: both!important;"></div>'.BR;
    if($ConfigP['tape_view'] == '1'){echo '</div>';}
}





#################################################################################################################################
###################################################    Cust_Print_Branch
#################################################################################################################################

function Cust_Print_Branch(){
    global $ALang ;
    global $ConfigP ;
 
    
    if($ConfigP['tape_view'] == '1'){
        echo '<div id="Branch" class="tab-pane fade">';
        echo BR;
    }else{
        New_Print_Alert("2",$ALang['cust_branch_h1']);
    }
    
 
    $Arr = array("Label" => 'on',"Active" => '1', 'Order'=> "order by postion" ,"Filter_Filde"=> "cat_id" ,"Filter_Vall"=> "Area");
    $Err[] = NF_PrintSelect_2018("Chosen",$ALang['cust_branch_area'],"col-md-3","branch_area","config_data","req","",$Arr);   
    
    
    echo '<div style="clear: both!important;"></div>';
    $MoreS = array('Col' => "col-md-3",'Placeholder'=> "",'required' => 'required ','Dir'=> "Ar_Lang");
    $Err[] = NF_PrintInput("Text",$ALang['cust_branch_name'],"branch_name","1","1","req",$MoreS);

    $MoreS = array('Col' => "col-md-3",'Placeholder'=> "",'required' => ' ','Dir'=> "Ar_Lang");
    $Err[] = NF_PrintInput("Text",$ALang['cust_branch_name'],"branch_name_02","1","1","",$MoreS);

    $MoreS = array('Col' => "col-md-3",'Placeholder'=> "",'required' => ' ','Dir'=> "Ar_Lang");
    $Err[] = NF_PrintInput("Text",$ALang['cust_branch_name'],"branch_name_03","1","1","",$MoreS);

    $MoreS = array('Col' => "col-md-3",'Placeholder'=> "",'required' => ' ','Dir'=> "Ar_Lang");
    $Err[] = NF_PrintInput("Text",$ALang['cust_branch_name'],"branch_name_04","1","1","",$MoreS);            
    
    echo '<div style="clear: both!important;"></div>'.BR;
    if($ConfigP['tape_view'] == '1'){echo '</div>';}
}


#################################################################################################################################
###################################################    Print_Cust_Photo
#################################################################################################################################    

function Print_Cust_Photo_x($PageType,$row){
    global $ALang ;
    global $ConfigP ;

    
    if($ConfigP['tape_view'] == '1'){
        echo '<div id="Photo" class="tab-pane fade">';
        echo BR;
    }else{
       New_Print_Alert("5",$ALang['cust_logo_h1']);
    }
    
   if($PageType == 'Edit'){
        $EditFilde = "Edit";
        $photo_t = $row['photo_t'];
 
    }else{
        $EditFilde = "Add";
        $photo_t = "";
 
    }   


 
$Arr= array("Col"=> "col-md-6" ,"name"=> "photo" ,"photo"=> $photo_t ,"path"=> F_PATH_V ,'required' => '','upload_type'=>$ConfigP['defphoto_cust']) ;
New_PrintFilePhoto($EditFilde,$Arr);

/*
New_Print_Alert("5","Photo");  
$Arr= array("Col"=> "col-md-6" ,"name"=> "photo" ,'required' => '',"photo"=> $photo_t ,"path"=> F_PATH_V , 'upload_type'=>$ConfigP['defphoto_developer'] ) ;
New_PrintFilePhoto("Edit",$Arr);
*/

    
}





#################################################################################################################################
################################################### Cust_Print_Info_Profile
#################################################################################################################################
function Cust_Print_Info_Profile($row){
    global $ALang ;
    global $CONFIG_DATA_Arr ;
    global $NamePrint ;
    echo '<div id="Contact" class="tab-pane fade in active">';
    
    PrintFildInformation("col-md-6",$ALang['cust_name'],$row['name']);
    PrintFildInformation("col-md-6",$ALang['cust_name_2'],$row['name_2']);
 
    PrintFildInformation("col-md-3",$ALang['cust_mobile'],$row['mobile']);
    PrintFildInformation("col-md-3",$ALang['cust_mobile'],$row['mobile_2']);
    PrintFildInformation("col-md-3",$ALang['cust_phone'],$row['phone']);
    PrintFildInformation("col-md-3",$ALang['cust_phone'],$row['phone_2']);
    echo '<div style="clear: both!important;"></div>';
    PrintFildInformation("col-md-3",$ALang['cust_fax'],$row['fax']);
    PrintFildInformation("col-md-3",$ALang['cust_email'],$row['email']);
    
    echo '<div style="clear: both!important;"></div>';
    PrintFildInformation("col-md-6",$ALang['cust_address'],$row['address']);
    PrintFildInformation("col-md-6",$ALang['cust_notes'],$row['notes']);
    
    echo '<div style="clear: both!important;"></div></div>'.BR;
}

#################################################################################################################################
###################################################    Cust_Print_MoreInfo
#################################################################################################################################
function Cust_Print_MoreInfo($PageType,$row){
    global $ALang ;
    global $USER_PERMATION_Dell ;
    global $db ;
    echo '<div id="MoreInfo" class="tab-pane fade">';
    if( $row['sub_count'] > '0'){
        echo '<form name="myform" action="#" method="post">';
        if($USER_PERMATION_Dell == '1') {
            echo '<div class="row PanelMin TopButAction"><div class="col-md-12">
    <button type="submit"  name="DelUnit" class="mb-sm btn btn-danger CloseForm_Ar">'.$ALang['mainform_delete'].'</button>
    </div> </div><div style="clear: both;"></div>';
        }
        echo '<div class="panel panel-default">';
        echo '<div class="table-responsive">';
        echo '<table class="table table-striped table-bordered table-hover ArTabel">';
        echo '<thead>';
        echo '<tr>';
        echo '<th width="200">'.$ALang['cust_name'].'</th>';
        echo '<th width="100">'.$ALang['cust_sub_re'].'</th>';
        echo '<th width="100">'.$ALang['cust_mobile'].'</th>';
        echo '<th width="100">'.$ALang['cust_mobile'].'</th>';
        echo '<th width="100">'.$ALang['cust_email'].'</th>';
        echo '<th width="50" ><input type="checkbox" name="Check_ctr" value="yes" onClick="Check(document.myform.Check_ctr)"></th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        $cust_idid =  $row['id'];
        $Name = $db->SelArr( "SELECT * FROM customer_sub where cust_id = $cust_idid " );
        for($x = 0; $x < count($Name); $x++) {
            $user_id = $Name[$x]['id'];
            echo '<tr>';
            echo '<td>'.$Name[$x]['name'].'</td>';
            echo '<td>'.$Name[$x]['rel'].'</td>';
            echo '<td>'.$Name[$x]['mobile'].'</td>';
            echo '<td>'.$Name[$x]['mobile_2'].'</td>';
            echo '<td>'.$Name[$x]['email'].'</td>';
            echo '<td align="center">'.PrintCheckBox_New($Name[$x]['id']).'</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
        echo '</div>';
        echo '</form>';
    }
    echo '<a data-toggle="modal" data-target="#Mody" class="btn btn-xs TdBut Butquick btn-primary">
    <i class="fa fa-upload "></i>  '.$ALang['cust_add_more_contact'].'  </a>';
    echo '<div style="clear: both!important;"></div>'.BR;
    echo '</div>';
}

#################################################################################################################################
###################################################    Cust_Print_Product_Profile
#################################################################################################################################
function Cust_Print_Complaint_Profile($row){
    global $ALang ;
    global $CONFIG_DATA_Arr ;
    global $NamePrint ;
    global $db ;
    
    echo '<div id="Complaint" class="tab-pane fade">';
 
    echo '<div style="clear: both!important;"></div>';
    if($row['complaint_id'] != ''){
        $Print= "";
        $Ch_Arr = explode('-',$row['complaint_id']);
        $Ch_Arr =  array_filter($Ch_Arr);
        if(count($Ch_Arr)> '0'){
            $Amenities_Arr = $Ch_Arr;
        }else{
            $Amenities_Arr = array();
        }
        for ($i = 1; $i <= count($Amenities_Arr); $i++) {
            $NewLine = findValue_FromArr($CONFIG_DATA_Arr,"id",$Amenities_Arr[$i],$NamePrint);
            $Print .= '<li class="Profile_Product_Cat" >'.$NewLine.'</li>';
        }
        PrintFildInformation("col-md-12",$ALang['cust_complain_h1'],$Print);
    }
    echo '</div>';
}



 
#################################################################################################################################
###################################################    Cust_Print_Branch_Profile
#################################################################################################################################
function Cust_Print_Branch_Profile($row){
    global $ALang ;
    global $CONFIG_DATA_Arr ;
    global $NamePrint ;
    global $db ;
    echo '<div id="Branch" class="tab-pane fade">';
    if($row['product_cat'] != ''){
        $Print= "";
        $Ch_Arr = explode('-',$row['product_cat']);
        $Ch_Arr =  array_filter($Ch_Arr);
        if(count($Ch_Arr)> '0'){
            $Amenities_Arr = $Ch_Arr;
        }else{
            $Amenities_Arr = array();
        }
        for ($i = 1; $i <= count($Amenities_Arr); $i++) {
            $NewLine = findValue_FromArr($CONFIG_DATA_Arr,"id",$Amenities_Arr[$i],$NamePrint);
            $Print .= '<li class="Profile_Product_Cat" >'.$NewLine.'</li>';
        }
        PrintFildInformation("col-md-12",$ALang['cust_product_cat'],$Print);
        echo '<div style="clear: both!important;"></div>'.BR;
    }
    echo '<div style="clear: both!important;"></div>';
    if($row['product'] != ''){
        $Print= "";
        $Ch_Arr = explode('-',$row['product']);
        $Ch_Arr =  array_filter($Ch_Arr);
        if(count($Ch_Arr)> '0'){
            $Amenities_Arr = $Ch_Arr;
        }else{
            $Amenities_Arr = array();
        }
        for ($i = 1; $i <= count($Amenities_Arr); $i++) {
            $NewLine = findValue_FromArr($CONFIG_DATA_Arr,"id",$Amenities_Arr[$i],$NamePrint);
            $Print .= '<li class="Profile_Product_Cat" >'.$NewLine.'</li>';
        }
        PrintFildInformation("col-md-12",$ALang['cust_product'],$Print);
    }
    echo '</div>';
}

 
#################################################################################################################################
###################################################   CustService_Filter_Employee_By_Permission
#################################################################################################################################
function CustService_Filter_Employee_By_Permission(){
    global $AdminConfig ;
    global $RowUsreInfo  ;
    if($AdminConfig['subercustserv'] == '1'){
        $UserPerm = "" ;
    }elseif($AdminConfig['custservleader']== '1' and $RowUsreInfo['custserv_leader'] == '1' ){
        if($RowUsreInfo['user_follow'] != '' and $RowUsreInfo['user_follow'] != '0'){
            $ThisAccountFollow = unserialize($RowUsreInfo['user_follow']);
            $UserPerm = CustService_GeThisAccountFollow($ThisAccountFollow);
        }else{
            $UserPerm = " and user_id = ". intval($RowUsreInfo['user_id'])  ;
        }
    }else{
        $UserPerm = " and user_id = ". intval($RowUsreInfo['user_id'])  ;
    }
    return  $UserPerm ;
}
#################################################################################################################################
###################################################  Filter_FollowUser_By_Permission
#################################################################################################################################
function Filter_FollowUser_By_Permission(){
    global $AdminConfig ;
    global $RowUsreInfo  ;
    if($AdminConfig['subercustserv'] == '1'){
        $UserPerm = "" ;
    }else{
        if($RowUsreInfo['user_follow'] != '' and $RowUsreInfo['user_follow'] != '0'){
            $ThisAccountFollow = unserialize($RowUsreInfo['user_follow']);
            $UserPerm = CustService_GeThisAccountFollow($ThisAccountFollow);
        }else{
            $UserPerm = " and user_id = ". intval($RowUsreInfo['user_id'])  ;
        }
    }
    return  $UserPerm ;
}

#################################################################################################################################
###################################################    CustService_Page_credentials
#################################################################################################################################
function CustService_Page_credentials($Row){
    global $AdminConfig ;
    global $RowUsreInfo  ;
    $Credentials_Add = "0";
    $Credentials_View = "0";
    if($AdminConfig['subercustserv'] == '1'){
        $Credentials_Add = "1"; $Credentials_View = "1";
    }elseif($Row['user_id'] == $RowUsreInfo['user_id']){
        $Credentials_Add = "1"; $Credentials_View = "1";
    }elseif($AdminConfig['custservleader']== '1' and $RowUsreInfo['custserv_leader'] == '1'){
        $ThisAccountFollow = unserialize($RowUsreInfo['user_follow']);
        if (in_array($Row['user_id'], $ThisAccountFollow)) {
            $Credentials_View = "1" ;
            $Credentials_Add = "1"; $Credentials_View = "1";
        }
    }
    return   $Credentials  = array('View'=> $Credentials_View ,'Add'=> $Credentials_Add );
}
#################################################################################################################################
###################################################  CheckDuplicatesEntry
#################################################################################################################################
function CheckDuplicatesEntry($arr){
 $GetDate = array_values(array_filter($arr));  
 if(count(array_unique($GetDate))< count($GetDate)){
    $Err = "1" ;
 }else{
    $Err = "0";
  }
  return $Err ;
}
#################################################################################################################################
###################################################  PrintErrFromSQL_ForCust_2
#################################################################################################################################
function PrintErrFromSQL_ForCust_2($Val,$ErrMass,$MMID='0'){
    global $db ;
    global $AdminLangFile ;
    global $AdminPathHome ;
    global $AdminConfig ;
    $Err = "" ;
    
    if($MMID != '0'){
    $TestForEditLine = " and id != ".$MMID;    
    }else{
    $TestForEditLine = '';        
    }
     
     if(($_POST[$Val]) ){
    
     $CheckVall = Clean_Mypost($_POST[$Val]);
     
     if($Val == 'email'){
     $SQL = "SELECT id,name FROM customer WHERE email = '$CheckVall' $TestForEditLine ";    
     }elseif( $Val  == 'user_name'){
     $SQL = "SELECT id,name FROM customer WHERE user_name = '$CheckVall' $TestForEditLine ";   
     }else{
     $SQL = "SELECT id,name FROM customer WHERE ( mobile = '$CheckVall' or  mobile_2 = '$CheckVall' or phone = '$CheckVall' or phone_2 = '$CheckVall' or fax = '$CheckVall' ) $TestForEditLine ";   
     }

     $already = $db->H_Total_Count($SQL);

     if($already > 0) {
        $Err = '1';
    
        $SendMass = "";
        $Name = $db->SelArr($SQL);
        for($i = 0; $i < count($Name); $i++) {
       
        $Link_Edit = $AdminPathHome."Customer/index.php?view=EditCustomer&id=".$Name[$i]['id'] ;
        $Link_View = $AdminPathHome."Customer/index.php?view=Profile&id=".$Name[$i]['id'] ;
        $Target = "_blank" ;      
        
        $SendMass .= $ErrMass." ".$AdminLangFile['mainform_err_already_exists']." ";
        $SendMass .= $Name[$i]['name']." ".$AdminLangFile['mainform_err_record_id']." ".$Name[$i]['id'] ;  

        } 
        
        SendJavaErrMass_22 ($SendMass);        
     }
        
       return $Err ;
    }   
}
?>