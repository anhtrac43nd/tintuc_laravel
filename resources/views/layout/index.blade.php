<!DOCTYPE HTML>
<!-- BEGIN html -->
<html lang = "en">
	<!-- BEGIN head -->
	
<!-- Giao dien duoc chia se mien phi tai www.ptheme.net [Free HTML Download]. SKYPE[ptheme.net] - EMAIL[ptheme.net@gmail.com].-->
<head>
		<title>Sendigo | Homepage</title>

		<!-- Meta Tags -->
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="description" content="" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

		<!-- Favicon -->
		<link rel="shortcut icon" href="sendigo/images/favicon.png" type="image/x-icon" />

		<!-- Stylesheets -->
		<link type="text/css" rel="stylesheet" href="sendigo/css/reset.css" />
		<link type="text/css" rel="stylesheet" href="sendigo/css/font-awesome.min.css" />
		<link type="text/css" rel="stylesheet" href="sendigo/css/weather-icons.min.css" />
		<link href='http://fonts.googleapis.com/css?family=Noto+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Arvo:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
		<link type="text/css" rel="stylesheet" href="sendigo/css/bootstrap.min.css" />
		<link type="text/css" rel="stylesheet" href="sendigo/css/dat-menu.css" />
		<link type="text/css" rel="stylesheet" href="sendigo/css/main-stylesheet.css" />
		<link type="text/css" rel="stylesheet" href="sendigo/css/ot-lightbox.css" />
		<link type="text/css" rel="stylesheet" href="sendigo/css/shortcodes.css" />
		<link type="text/css" rel="stylesheet" href="sendigo/css/responsive.css" />
		@yield('css')
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<!--[if lte IE 8]>
		<link type="text/css" rel="stylesheet" href="css/ie-ancient.css" />
		<![endif]-->

		<style>
			/* Custom CSS colors and fonts */

			/*
				Main body font size, font, color
				default:
					font-size: 16px;
					font-family: 'Noto Sans', sans-serif;
					color: #5e5e5e;
			*/
			body {
				font-size: 16px;
				font-family: 'Noto Sans', sans-serif;
				color: #5e5e5e;
			}

			/*
				Custom font for titles
				default:
					font-family: 'Arvo', serif;
					color: #3f3f3f;
			*/
			h1, h2, h3, h4, h5, h6 {
				font-family: 'Arvo', serif;
				color: #3f3f3f;
			}
		</style>

		<!-- Demo Only -->
		<link type="text/css" rel="stylesheet" href="sendigo/css/demo-settings.css" />

	<!-- END head -->
	</head>

	<!-- BEGIN body -->
	<!-- <body> -->
	<body class="ot-menu-will-follow">

		<div class="op-jumplist">
			<div class="ot-jumplist-front">
				<a href="#ot-jumplist" class="launch-button"><strong>Category Jumplist <i class="fa fa-arrow-up"></i></strong></a>
				<a href="#" target="_blank" class="jump-soc-icon hover-color-facebook"><i class="fa fa-facebook"></i></a>
				<a href="#" target="_blank" class="jump-soc-icon hover-color-twitter"><i class="fa fa-twitter"></i></a>
				<a href="#" target="_blank" class="jump-soc-icon hover-color-google-plus"><i class="fa fa-google-plus"></i></a>
			</div>
			<div class="ot-jumplist-back">
				<a href="#ot-jumplist" class="launch-button"><strong>Close Jumplist<i class="right fa fa-times"></i></strong></a>
				<ul>
					<li><a href="index-2.html">Homepage</a></li>
					<li><a href="category.html">Nature is awesome</a></li>
					<li><a href="category.html">We look at todays fashion</a></li>
					<li><a href="category.html">Car &amp; Racing world</a></li>
					<li><a href="category.html">The urban news</a></li>
				</ul>
			</div>
		</div>

		<!-- BEGIN .boxed -->
		<div class="boxed">
			
			<!-- BEGIN .header -->
			@include('layout.header')
			
			<!-- BEGIN .content -->
			@yield('content')
			
			<!-- BEGIN .footer -->
			@include('layout.footer')
			
		<!-- END .boxed -->
		</div>
		@yield('script')
		<!-- Scripts -->
		<script type="text/javascript" src="sendigo/jscript/jquery-latest.min.js"></script>
		<script type="text/javascript" src="sendigo/jscript/bootstrap.min.js"></script>
		<script type="text/javascript" src="sendigo/jscript/modernizr.custom.50878.js"></script>
		<script type="text/javascript" src="sendigo/jscript/iscroll.js"></script>
		<script type="text/javascript" src="sendigo/jscript/dat-menu.js"></script>
		<script type="text/javascript" src="sendigo/jscript/theme-scripts.js"></script>
		<script type="text/javascript" src="sendigo/jscript/ot-lightbox.js"></script>
		<!-- Demo Only -->
		<script type="text/javascript" src="sendigo/jscript/demo-settings.js"></script>

	<!-- END body -->
	</body>
<!-- END html -->

<!-- Giao dien duoc chia se mien phi tai www.ptheme.net [Free HTML Download]. SKYPE[ptheme.net] - EMAIL[ptheme.net@gmail.com].-->
</html>