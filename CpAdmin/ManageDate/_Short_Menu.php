<script type="text/javascript" src="inc/Jsfile.js"></script>
<link rel="stylesheet" href="inc/CssFile.css">
<?php
if(!defined('WEB_ROOT')) {	exit;}

 
echo '<div class="row ShortMenu"><div class="col-md-12">'; 

echo '<div style="clear: both!important;"></div>';


echo '<a class="btn3d btn btn_3d-default btn-lg '.CheckSelBut("ListCity").'"  href="index.php?view=ListCity">
<i class=""></i>'.$SecArr_City['H1'].'</a>';  


echo '<a class="btn3d btn btn_3d-default btn-lg '.CheckSelBut("ListArea").'"  href="index.php?view=ListArea">
<i class=""></i>'.$SecArr_Area['H1'].'</a>';  


echo '<a class="btn3d btn btn_3d-default btn-lg '.CheckSelBut("ListComplaint").'"  href="index.php?view=ListComplaint">
<i class=""></i>'.$SecArr_Complaint['H1'].'</a>'; 


 
echo '<a class="btn3d btn btn_3d-default btn-lg '.CheckSelBut("MoveData").'"  href="index.php?view=MoveData">
<i class=""></i>تحويل البيانات</a>';  
/*
echo '<a class="btn3d btn btn_3d-default btn-lg '.CheckSelBut("ListBranch").'"  href="index.php?view=ListBranch">
<i class=""></i>'.$SecArr_Branch['H1'].'</a>';    



echo '<a class="btn3d btn btn_3d-default btn-lg '.CheckSelBut("ListSalesEmpl").'"  href="index.php?view=ListSalesEmpl">
<i class=""></i>'.$SecArr_SalesEmpl['H1'].'</a>'; 

echo '<a class="btn3d btn btn_3d-default btn-lg '.CheckSelBut("ListProductCat").'"  href="index.php?view=ListProductCat">
<i class=""></i>'.$SecArr_ProductCat['H1'].'</a>';  

echo '<a class="btn3d btn btn_3d-default btn-lg '.CheckSelBut("ListProduct").'"  href="index.php?view=ListProduct">
<i class=""></i>'.$SecArr_Product['H1'].'</a>';  

echo '<a class="btn3d btn btn_3d-default btn-lg '.CheckSelBut("ListCustFilter1").'"  href="index.php?view=ListCustFilter1">
<i class=""></i>'.$SecArr_CustFilter_1['H1'].'</a>';  

echo '<a class="btn3d btn btn_3d-default btn-lg '.CheckSelBut("ListCustFilter2").'"  href="index.php?view=ListCustFilter2">
<i class=""></i>'.$SecArr_CustFilter_2['H1'].'</a>';  

echo '<a class="btn3d btn btn_3d-default btn-lg '.CheckSelBut("ListCustFilter3").'"  href="index.php?view=ListCustFilter3">
<i class=""></i>'.$SecArr_CustFilter_3['H1'].'</a>';  

 

echo '<a class="btn3d btn btn_3d-default btn-lg '.CheckSelBut("ListCountry").'"  href="index.php?view=ListCountry">
<i class=""></i>'.$SecArr_Country['H1'].'</a>'; 

echo '<a class="btn3d btn btn_3d-default btn-lg '.CheckSelBut("ListCity").'"  href="index.php?view=ListCity">
<i class=""></i>'.$SecArr_City['H1'].'</a>';  


   
/*
 
 
 






echo '<a class="btn3d btn btn_3d-default btn-lg '.CheckSelBut("ListAreaSub").'"  href="index.php?view=ListAreaSub">
<i class=""></i>'.$SecArr_AreaSub['H1'].'</a>';  

echo '<a class="btn3d btn btn_3d-default btn-lg '.CheckSelBut("ListStreet").'"  href="index.php?view=ListStreet">
<i class=""></i>'.$SecArr_Street['H1'].'</a>';  

*/

if($USER_PERMATION_Edit == '1'){
echo '<a class="btn3d btn btn_3d-default btn-lg '.CheckSelBut("Config").'"  href="index.php?view=Config">
<i class="fa fa-cogs"></i>'.$AdminLangFile['mainform_config'].'</a>';
}


echo '</div></div>';
echo '<div style="clear: both!important;"></div>';

?>
