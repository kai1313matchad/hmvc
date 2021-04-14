	<script>
		$(document).ready(function(){
			
		})

		// document.getElementById('sorting').addEventListener('change', onchange);
		function sendMessage() {
      $.ajax({
			url: '<?=base_url()?>Contactus/simpanContactUs/',
			type: 'POST',
			data: $('#sendMessage').serialize(),
			dataType: 'JSON',
				success: function(data) {   
					if(data.status) {
						alert('Data Send !');
						// resetbtn();
					}
					else {
						alert(data['error_string']);
					}
				}
			})
  	}
	</script>