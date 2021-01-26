		<script>
			$(document).ready(function(){
    		getmainbanners();
        $('.slick-promo').slick({
          infinite: true,
          slidesToShow: 3,
          slidesToScroll: 1,
          autoplay: true,
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
                vertical: true
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                vertical: true,
                autoplay: true,
                appendArrows: $('.wrap-promo'),
                prevArrow:'<button class="arrow-slick-promo prev-slick-promo"><i class="fa  fa-angle-up" aria-hidden="true"></i></button>',
                nextArrow:'<button class="arrow-slick-promo next-slick-promo"><i class="fa  fa-angle-down" aria-hidden="true"></i></button>',
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
    
    <script>
      // Array to store our Snowflake objects
      var snowflakes = [];

      // Global variables to store our browser's window size
      var browserWidth;
      var browserHeight;

      // Specify the number of snowflakes you want visible
      var numberOfSnowflakes = 100;

      // Flag to reset the position of the snowflakes
      var resetPosition = false;

      // Handle accessibility
      var enableAnimations = false;
      var reduceMotionQuery = matchMedia("(prefers-reduced-motion)");

      // Handle animation accessibility preferences 
      function setAccessibilityState() {
        if (reduceMotionQuery.matches) {
          enableAnimations = false;
        } else { 
          enableAnimations = true;
        }
      }
      setAccessibilityState();

      reduceMotionQuery.addListener(setAccessibilityState);

      //
      // It all starts here...
      //
      function setup() {
        if (enableAnimations) {
          window.addEventListener("DOMContentLoaded", generateSnowflakes, false);
          window.addEventListener("resize", setResetFlag, false);
        }
      }
      setup();

      //
      // Constructor for our Snowflake object
      //
      function Snowflake(element, speed, xPos, yPos) {
        // set initial snowflake properties
        this.element = element;
        this.speed = speed;
        this.xPos = xPos;
        this.yPos = yPos;
        this.scale = 1;

        // declare variables used for snowflake's motion
        this.counter = 0;
        this.sign = Math.random() < 0.5 ? 1 : -1;

        // setting an initial opacity and size for our snowflake
        this.element.style.opacity = (.1 + Math.random()) / 3;
      }

      //
      // The function responsible for actually moving our snowflake
      //
      Snowflake.prototype.update = function () {
        // using some trigonometry to determine our x and y position
        this.counter += this.speed / 5000;
        this.xPos += this.sign * this.speed * Math.cos(this.counter) / 40;
        this.yPos += Math.sin(this.counter) / 40 + this.speed / 30;
        this.scale = .5 + Math.abs(10 * Math.cos(this.counter) / 20);

        // setting our snowflake's position
        setTransform(Math.round(this.xPos), Math.round(this.yPos), this.scale, this.element);

        // if snowflake goes below the browser window, move it back to the top
        if (this.yPos > browserHeight) {
          this.yPos = -50;
        }
      }

      //
      // A performant way to set your snowflake's position and size
      //
      function setTransform(xPos, yPos, scale, el) {
        el.style.transform = `translate3d(${xPos}px, ${yPos}px, 0) scale(${scale}, ${scale})`;
      }

      //
      // The function responsible for creating the snowflake
      //
      function generateSnowflakes() {

        // get our snowflake element from the DOM and store it
        var originalSnowflake = document.querySelector(".snowflake");

        // access our snowflake element's parent container
        var snowflakeContainer = originalSnowflake.parentNode;
        snowflakeContainer.style.display = "block";

        // get our browser's size
        browserWidth = document.documentElement.clientWidth;
        browserHeight = document.documentElement.clientHeight;

        // create each individual snowflake
        for (var i = 0; i < numberOfSnowflakes; i++) {

          // clone our original snowflake and add it to snowflakeContainer
          var snowflakeClone = originalSnowflake.cloneNode(true);
          snowflakeContainer.appendChild(snowflakeClone);

          // set our snowflake's initial position and related properties
          var initialXPos = getPosition(50, browserWidth);
          var initialYPos = getPosition(50, browserHeight);
          var speed = 5 + Math.random() * 40;

          // create our Snowflake object
          var snowflakeObject = new Snowflake(snowflakeClone,
            speed,
            initialXPos,
            initialYPos);
          snowflakes.push(snowflakeObject);
        }

        // remove the original snowflake because we no longer need it visible
        snowflakeContainer.removeChild(originalSnowflake);

        moveSnowflakes();
      }

      //
      // Responsible for moving each snowflake by calling its update function
      //
      function moveSnowflakes() {

        if (enableAnimations) {
          for (var i = 0; i < snowflakes.length; i++) {
            var snowflake = snowflakes[i];
            snowflake.update();
          }      
        }

        // Reset the position of all the snowflakes to a new value
        if (resetPosition) {
          browserWidth = document.documentElement.clientWidth;
          browserHeight = document.documentElement.clientHeight;

          for (var i = 0; i < snowflakes.length; i++) {
            var snowflake = snowflakes[i];

            snowflake.xPos = getPosition(50, browserWidth);
            snowflake.yPos = getPosition(50, browserHeight);
          }

          resetPosition = false;
        }

        requestAnimationFrame(moveSnowflakes);
      }

      //
      // This function returns a number between (maximum - offset) and (maximum + offset)
      //
      function getPosition(offset, size) {
        return Math.round(-1 * offset + Math.random() * (size + 2 * offset));
      }

      //
      // Trigger a reset of all the snowflakes' positions
      //
      function setResetFlag(e) {
        resetPosition = true;
      }
    </script>