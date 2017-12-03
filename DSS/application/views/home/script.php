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
               var list_major=JSON.parse(response);
               var str="";
               for (var i = 0; i < list_major.length; i++) {
                   str+="<div class='text-muted'> Ngành " + (i+1) +":</div><br>"
                   + "<div><span class='text-info' >Tên ngành</span> : "+ list_major[i].name + "</div>"
                   + "<div><span class='text-info'>độ phù hợp</span> : "+ list_major[i].value + "</div><hr>";
                }
                document.getElementById('result').innerHTML=str;
               document.getElementById('show').style.display='block';
             }
          });
          return false;
        });
    });
</script>