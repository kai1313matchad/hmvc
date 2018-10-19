	<script>
		$(document).ready(function(){
			// var kategori = $('[name="kategori"]').val();
			// var location = $('[name="location"]').val();
			// var size = $('[name="size"]').val();
			// var sort = $('[name="sorting"]').val();
			filterload_();
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

		function loadPagination(pagno)
		{
			$.ajax({
					url: '<?=base_url()?>Pagination/loadBlogRecord/'+pagno,
					type: 'get',
					dataType: 'json',
					success: function(response)
					{
						$('.pagination').html(response.pagination);
						isiBlog(response.result,response.row);
					}
			});
		}

        function isiBlog(res,sno)
        {
        	$('#blog_content').empty();
        	moment.updateLocale('id', {
										    months : [
										        "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli",
										        "Agustus", "September", "Oktober", "November", "Desember"
										    ]
										});
			moment.locale('id');
			// alert(moment.locale());
        	for(index in res)
			{
				var label ='Posted on '+res[index].BLOG_DATE;
				var div1='<h2><a href="<?php echo base_url()?>Blogpost/read/'+res[index].BLOG_ID+'"?>'+res[index].BLOG_TITLE +'</a></h2><hr />';
				var tgl = moment(res[index].BLOG_DATE).format('DD MMMM YYYY');
				// var tgl = '11 Oktober 2018';
				var div2='<p><span class="glyphicon glyphicon-time"></span> Posted on '+ tgl +'</p>';
				var div3='<img class="img-responsive" src="<?php echo base_url();?>admin/assets/img/blogpost/'+res[index].BLOG_PICTURE+'?>" width="800" height="300"alt=""><hr />';
				var div4='<p>'+res[index].BLOG_CONTENT+'</p>';
				var div5='<a class="btn btn-primary" href="<?php echo base_url();?>Blogpost/read/'+res[index].BLOG_ID+'?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>';
				var div = '<div>'+div1+div2+div3+div4+div5+'</div>'
				$('#blog_content').append(div);						
			}
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