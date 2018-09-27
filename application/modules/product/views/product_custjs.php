	<script>
		$(document).ready(function(){
			var sort = $('[name="sorting"]').val();
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
		})

		function onchange(e) 
		{
			if (e.currentTarget.value >= 0)
			{
				window.location.reload();
			}
		}

		document.getElementById('sorting').addEventListener('change', onchange);	

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

		function createList(res,sno)
		{
			$('#product_list').empty();
			for(index in res)
			{
				price = (res[index].PROD_SPCPRICE > 0)?'<span class="block2-oldprice m-text7 p-r-5">Rp '+numeral(res[index].PROD_PRICE).format('0,0.00')+'</span><br><span class="block2-newprice m-text8 p-r-5">Rp '+numeral(res[index].PROD_SPCPRICE).format('0,0.00')+'</span>':'<span class="block2-price m-text6 p-r-5">Rp '+numeral(res[index].PROD_PRICE).format('0,0.00')+'</span>';
				var div = '<div class="col-sm-12 col-md-6 col-lg-4 p-b-50"><!-- Block --><div class="block2"><div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew"><img src="<?php echo base_url()?>admin'+res[index].PRODPIC_PATH+'" alt="IMG-PRODUCT"><div class="block2-overlay trans-0-4"><a href="#" id="'+res[index].PROD_ID+'" onclick="wishlist(this)" class="block2-btn-addwishlist hov-pointer trans-0-4"><i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i><i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i></a><div id="'+res[index].PROD_ID+'" class="block2-btn-addcart w-size1 trans-0-4" onclick="cart(this)"><!-- Button --><button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">Add to Cart</button></div></div></div><div class="block2-txt p-t-20"><a href="<?php echo base_url();?>Product/details/'+res[index].PROD_SLUG+'" class="block2-name dis-block s-text3 p-b-5">'+res[index].PROD_NAME+'</a>'+price+'</div></div></div>';
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
	</script>