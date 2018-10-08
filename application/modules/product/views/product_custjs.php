	<script>
		$(document).ready(function(){
			var kategori = $('[name="kategori"]').val();
			var location = $('[name="location"]').val();
			var size = $('[name="size"]').val();
			var sort = $('[name="sorting"]').val();
			$(".selection-3").select2({
				minimumResultsForSearch: 20,
				dropdownParent: $('#dropDownSelect3')
			});
			$(".selection-4").select2({
				minimumResultsForSearch: 20,
				dropdownParent: $('#dropDownSelect4')
			});
			$(".selection-5").select2({
				minimumResultsForSearch: 20,
				dropdownParent: $('#dropDownSelect5')
			});
			if ($('[name="filter"]').val() == 1)
			{
				$('[name="filter"]').val(0);
				loadPagination6(0,kategori,location.size);
				$('.pagination').on('click','a',function(e){
					e.preventDefault(); 
					var pageno = $(this).attr('data-ci-pagination-page');
					loadPagination6(pageno,kategori,location.size);
				});
			}
			else
			{
				$('.pagination').on('click','a',function(e){
					e.preventDefault(); 
					var pageno = $(this).attr('data-ci-pagination-page');
					switch(sort)
					{
						case '2':
						loadPagination2(pageno);
						break;
						case '3':
						loadPagination3(pageno);
						break;
						case '4':
						loadPagination4(pageno);
						break;
						case '5':
						loadPagination5(pageno);
						break;
						default:
						loadPagination(pageno);
					}
				});
				switch(sort)
				{
					case '2':
					loadPagination2(0);
					break;
					case '3':
					loadPagination3(0);
					break;
					case '4':
					loadPagination4(0);
					break;
					case '5':
					loadPagination5(0);
					break;
					default:
					loadPagination(0);
				}
			}
		})

		function onchange(e) 
		{
			if (e.currentTarget.value >= 0)
			{
				if ($('[name="filter"]').val() == 1)
				{
					window.location.reload();
				}
			}
		}

		// document.getElementById('sorting').addEventListener('change', onchange);

		function loadPagination(pagno)
		{
			$.ajax({
					url: '<?=base_url()?>Pagination/loadProdRecord/'+pagno,
					type: 'get',
					dataType: 'json',
					success: function(response)
					{
						$('.pagination').html(response.pagination);
						createList(response.result,response.row);
					}
			});
		}

		function loadPagination2(pagno)
		{
			$.ajax({
					url: '<?=base_url()?>Pagination/loadProdRecordtoexpensive/'+pagno,
					type: 'get',
					dataType: 'json',
					success: function(response)
					{
						$('.pagination').html(response.pagination);
						createList(response.result,response.row);
					}
			});
		}

		function loadPagination3(pagno)
		{
			$.ajax({
					url: '<?=base_url()?>Pagination/loadProdRecordtocheap/'+pagno,
					type: 'get',
					dataType: 'json',
					success: function(response)
					{
						$('.pagination').html(response.pagination);
						createList(response.result,response.row);
					}
			});
		}

		function loadPagination4(pagno)
		{
			$.ajax({
					url: '<?=base_url()?>Pagination/loadProdRecordAtoZ/'+pagno,
					type: 'get',
					dataType: 'json',
					success: function(response)
					{
						$('.pagination').html(response.pagination);
						createList(response.result,response.row);
					}
			});
		}

		function loadPagination5(pagno)
		{
			$.ajax({
					url: '<?=base_url()?>Pagination/loadProdRecordZtoA/'+pagno,
					type: 'get',
					dataType: 'json',
					success: function(response)
					{
						$('.pagination').html(response.pagination);
						createList(response.result,response.row);
					}
			});
		}

		function loadPagination6(pagno)
		{
			$.ajax({
					url: '<?=base_url()?>Pagination/loadProdRecordFilter/'+pagno,
					type: 'post',
					data: $('input').serialize(),
					dataType: 'json',
					success: function(response)
					{
						$('.pagination').html(response.pagination);
						createList(response.result,response.row);
					}
			});
		}

		function createList(res,sno)
		{
			$('#product_list').empty();
			for(index in res)
			{
				var label = (Date.parse(res[index].PROD_RENTDUE)<Date.parse(Date()))?'labelava':'labelsold';
				price = (res[index].PROD_SPCPRICE > 0)?'<span class="block2-oldprice m-text7 p-r-5">Rp '+numeral(res[index].PROD_PRICE/10).format('0,0.-')+'</span><br><span class="block2-newprice m-text8 p-r-5">Rp '+numeral(res[index].PROD_SPCPRICE/10).format('0,0.-')+'</span>':'<span class="block2-price m-text6 p-r-5">Rp '+numeral(res[index].PROD_PRICE/10).format('0,0.-')+'</span>';
				var div = '<div class="col-sm-6 col-xs-6 col-md-6 col-lg-4 p-b-50"><!-- Block --><div class="block2"><div class="block2-img wrap-pic-w of-hidden hov-img-zoom pos-relative block2-'+label+'"><a href="<?php echo base_url();?>Product/details/'+res[index].PROD_SLUG+'"><img src="<?php echo base_url()?>admin'+res[index].PRODPIC_PATH+'" alt="IMG-PRODUCT"></a></div><div class="block2-txt p-t-20"><a href="<?php echo base_url();?>Product/details/'+res[index].PROD_SLUG+'" class="block2-name dis-block s-text3 p-b-5">'+res[index].PROD_NAME+'</a>'+price+'</div></div></div>';
				$('#product_list').append(div);
			}
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
		function filterprod(id)
		{
			var ctg = $('[name="categories"]').val();
			var loc = $('[name="location"]').val();
			var size = $('[name="size"]').val();
			$('[name="filter"]').val(id);
			$('[name="ctg"]').val(ctg);
			$('[name="loc"]').val(loc);
			$('[name="siz"]').val(size);
			window.location.reload();
		}
	</script>