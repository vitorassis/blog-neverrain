@extends('layouts.master')

@php 
	$lang = app()->getLocale();
@endphp

@section('title', 'welcome')

@section('banner-img', asset('img/home-banner.jpg'))

@section('header_complex')
    <div class="row">
        <div class="col-lg-6">
            <div class="home_left_img">
                <img class="img-fluid" src="{{asset('img/home-left.png')}}" alt="">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="banner_content">
                <h2>
                    {{__("index.inovation")}}   <br>
                    {{__("index.quality")}} <br>
                    {{__("index.depth")}}
                </h2>
                <p>
                    {{__("index.desc")}}
                </p>
                
            </div>
        </div>
    </div>
@endsection

@section('conteudo')
    <section class="about_us_area section_gap_top">
        <div class="container">
            <div class="row about_content align-items-center">
                <div class="col-lg-6">
                    <div class="section_content">
                        <h6>{{__("master.whoarewe")}}</h6>
                        <h1>
                            {{__("index.aboutus.title")}} <br>{{__("index.aboutus.subtitle")}}</h1>
                        <p>{{__("index.aboutus.text")}}</p>
                        <a class="primary_btn" href="/{{$lang}}/about-us">{{__("index.seemore")}}</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about_us_image_box justify-content-center">
                        <img class="img-fluid w-100" src="{{__('img/about_img.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="gallery_area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="main_title">
						<h2>{{__("games.screenshots")}}</h2>
						<h1>{{__("games.screenshots")}}</h1>
					</div>
				</div>
			</div>
			
			<div class="row">
                <div class="col-lg-12">
                    <div id="screenshotGallery" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                          <li data-target="#screenshotGallery" data-slide-to="0" class="active"></li>
                          <li data-target="#screenshotGallery" data-slide-to="1"></li>
                          <li data-target="#screenshotGallery" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img class="d-block w-100" src="{{asset('img/gallery_img3.png')}}" alt="First slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('img/recent_up_bg.png')}}" alt="Second slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('img/blog_img3.png')}}" alt="Third slide">
                          </div>
                        </div>
                        <a class="carousel-control-prev" href="#screenshotGallery" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#screenshotGallery" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                </div>
            </div>

		</div>
	</section>
@stop