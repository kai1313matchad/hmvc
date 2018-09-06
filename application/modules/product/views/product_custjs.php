	<script>
		$(document).ready(function(){
			$('.pagination').on('click','a',function(e){
       	e.preventDefault(); 
       	var pageno = $(this).attr('data-ci-pagination-page');
				loadPagination(pageno);
     	});
     	loadPagination(0);
   //   	$('.block2-btn-addcart').each(function(){
			// 	var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			// 	$(this).on('click', function(){
			// 		swal(nameProduct, "is added to cart !", "success");
			// 	});
			// });
		})

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
		function createList(res,sno)
		{
			$('#product_list').empty();
			for(index in res)
			{
				var div = '<div class="col-sm-12 col-md-6 col-lg-4 p-b-50"><!-- Block --><div class="block2"><div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew"><img src="<?php echo base_url()?>admin'+res[index].PRODPIC_PATH+'" alt="IMG-PRODUCT"><div class="block2-overlay trans-0-4"><a href="#" id="'+res[index].PROD_ID+'" onclick="wishlist(this)" class="block2-btn-addwishlist hov-pointer trans-0-4"><i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i><i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i></a><div id="'+res[index].PROD_ID+'" class="block2-btn-addcart w-size1 trans-0-4" onclick="cart(this)"><!-- Button --><button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">Add to Cart</button></div></div></div><div class="block2-txt p-t-20"><a href="<?php echo base_url();?>Product/details/'+res[index].PROD_SLUG+'" class="block2-name dis-block s-text3 p-b-5">'+res[index].PROD_NAME+'</a><span class="block2-price m-text6 p-r-5">Rp '+numeral(res[index].PROD_PRICE).format('0,0.00')+'</span></div></div></div>';
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