@php 
	$titleYield = app()->view->getSections()['title']; 
	$lang = app()->getLocale();

	$title = Lang::has("master.".$titleYield, $lang) ? __("master.".$titleYield) : $titleYield;
	
@endphp

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/png">
        <title>{{$title}} - Never Rain Studios</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}">
        {{-- <link rel="stylesheet" href="{{ asset('css/linericon/style.css') }}"> --}}
        <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/owl-carousel/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/lightbox/simpleLightbox.css') }}">
        <link rel="stylesheet" href="{{ asset('css/nice-select/css/nice-select.css') }}">
        <link rel="stylesheet" href="{{ asset('css/animate-css/animate.css') }}">
        <!-- main css -->
        <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('css/responsive.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('css/buttons-misc.css') }}">
		<style>
			iframe.bkgd {
				box-sizing: border-box;
				height: 56.25vw;
				left: 50%;
				min-height: 100%;
				min-width: 100%;
				transform: translate(-50%, -50%);
				position: absolute;
				top: 50%;
				width: 177.77777778vh;
			}
		</style>
    </head>
    <body style="overflow-x: hidden">

		<!--================Header Menu Area =================-->
		<header class="header_area">
			<div class="main_menu">
				<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<a class="navbar-brand logo_h" href="/{{$lang}}"><img src="{{ asset('img/logo.png') }}" alt=""></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
						aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
							<ul class="nav navbar-nav menu_nav justify-content-center">
								<li class="nav-item active"><a class="nav-link" href="/{{$lang}}">{{ __("master.home") }}</a></li>
								<li class="nav-item submenu dropdown">
									<a href="/{{$lang}}/games" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
									aria-expanded="false">{{__("master.games")}}</a>
									<ul class="dropdown-menu">
										@foreach ($jogos as $jogo)
											<li class="nav-item"><a class="nav-link" href="/{{$lang}}/games/{{$jogo->nome}}">{{$jogo->nome}}</a>
										@endforeach
										{{-- <li class="nav-item"><a class="nav-link" href="nevermuseum">Never Rain Museum</a> --}}
									</ul>
								</li>							
								<li class="nav-item"><a class="nav-link" href="/{{$lang}}/blog">{{__("master.blog")}}</a></li>
								<li class="nav-item"><a class="nav-link" href="/{{$lang}}/about-us">{{__("master.whoarewe")}}</a></li>
								<li class="nav-item"><a class="nav-link" href="/{{$lang}}/press-kit">{{__("master.presskit")}}</a></li>
								
								<li class="nav-item"><a class="nav-link" href="/{{$lang}}/contact">{{__("master.contact")}}</a></li>
							</ul>
							<!--
								<ul class="nav navbar-nav navbar-right">
								<li class="nav-item"><a href="#" class="primary_btn">join us</a></li>
							</ul>
							-->
						</div>
					</div>
				</nav>
			</div>
		</header>
		<!--================Header Menu Area =================-->
	
		<!--================Home Banner Area =================-->
		@if(isset(app()->view->getSections()['bkgd_vid']))
			<section class="banner_area">		
				<iframe src="@yield('bkgd_vid')" class="bkgd" width="100%" height=100% frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>

				<div class="banner_inner d-flex align-items-center">
					<div class="container">
						<div class="banner_content text-center">
							<h2>{{$title}}</h2>
						</div>
					</div>
				</div>
			</section>
		@elseif(!isset(app()->view->getSections()['header_complex']))
			<section class="banner_area">		
				<div class="banner_inner d-flex align-items-center" style="background-image: url('@yield('banner-img')')">
					<div class="container">
						<div class="banner_content text-center">
							<h2>{{$title}}</h2>
						</div>
					</div>
				</div>
			</section>

		@else
			<section class="home_banner_area">
				<div class="banner_inner d-flex align-items-center" style="background-image: url('@yield('banner-img')')">
					
					<div class="container">
						<div class="row">
							<div class="banner_content text-center">
								@yield('header_complex')
							</div>
						</div>
					</div>
				</div>
			</section>
			
		@endif
		<!--================End Home Banner Area =================-->
		<!--CONTEÚDO DA PAGINA-->
		
		{{-- <div class="container"> --}}
			@yield('conteudo')
		{{-- </div> --}}
		
		<!--FIM CONTEUDO PAGINA-->
		
		
		<!--================Footer Area =================-->
		<footer class="footer_area section_gap_top">
			<div class="container">
				<div class="row footer_inner">
					<div class="col-lg-3 col-sm-6">
						<aside class="f_widget ab_widget">
							<div class="f_title">
								<h4><a href="/{{$lang}}/games">{{__("master.games")}}</a></h4>
							</div>
							<ul>
								@foreach ($jogos as $jogo)
									<li><a href="/{{$lang}}/games/{{$jogo->nome}}">{{$jogo->nome}}</a></li>
								@endforeach
							</ul>
						</aside>
					</div>
					<div class="col-lg-3 col-sm-6">
						<aside class="f_widget ab_widget">
							<div class="f_title">
								<h4>{{__("master.stuffs")}}</h4>
							</div>
							<ul>
								<li><a href="/{{$lang}}/about-us">{{__("master.whoarewe")}}</a></li>
									<li><a href="/{{$lang}}/contact">{{__("master.contact")}}</a></li>
														</ul>
						</aside>
					</div>				
				</div>
				<div class="row single-footer-widget">
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="copy_right_text">
							<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
	Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
	<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
						</div>
					</div>
					{{-- <div class="col-lg-6 col-md-6 col-sm-12">
						<div class="social_widget">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>
					</div> --}}
				</div>
			</div>
		</footer>
		<!--================End Footer Area =================-->
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="{{ URL::asset('js/jquery-3.2.1.min.js') }}"></script>
		<script src="{{ URL::asset('js/popper.js') }}"></script>
		<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
		<script src="{{ URL::asset('js/stellar.js') }}"></script>
		<script src="{{ URL::asset('js/jquery.magnific-popup.min.js') }}"></script>
		<script src="{{ URL::asset('css/nice-select/js/jquery.nice-select.min.js') }}"></script>
		<script src="{{ URL::asset('css/isotope/imagesloaded.pkgd.min.js') }}"></script>
		<script src="{{ URL::asset('css/isotope/isotope-min.js') }}"></script>
		<script src="{{ URL::asset('js/owl.carousel.min.js') }}"></script>
		<script src="{{ URL::asset('js/jquery.ajaxchimp.min.js') }}"></script>
		<script src="{{ URL::asset('css/counter-up/jquery.waypoints.min.js') }}"></script>
		<script src="{{ URL::asset('css/counter-up/jquery.counterup.min.js') }}"></script>
		<script src="{{ URL::asset('js/mail-script.js') }}"></script>
		<!--gmaps Js-->
		{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
		<script src="js/gmaps.min.js"></script>
		<script src="js/theme.js"></script> --}}
	</body>
</html>