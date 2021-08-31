<?php 
//print_r3($PageVarList);
?>
<script type="text/javascript">
$(document).ready(function(){
     var tabelName = $('#TabelName').val();
    
    $('#level_1').on('change',function(){
        var level_1ID = $(this).val();
        
        var leavel2_Catid = $('#Leavel2_Catid').val();
        var leavel2_Name = $('#Leavel2_Name').val();
       
         // alert(tabelName);
        if(level_1ID){
            $.ajax({
                type:'GET',
                url:'Level_A_Ajax.php',
                data:'level_1ID='+level_1ID+'&tabelName='+tabelName+'&leavel2_Catid='+leavel2_Catid+"&leavel2_Name="+leavel2_Name,
                success:function(html){
                     $('#level_2').html(html);
                     $('#level_2').trigger("chosen:updated");
    
                     $('#level_3').html('<option value=""><?php echo $ALang['mainform_pls']." ".$PageVarList['LevelNames']['2'] ?></option>');
                     $('#level_3').trigger("chosen:updated");
                    
                     $('#level_4').html('<option value=""><?php echo $ALang['mainform_pls']." ".$PageVarList['LevelNames']['3'] ?></option>');
                     $('#level_4').trigger("chosen:updated");            
                     
                 }
            }); 

        }else{    
            $('#level_2').html('<option value=""><?php echo $ALang['mainform_pls']." ".$PageVarList['LevelNames']['1'] ?></option>');
            $('#level_2').trigger("chosen:updated");
             
            $('#level_3').html('<option value=""><?php echo $ALang['mainform_pls']." ".$PageVarList['LevelNames']['2'] ?></option>');
            $('#level_3').trigger("chosen:updated");
            
            $('#level_4').html('<option value=""><?php echo $ALang['mainform_pls']." ".$PageVarList['LevelNames']['3'] ?></option>');
            $('#level_4').trigger("chosen:updated");            

        }
    });
   
   

    $('#level_2').on('change',function(){
        var level_2ID = $(this).val();
        
        var leavel3_Catid = $('#Leavel3_Catid').val();
        var leavel3_Name = $('#Leavel3_Name').val();
        //alert(level_2ID);
         
        if(level_2ID){
            $.ajax({
                type:'GET',
                url:'Level_A_Ajax.php',
                data:'level_2ID='+level_2ID+'&tabelName='+tabelName+'&leavel3_Catid='+leavel3_Catid+"&leavel3_Name="+leavel3_Name,
                success:function(html){
                     $('#level_3').html(html);
                     $('#level_3').trigger("chosen:updated");

                     $('#level_4').html('<option value=""><?php echo $ALang['mainform_pls']." ".$PageVarList['LevelNames']['3'] ?></option>');
                     $('#level_4').trigger("chosen:updated");                        
                 }
            }); 

        }else{    
            
            $('#level_3').html('<option value=""><?php echo $ALang['mainform_pls']." ".$PageVarList['LevelNames']['2'] ?></option>');
            $('#level_3').trigger("chosen:updated");

            $('#level_4').html('<option value=""><?php echo $ALang['mainform_pls']." ".$PageVarList['LevelNames']['3'] ?></option>');
            $('#level_4').trigger("chosen:updated");            

        }
    });
   
   

    $('#level_3').on('change',function(){
        var level_3ID = $(this).val();
        
        var leavel4_Catid = $('#Leavel4_Catid').val();
        var leavel4_Name = $('#Leavel4_Name').val();
        //alert(level_2ID);
         
        if(level_3ID){
            $.ajax({
                type:'GET',
                url:'Level_A_Ajax.php',
                data:'level_3ID='+level_3ID+'&tabelName='+tabelName+'&leavel4_Catid='+leavel4_Catid+"&leavel4_Name="+leavel4_Name,
                success:function(html){
                     $('#level_4').html(html);
                     $('#level_4').trigger("chosen:updated");
                 }
            }); 

        }else{    
            $('#level_4').html('<option value=""><?php echo $ALang['mainform_pls']." ".$PageVarList['LevelNames']['3'] ?></option>');
            $('#level_4').trigger("chosen:updated");            

        }
    });
       

});
</script>
