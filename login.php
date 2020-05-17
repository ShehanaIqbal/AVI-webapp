<!DOCTYPE HTML>
<html>

<head>
	<title>AVI registration</title>
	<style>
		.login {
			margin-top: 0;
		}

		.login h3 {
			color: blue;
		}
	</style>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Web application integrated to the AVI system which is developed for automatic vehicle number plate recognition" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<script src="js/jquery-1.8.3.min.js"></script>
	<!---- start-smoth-scrolling---->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1200);
			});
		});
	</script>
	<!---End-smoth-scrolling---->

</head>

<body>
	<div class="header">
		<div class="container">
			<div class="header-top">
				<div class="logo">
				<a href="index.php">
				<img alt="AVI" src="images/logo.png" width="70px" height="70px" style="margin-top:30px">
				</a>
					<!-- <a style="color: #0b0b0b" href="index.php">A V I</a> -->
				</div>
				<!-- <div class="top-menu">
					<span class="menu"><img src="images/nav.png" alt="" /> </span>
					<ul>
						<li><a style="color: #0b0b0b" href="index.php">home</a></li>
						<li><a style="color: #0b0b0b" href="about.php">about</a></li> -->
						<!-- <li><a style="color: #0b0b0b" href="index.php">logout</a></li> -->
					<!-- </ul>
				</div> -->
				<!--script-nav-->
				<script>
					$("span.menu").click(function() {
						$(".top-menu ul").slideToggle("slow", function() {});
					});
				</script>
				<div class="clearfix"></div>
			</div>
		</div Slider-starts-Here -->
		<script src="js/responsiveslides.min.js"></script>
		<script>
			$(function() {
				$("#slider").responsiveSlides({
					auto: true,
					nav: false,
					speed: 500,
					namespace: "callbacks",
					pager: true,
				});
			});
		</script>

	</div>
			</div>

		</div> 
	</div>
	<div  class="row" style="margin-bottom:150px;">
		<div class="col-xs-6">
			<div style="margin-top:120px; margin-left:80px;">
				<div class="container login">
					<img src="images/avatar.png" alt="AVATAR" style="width:225px;height:200px; margin-left : 80px; margin-bottom : 20px;">
				</div>
				<div class="col-md-6 login-form">
					<h3 style="font-family: sans-serif; color : #005b48; margin-bottom : 20px; margin-left : 75px;">Welcome!</h3>
					<form action="./PHP/manager.php" method="post">
						<input type="text" name="username" placeholder="Username" required=""><br>
						<input type="text" name="password" placeholder="Password" required=""><br>
						<input style="padding-left: 30px; padding-right: 30px" type="submit" value="SEND" name="login_admin" />
					</form>
				</div>
			</div>
		</div>
		
		<div class="col-xs-6">
			<img src="images/login.png" alt="login image" style="width:500px;height:350px; margin-top : 200px">

		</div>
		<div class="clearfix"> </div>

	</div>
	<!-- //container -->
	<!-- //mail -->
	<!--footer-->

</body>

</html>