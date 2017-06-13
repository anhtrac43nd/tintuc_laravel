<header class="header">

	<!-- BEGIN .top-menu -->

	
	<!-- BEGIN .wrapper -->
	<div class="wrapper">

		<!-- BEGIN .header-main -->
		<div class="header-main">

			<div class="header-main-logo">
				<!-- <h1><a href="index.html">Sendigo</a></h1> -->
				<a href="index-2.html"><img src="sendigo/images/logo.png" alt="" data-ot-retina="images/logo@2x.png" /></a>
			</div>

			<div class="header-main-weather">
				<div class="weather-block">
					<i class="wi wi-day-lightning"></i>
					<strong>Jurmala, Latvia</strong>
					<span>+3&deg;C, Light rain</span>
				</div>
			</div>

			<div class="header-main-search">
				<div class="search-block">
					<form action="http://sendigo.orange-themes.com/html/blog.html">
						<input type="text" placeholder="Search something.." value="" />
					</form>
				</div>
			</div>

		<!-- END .header-main -->
		</div>
		<nav class="main-menu">
			<a href="#dat-menu" class="dat-menu-button"><i class="fa fa-bars"></i>Show Menu</a>
			<div class="main-menu-placeholder">
				<div class="main-menu-wrapper">
					<div class="menu-search-thing">
						<form action="http://sendigo.orange-themes.com/html/blog.html">
							<input type="text" placeholder="Search something.." />
							<input type="submit" value="Search" />
						</form>
						<button><i class="fa fa-search"></i></button>
					</div>
					<ul class="top-main-menu load-responsive" rel="Main Menu">
						<li><a href="index-2.html">Homepage</a></li>
						@foreach ($theloai as $tl)
							@if(count($tl->loaitin)>0)
								<li><a href="blog.html"><span>{{$tl->Ten}}</span></a>
									<ul class="sub-menu">
										@foreach($tl->loaitin as $lt)
										<li><a href="blog2.html">{{$lt->Ten}}</a></li>
										@endforeach
									</ul>
								</li>
						@endif
						@endforeach
					</ul>


				</div>
			</div>
		</nav>
		
	<!-- END .wrapper -->
	</div>
	
<!-- END .header -->
</header>