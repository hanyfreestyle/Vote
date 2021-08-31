$(document).ready(function(){
    $('#city_id').on('change',function(){
        var city_id = $(this).val();
        var cust_id = $('#Cust_id').val();
        var area_list = $('#Area_List').val();
        //alert(city_id);
        if(city_id){
            $.ajax({
                type:'POST',
                url:'../Ajax_File.php',
                data:'city_id='+city_id+'&cust_id='+cust_id+'&area_list='+area_list,
                success:function(html){
                      $('#area_id').html(html);
                      //$('#area_text').html(html);
                 }
            }); 
        }else{    
            $('#area_id').html('<option value="">برجاء اختيار منطقة الفرع</option>');
        }
    });
});
