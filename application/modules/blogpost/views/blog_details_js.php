	<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url()?>assets/frontend/vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
	</script>
	<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url()?>assets/frontend/vendor/daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/frontend/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url()?>assets/frontend/vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/frontend/js/slick-custom.js"></script>
	<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url()?>assets/frontend/vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});

		$('.btn-addcart-product-detail').each(function(){
			var nameProduct = $('.product-detail-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/frontend/vendor/numeral/min/numeral.min.js"></script>