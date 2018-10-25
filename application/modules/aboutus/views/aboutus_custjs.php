	<script>
		$(document).ready(function(){
			// var kategori = $('[name="kategori"]').val();
			// var location = $('[name="location"]').val();
			// var size = $('[name="size"]').val();
			// var sort = $('[name="sorting"]').val();
			// filterload_();
			isiAboutUs();
			// loadHistory();
			//var pageno = $(this).attr('data-ci-pagination-page');
			//loadPagination(pageno);
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

		function loadHistory()
		{
			$.ajax({
					url: '<?=base_url()?>Aboutus/readStory/',
					type: 'get',
					dataType: 'json',
					success: function(data)
					{
						// $('[name="story"]').val(data[0]["STORE_HISTORY"]);
						var ourstory=data[0]["STORE_HISTORY"];
						return ourstory;
					}
			});
		}

        function isiAboutUs()
        {
        	$.ajax({
					url: '<?=base_url()?>Aboutus/readStory/',
					type: 'get',
					dataType: 'json',
					success: function(data)
					{
						var ourstory=data[0]["STORE_HISTORY"];
						$('#aboutus_content').empty();
        	
						var div1='<h3 class="m-text26 p-t-15 p-b-16">Our Story</h3>';
						var div2='<div><span name="story">'+ourstory+'</span></div>';
						var div= '<div>'+div1 + div2+'</div>';
						$('#aboutus_content').append(div);
						return ourstory;
					}
			});
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