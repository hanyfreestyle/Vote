<script type="text/javascript">
$(document).ready(function(){
    $('#country_id').on('change',function(){
        var countryID = $(this).val();
       //alert(countryID);
        if(countryID){
            $.ajax({
                type:'POST',
                url:'../_IncPage/Ajax_Country.php',
                data:'country_id='+countryID,
                success:function(html){
                     $('#city_id').html(html);
                     $('#city_id').trigger("chosen:updated");
                 }
            }); 

        }else{    
            $('#city_id').html('<option value=""><?php echo $ALang['cust_country_op'] ?></option>');
            $('#city_id').trigger("chosen:updated");
            $('#area_id').html('<option value=""><?php echo $ALang['cust_country_op'] ?></option>');
            $('#area_id').trigger("chosen:updated");            
        }
    });
    
    
    $('#city_id').on('change',function(){
        var cityID = $(this).val();
       //alert(countryID);
        if(cityID){
            $.ajax({
                type:'POST',
                url:'../_IncPage/Ajax_Country.php',
                data:'city_id='+cityID,
                success:function(html){
                     $('#area_id').html(html);
                     $('#area_id').trigger("chosen:updated");
                 }
            }); 
        }else{    
            $('#area_id').html('<option value=""><?php echo $ALang['cust_city_op'] ?></option>');
            $('#area_id').trigger("chosen:updated");            
        }
    });
        

});
</script>
