<?php
if(!defined('WEB_ROOT')) {	exit;}
###########################################################>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
OPen_Page($PageTitle);

$row = $db->H_CheckTheGet("id","id","survey","2");
$surveyIDD = $row['id'] ;
$cust_id = $row['cust_id'] ;

if(isset($_POST['AddNewOne'])){
    Redirect_Page_2("index.php?view=AddNewAnswers&id=".$surveyIDD);
}

$PageType = "Edit";

Form_Open();
echo '<div style="clear: both!important;"></div>';
echo '<input type="hidden" value="'.$cust_id.'" name="cust_id" />';

$MoreS = array('Col' => "col-md-12",'Placeholder'=> "",'required' => 'required','Dir'=> "Ar_Lang");
$Err[] = NF_PrintInput("TextEdit",$ALang['surveys_question'],"name","","","req",$MoreS);

Form_Close_New("2","SurveysList");

if(isset($_POST['B1'])){
    Vall($Err,"Edit_Survey",$db,"1",USERPERMATION_EDIT);
}

echo '<div style="clear: both!important;"></div>';



#################################################################################################################################
###################################################         الاجابات
#################################################################################################################################
New_Print_Alert("5",$ALang['surveys_answers']);

$THESQL = "select * from survey_list where cat_id = '$surveyIDD' order by postion ";
$THELINK = "view=".$view;
$ConfigP['datatabel'] = '0';
$PERpage = "20";

$already = $db->H_Total_Count($THESQL);
if ($already > 0){


    $AddBut = '<button type="submit"  name="AddNewOne" class="mb-sm btn btn-success">'.$ALang['surveys_add_new_answer'].'</button>';
    $TaBelArr = array('Tabel'=>"survey_list", "But"=>'1', 'DataTabelID'=> "",'AddBut'=> $AddBut );
    TableOpen_Header($TaBelArr);


    Table_TH_Print('1',"#","20");
    Table_TH_Print("1",$ALang['surveys_answer'],"120");
    Table_TH_Print('1',"","20");
    Table_TH_Print('1',"","20");
    Table_TH_Print('1',"","20");
    Table_TH_Print('1','<input type="checkbox" name="Check_ctr" value="yes" onClick="Check(document.myform.Check_ctr)">',"20");



///// TableClose_Header
    TableClose_Header();


    $NOPAGE = GETTHEPAGE ($THESQL ,$PERpage);
    if ($NOPAGE != 1){


        if($ConfigP['datatabel'] == '1' and DATATABELVIEW == '1'  ){
            $Name = $db->SelArr($THESQL);
        }else{
            $Name = $db->SelArr($THESQL ,true,$PERpage,PAGING_NEXT_PREV_NUM,$THELINK,5);
        }




        for($i = 0; $i < count($Name); $i++) {
            $id = $Name[$i]['id'];
            $x = $i+1;
            echo '<tr>';

            Table_TD_Print("1",$x,"C");
            Table_TD_Print("1",$Name[$i]['name'],"R");

            $Oth = array('OtherStyle'=>"NewButStyle");
            Table_TD_Print_Option('1',NF_PrintBut_TD('2',$ALang['mainform_edit'],"EditAnswer&id=".$id,"btn-success","fa-pencil"),"C",$Oth);
            Table_TD_Print_Option('1',NF_PrintBut_TD('2',$ALang['surveys_delete_answer'],"DeleteAnswer&id=".$id,"btn-danger","fa-window-close"),"C",$Oth);
            Table_TD_Print_Option('1',CheckUnitState($Name[$i]['state']),"C",$Oth);
            Table_TD_Print_Option('1',PrintCheckBox_New($id),"C",$Oth);
            echo '</tr>';
        }
    }

///// CloseTabel
    CloseTabel();

}else{
    Alert_NO_Content();
}









###########################################################<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
Close_Page();
?>