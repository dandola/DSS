<script>

$(document).ready(function(){
  $(".school_id").change(function(){
    var school_id=$(this).val();
    var dataString = 'school_id='+ school_id;

    $.ajax({
      type: "POST",
      url: "<?php echo base_url('main/load_major'); ?>",
      data: dataString,
      cache: false,
      success: function(html){
        $(".major").html(html);
      } 
    });

  });
});





$(document).ready(function(){

    $('#show_result').submit(function(e){
        url='<?php echo base_url('main/process') ?>';
        e.preventDefault(); // avoid to execute the actual submit of the form.    
        dataString=$(this).serialize();
        $.ajax({
             type: "post",
             url: url,
             data: dataString, // serializes the form's elements.
             success: function(response){
               console.log(JSON.parse(response));
             }
          });
          return false;
        });
    });
</script>