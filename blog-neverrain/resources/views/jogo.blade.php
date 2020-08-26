@php $lang = app()->getLocale(); @endphp
@extends('layouts.master')

@section('bkgd_vid', $j_view->midias->where('tipo', 'bkgd_vid')->first()->link)

@section('title', $j_view->nome)

@section('banner-img', asset($j_view->midias->where('tipo', 'head_pic')->first()->link))

@php
    $carousel = $j_view->midias->where('tipo', 'carousel_pic');   
@endphp

@section('conteudo')
    <center>
        <br><h1>{{__("games.screenshots")}}</h1><br>
    </center>
    <div id="carouselScreenshots" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @for($i=0; $i<sizeof($carousel); $i++)
                <li data-target="#carouselScreenshots" data-slide-to="{{$i}}" @if($i == 0) class="active" @endif></li>
            @endfor
        </ol>
        <div class="carousel-inner">
            @php $i=0; @endphp
            @foreach($carousel as $pic)
                <div class="carousel-item @if($i==0) active @endif">
                    <img class="d-block w-100" src="{{ asset($pic->link) }}" alt="{{$pic->alt}}"> 
                </div>
                @php $i++; @endphp
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselScreenshots" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">{{__("master.previous")}}</span>
        </a>
        <a class="carousel-control-next" href="#carouselScreenshots" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">{{__("master.next")}}</span>
        </a>
      </div>
    <center>

        <!--================Start About Us Area =================-->
        <section class="about_us_area section_gap_top">
            <div class="container">
                <div class="row about_content align-items-center">
                    <div class="col-lg-6">
                        <div class="section_content">						
                            <h1>{{$j_view->textos->where('tipo', 'titulo_empolg')->first()->texto}}</h1>
                            <p>{{$j_view->textos->where('tipo', 'descricao_empolg')->first()->texto}}</p>
                            
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about_us_image_box justify-content-center">
                            <img class="img-fluid w-100" src="{{asset($j_view->midias->where('tipo', 'empolg_pic')->first()->link)}}" alt="{{$j_view->midias->where('tipo', 'empolg_pic')->first()->alt}}">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End About Us Area =================-->
        <br>
        <strong>{{trans_choice("games.platforms", sizeof($j_view->plataformas))}}:</strong>
        @foreach ($j_view->plataformas as $plataforma)
            <a href="{{$plataforma->link}}">{{$plataforma->nome}}</a> | 
        @endforeach
        <br>
        <strong>{{__("games.releasedate")}}: </strong>{{explode(" ",$j_view->data_lancamento)[0]}}
        <p>
            {{ $j_view->textos->where('tipo', 'descricao')->first()->texto }}    
            
                <br>
            @if(sizeof($j_view->midias->where('tipo', 'trailer_vid')) > 0)
                <h1> {{__("games.watchtrailer")}}:</h1>
                <iframe width="560" height="315" src="{{$j_view->midias->where('tipo', 'trailer_vid')->first()->link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            @endif
                <br>
            @if(sizeof($j_view->midias->where('tipo', 'embed_lnk')) > 0)
                <h1>{{__("games.wherebuy")}}:</h1>
                <br>
                @foreach($j_view->midias->where('tipo', 'embed_lnk') as $link)
                    @if($link->alt == "embed")
                        <iframe frameborder="0" src="{{$link->link}}" width="552" height="167"></iframe>
                    @elseif($link->alt == "button")
                        <a href="{{$link->link}}" class="btn {{$link->miscellanea}}" target="_blank">
                            <i class="icon"></i>
                            <span class="content"></span>
                        </a>
                    @endif
                    <br><br>
                @endforeach
            @endif
        </p>
    </center>
    @if(sizeof($noticias) > 0)
        <br>
        <div class="row text-center">
            <div class="col-md-12">
                <h1>{{__("games.relatednews")}}</h1>
            </div>
        </div>
        @foreach ($noticias as $noticia)        
            <a href="/{{$lang}}/blog/{{$noticia->id}}">
                <div class="row text-center">
                    <div class="col-md-6"><img width="360" src="{{ asset($noticia->midias->first()->link) }}" alt="{{ $noticia->midias->first()->alt }}"></div>
                    <div class="col-md-6">
                        <h1><div class="row">{{ $noticia->textos->where('tipo', 'titulo')->first()->texto }}</div></h1>
                        {{-- <div class="row">
                            {{ $jogo->textos->first()->texto }}
                        </div> --}}
                    </div>
                </div>
            </a>
        @endforeach
    @endif
@endsection