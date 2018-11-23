	<script>
		$(document).ready(function(){
			var pathArray = window.location.pathname.split('/');
			var id = pathArray[4];
			filterload_(id);
		})

		function filterload_(id)
		{
			loadPagination(id);
		}

		function loadSort(id)
		{
			$('[name="filter"]').val(0);
			filterload_();
		}

		function loadPagination(id)
		{
			$.ajax({
					url: '<?=base_url()?>Blogpost/read_more/'+id,
					type: 'get',
					dataType: 'json',
					success: function(data)
					{
						isiBlog(data);
					}
			});
		}

        function isiBlog(data)
        {
        	$('#blog_content').empty();
        	moment.updateLocale('id', {months : ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli","Agustus", "September", "Oktober", "November", "Desember"]});
			moment.locale('id');
			var label ='Posted on '+data[0]["BLOG_DATE"];
			var readmore = data[0]["BLOG_CONTENT"];
			var div1='<h2><a> '+ data[0]["BLOG_TITLE"] +'</a></h2><hr />';
			var tgl = moment(data[0]["BLOG_DATE"]).format('DD MMMM YYYY');
			var div2='<p><span class="glyphicon glyphicon-time"></span> Posted on '+ tgl +'</p>';
			var div3='<img class="img-responsive" src="<?php echo base_url();?>admin/assets/img/blogpost/'+data[0]["BLOG_PICTURE"]+'?>" width="800" height="300"alt=""><hr />';
			var div4='<p><div id="more'+data[0]["BLOG_ID"]+'">'+readmore+'</div></p>';
			var div = '<div>'+div1+div2+div3+div4+'</div>';
			$('#blog_content').append(div);							
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