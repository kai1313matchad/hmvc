	<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url()?>assets/frontend/vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
	<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url()?>assets/frontend/vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/frontend/js/slick-custom.js"></script>
	<!--===============================================================================================-->
	<script type="text/javascript">
		(function ($) {
		    "use strict";

		    function getTimeRemaining(endtime) { 
		      var t = Date.parse(endtime) - Date.parse(new Date());
		      var seconds = Math.floor((t / 1000) % 60);
		      var minutes = Math.floor((t / 1000 / 60) % 60);
		      var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
		      var days = Math.floor(t / (1000 * 60 * 60 * 24));
		      return {
		        'total': t,
		        'days': days,
		        'hours': hours,
		        'minutes': minutes,
		        'seconds': seconds
		      };
		    }

		    function initializeClock(id, endtime) { 
		      var daysSpan = $('.days');
		      var hoursSpan = $('.hours');
		      var minutesSpan = $('.minutes');
		      var secondsSpan = $('.seconds');

		      function updateClock() { 
		        var t = getTimeRemaining(endtime);

		        daysSpan.html(t.days);
		        hoursSpan.html(('0' + t.hours).slice(-2));
		        minutesSpan.html(('0' + t.minutes).slice(-2));
		        secondsSpan.html(('0' + t.seconds).slice(-2))

		        if (t.total <= 0) {
		          clearInterval(timeinterval);
		        }
		      }

		      updateClock();
		      var timeinterval = setInterval(updateClock, 1000);
		    }
		    var countDownDate = new Date("August 25, 2018 00:00:01").getTime();
		    var deadline = new Date(countDownDate); 
		    initializeClock('clockdiv', deadline);

		})(jQuery);
	</script>
	<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url()?>assets/frontend/vendor/lightbox2/js/lightbox.min.js"></script>
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
	</script>
	<!-- production version, optimized for size and speed -->
	<script src="https://cdn.jsdelivr.net/npm/vue"></script>