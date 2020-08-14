		<script>
			$(document).ready(function(){
    		getmainbanners();
        $('.slick-promo').slick({
          infinite: true,
          slidesToShow: 3,
          slidesToScroll: 1,
          dots: false,
          arrows: true,
          appendArrows: $('.wrap-promo'),
          prevArrow:'<button class="arrow-slick-promo prev-slick-promo"><i class="fa  fa-angle-left" aria-hidden="true"></i></button>',
          nextArrow:'<button class="arrow-slick-promo next-slick-promo"><i class="fa  fa-angle-right" aria-hidden="true"></i></button>', 
          responsive: [
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
          ]
        });
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