		<script>
			$(document).ready(function(){
    		getmainbanners();
    	});
			function getmainbanners()
			{
				$.ajax({
        	url : "<?php echo site_url('home/get_mainbanners')?>",
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {
          	for(var i = 0; i < data.length; i++)
          	{
          		var slide = $('<div class="item-slick1 item'+(i+1)+'-slick1" style="background-image: url(<?php echo base_url()?>admin'+data[i]["MBANN_IMGPATH"]+');">').append('<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170"></div>').appendTo('#mainbanners');
          	}
          	slicki();
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
          	alert('Error Get Product Data');
          }
        });
			}

			function slicki()
			{
        $('.slickCust').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            fade: true,
            dots: false,
            appendDots: $('.wrap-slick1-dots'),
            dotsClass:'slick1-dots',
            infinite: true,
            autoplay: true,
            autoplaySpeed: 5000,
            adaptiveHeight: true,
            arrows: true,
            appendArrows: $('.wrap-slick1'),
            prevArrow:'<button class="arrow-slick1 prev-slick1"><i class="fa  fa-angle-left" aria-hidden="true"></i></button>',
            nextArrow:'<button class="arrow-slick1 next-slick1"><i class="fa  fa-angle-right" aria-hidden="true"></i></button>',  
        });
			}
		</script>