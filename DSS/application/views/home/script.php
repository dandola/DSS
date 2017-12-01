<script>

$(document).ready(function(){
		var url = "<?php echo base_url('main/process'); ?>";
		$('form').on('submit',function(e){
		e.preventDefault(); // avoid to execute the actual submit of the form.		
		dataString=$("form").serialize();
		// data = $.param(data);
		$.ajax({
           type: "POST",
           url: url,
           data: dataString, // serializes the form's elements.
           success: function(data){
           	 alert(data.status);
           }
        });
        return false;
	});
});
</script>