<h3 class="H3_FontAr"><?php echo $AdminLangFile['dashboard_h1'] ?></h3>
<div class="row"><div class="col-lg-12">
<?php 

/*
$a = "برجاء التأكد من كتابة اسم العميل بصورة صحيحة بدون ( توتو -  طنطا - ( الهرم) - هدايا - للبلاستك ) ";
$b = "برجاء كتابة اسم العميل وليس الاسم التجارى لاننا سنقوم باستخدم هذا الاسم فى المراسلات او الرسائل النصية او البريد الالكترونى";

New_Print_Alert("4","برجاء مراعاة كتابة اسم العميل الشخصي فى خانة الاسم وليس الاسم التجارى"); 
New_Print_Alert("4",$a.BR.$b);
New_Print_Alert("4","برجاء التاكد من كتابة كود المحافظة قبل رقم تليفون الهاتف");
New_Print_Alert("4","برجاء اختيار حالة العميل سواء ( عميل نشط - او عميل غير نشط ) وفقا لحركة المبيعات او توجيهات ادارة المبيعات ");
New_Print_Alert("4","فى حالة عدم توفر العنون بالكامل يترك فارغا "); 
New_Print_Alert("1",'فضلا برجاء الضغط على " تحديث البيانات" من قسم ادارة العملاء واتمام ومراجعة هذه التعديلات ');
 
*/


//print_r3($RowUsreInfo);

if($RowUsreInfo['group_id'] == '1'){
    require_once 'Dashboard_Admin.php';
}elseif($RowUsreInfo['group_id'] == '2'){
    require_once 'Dashboard_Sales.php';
}


require_once 'Sales_Monthly.php';

?>
</div></div>