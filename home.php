
<html>
	<head>
		<style>

			body{
				margin: 0;
				padding: 0;
			}

			ul{
				margin: 0;
				padding: 0;
			}

			ul li{
				list-style: none;
				overflow: hidden;
				height: 600px;
				position: relative;
			}

			.parallax-background{
				height: 700px;
			}

			.twitter{
				background-image: url('images/lens.jpg');
				background-position: 60% 35%;
			}

			.lens{
				background-image: url('images/twitter.jpg');
					background-position: 60% 35%;
			}

			.beach{
				background-image: url('images/beach.jpg');
				background-position: 95% 100%;
			}

			.wolf{
				background-image: url('images/wolf.jpg');

		
			}

			ul li .subcontent{
				position: absolute;
				top:250px;
				left:50px;
				color:white;

				font-family:helvetica;
			}
			h1{
				font-size: 30px;
				color:white;
				margin-bottom: 0px;
				top:300px;
				left:200px;
			}
			h2{
				font-size: 56px;
				margin-bottom: 0px;
			}
		</style>
	</head>

	<body>

		<ul class="parallax">
			<li>
				<div class="parallax-background twitter"></div>
				<div class="subcontent">
					<h1><a href="redirect.php">Sign in to Twitter</a></h1>
				</div>	
			</li>

			<li>
				<div class="parallax-background lens"></div>	
				
			</li>

			<li>
				<div class="parallax-background beach"></div>	
			</li>

			<li>
				<div class="parallax-background wolf"></div>	
			</li>
		</ul>	

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script>

		(function($) {

			var $container = $(".parallax");
			var $divs = $container.find("div.parallax-background");
			var thingBeingScrolled = document.body;
			var liHeight = $divs.eq(0).closest("li").height();
			var diffHeight = $divs.eq(0).height() - liHeight;

			var i, len, div, li, offset, scroll;

			var render = function(){

				//things were scrolling
				top = thingBeingScrolled.scrollTop;

				for(i = 0, len=$divs.length; i < len; i++){

					//get one div
					div = $divs[i];

					//get the parent LI
					//li = div.parentNode;

					//calculate the offseTop of div
					offset = $(div).offset().top;

					//calculate the amount to scroll
					scroll = Math.round(((top - offset) / liHeight) * diffHeight);

					//apply the scroll amount
					div.style.webkitTransform = "translate3d(0px, "+scroll+"px,0px)";

				}

			};

			(function loop(){

				requestAnimationFrame(loop);
				render();

			})();

		})(jQuery);

		</script>
	</body>
</html>
<?php
?>
