	<script>
		$(document).ready(function(){
			isiContactUs();
		})

		function filterload_()
		{
			//var sort = $('[name="sorting"]').val();
			loadPagination(0);
			$('.pagination').on('click','a',function(e){
				e.preventDefault();
				var pageno = $(this).attr('data-ci-pagination-page');
				loadPagination(pageno);
			});
			
		}

		function loadSort(id)
		{
			$('[name="filter"]').val(0);
			filterload_();
		}

		// document.getElementById('sorting').addEventListener('change', onchange);

		function loadMap()
		{
			$.ajax({
					url: '<?=base_url()?>Contactus/readMap/',
					type: 'get',
					dataType: 'json',
					success: function(data)
					{
						var ourmap=data[0]["STORE_MAPLINK"];
						return ourmap;
					}
			});
		}

        function isiContactUs()
        {
        	$.ajax({
					url: '<?=base_url()?>Contactus/readMap/',
					type: 'get',
					dataType: 'json',
					success: function(data)
					{   
						var ourmap=data[0]["STORE_MAPLINK"];
						$('#contactus_content').empty();
						var div='<div class="pos-relative embed-responsive embed-responsive-16by9"><iframe src="'+ourmap+'"></iframe></div>';
						$('#contactus_content').append(div);
						// return ourmap;
					}
			});
        }

        function simpan()
        {
        	$.ajax({
					url: '<?=base_url()?>Contactus/simpanContactUs/',
					type: 'POST',
					data: $('#form-contactus').serialize(),
					dataType: 'JSON',
					success: function(data)
					{   
						if(data.status)
	                    {
	                      alert('Data Send !');
	                      // resetbtn();
	                    } else {
	                      alert(data['error_string']);
	                    }
					}
			});
        }

        function resetbtn()
        {
	        $('#form-contactus')[0].reset();
	        $('.form-group').removeClass('has-error');
	        $('.help-block').empty();
        }
        function pickTgl(tgl){
        	$.ajax({
					url: '<?=base_url()?>Pagination/ajax_picktgl/'+tgl,
					type: 'get',
					dataType: 'json',
					success: function(data)
					{  
						return data.tgl;
					}
			});
        }

		function cart(id)
		{			
			var prodName = $(id).parent().parent().parent().find('.block2-name').html();
			swal(prodName, "is added to cart !", "success");
		}

		function wishlist(id)
		{
			var nameProduct = $(id).parent().parent().parent().find('.block2-name').html();			
			swal(nameProduct, "is added to wishlist !", "success");
		}
		
		function filter_()
		{
			var ctg = $('[name="categories"]').val();
			var loc = $('[name="location"]').val();
			var size = $('[name="size"]').val();
			$('[name="filter"]').val(1);
			$('[name="ctg"]').val(ctg);
			$('[name="loc"]').val(loc);
			$('[name="siz"]').val(size);
			filterload_();
		}
	</script>