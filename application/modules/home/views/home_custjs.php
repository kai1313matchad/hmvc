		<!-- <script>
			Vue.component('slider-item',{
				props : ['slider'],
				template : '<div class="item-slick1 item1-slick1" style="background-image: url(<?php echo base_url()?>assets/frontend/images/banners/{{ slider.text }});"><div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170"></div></div>'
			})
			var app = new Vue({
			  el: '#app',
			  data: {
			    imgList : [
			    	{ id: 0, text: 'banner1' },
			      { id: 1, text: 'banner2' },
			      { id: 2, text: 'banner3' }
			    ]
			  }
			})
		</script> -->
		<script>
			$(document).ready(function(){
    		getmainbanners();    		
    	});
			function getmainbanners()
			{
				$.ajax({
        	url : "<?php echo site_url('Home/get_mainbanners')?>",
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
        var itemSlick1 = $('.slick1').find('.item-slick1');
        var action1 = [];
        var action2 = [];
        var action3 = [];
        var cap1Slide1 = [];
        var cap2Slide1 = [];
        var btnSlide1 = [];

        // for(var i=0; i<itemSlick1.length; i++)
        // {
        //   cap1Slide1[i] = $(itemSlick1[i]).find('.caption1-slide1');
        //   cap2Slide1[i] = $(itemSlick1[i]).find('.caption2-slide1');
        //   btnSlide1[i] = $(itemSlick1[i]).find('.wrap-btn-slide1');
        // }

        // $('.slick1').on('init', function(){

        //     action1[0] = setTimeout(function(){
        //         $(cap1Slide1[0]).addClass($(cap1Slide1[0]).data('appear') + ' visible-true');
        //     },200);

        //     action2[0] = setTimeout(function(){
        //         $(cap2Slide1[0]).addClass($(cap2Slide1[0]).data('appear') + ' visible-true');
        //     },1000);

        //     action3[0] = setTimeout(function(){
        //         $(btnSlide1[0]).addClass($(btnSlide1)[0].data('appear') + ' visible-true');
        //     },1800);
        // });

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
            arrows: true,
            appendArrows: $('.wrap-slick1'),
            prevArrow:'<button class="arrow-slick1 prev-slick1"><i class="fa  fa-angle-left" aria-hidden="true"></i></button>',
            nextArrow:'<button class="arrow-slick1 next-slick1"><i class="fa  fa-angle-right" aria-hidden="true"></i></button>',  
        });

        // $('.slick1').on('afterChange', function(event, slick, currentSlide){ 
        //     for(var i=0; i<itemSlick1.length; i++) {

        //       clearTimeout(action1[i]);
        //       clearTimeout(action2[i]);
        //       clearTimeout(action3[i]);


        //       $(cap1Slide1[i]).removeClass($(cap1Slide1[i]).data('appear') + ' visible-true');
        //       $(cap2Slide1[i]).removeClass($(cap2Slide1[i]).data('appear') + ' visible-true');
        //       $(btnSlide1[i]).removeClass($(btnSlide1[i]).data('appear') + ' visible-true');

        //     }

        //     action1[currentSlide] = setTimeout(function(){
        //         $(cap1Slide1[currentSlide]).addClass($(cap1Slide1[currentSlide]).data('appear') + ' visible-true');
        //     },200);

        //     action2[currentSlide] = setTimeout(function(){
        //         $(cap2Slide1[currentSlide]).addClass($(cap2Slide1[currentSlide]).data('appear') + ' visible-true');
        //     },1000);

        //     action3[currentSlide] = setTimeout(function(){
        //         $(btnSlide1[currentSlide]).addClass($(btnSlide1)[currentSlide].data('appear') + ' visible-true');
        //     },1800);            
        // });
			}
		</script>