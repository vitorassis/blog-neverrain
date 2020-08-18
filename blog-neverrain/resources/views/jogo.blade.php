@extends('layouts.master')

@section('title', $j_view->nome)

@section('banner-img', asset($j_view->r_midias["head_pic"][0]->link))

@section('conteudo')
    <center>
        <br><h1>{{__("games.screenshots")}}</h1><br>
    </center>
    <div id="carouselScreenshots" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @for($i=0; $i<sizeof($j_view->r_midias['carousel_pic']); $i++)
                <li data-target="#carouselScreenshots" data-slide-to="{{$i}}" @if($i == 0) class="active" @endif></li>
            @endfor
        </ol>
        <div class="carousel-inner">
            @for($i=0; $i<sizeof($j_view->r_midias['carousel_pic']); $i++)
                <div class="carousel-item @if($i==0) active @endif">
                    <img class="d-block w-100" src="{{ asset($j_view->r_midias['carousel_pic'][$i]->link) }}" alt="{{$j_view->r_midias['carousel_pic'][$i]->alt}}"> 
                </div>
            @endfor
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
                    <h1>{{$j_view->titulo_empolgante}}</h1>
                    <p>{{$j_view->descricao_empolgante}}</p>
                    
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about_us_image_box justify-content-center">
                    <img class="img-fluid w-100" src="{{asset($j_view->r_midias['empolg_pic'][0]->link)}}" alt="{{$j_view->r_midias['empolg_pic'][0]->alt}}">
                </div>
            </div>
        </div>
    </div>
    </section>
    <!--================End About Us Area =================-->

        <p>
            {{ $j_view->descricao }}    
            
                <br>
            @if(isset($j_view->r_midias['trailer_vid']))    
                <h1> Assista ao trailer:</h1>
                <iframe width="560" height="315" src="{{$j_view->r_midias['trailer_vid'][0]->link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            @endif
                <br>
            @if(isset($j_view->r_midias['embed_lnk']))
                <h1>Onde Comprar:</h1>
                <br>
                @foreach($j_view->r_midias['embed_lnk'] as $link)
                    <iframe frameborder="0" src="{{$link->link}}" width="552" height="167"></iframe>
                @endforeach
            @endif
        </p>
        </center>

    </iframe>
@endsection