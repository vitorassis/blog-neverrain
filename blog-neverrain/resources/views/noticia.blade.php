@php $lang = app()->getLocale(); @endphp

@extends('layouts.master')

@section('banner-img', asset('img/home-banner.jpg'))

@section('title', $noticia->textos->where('tipo', 'titulo')->first()->texto);

@section('conteudo')
    <div class="row">
        <div class="col-md-6 text-right">
            <img src="{{asset($noticia->midias->first()->link)}}" alt="{{$noticia->midias->first()->link}}">
        </div>
        <div class="col-md-6">
            <div class="row">
                <strong>{{__("blog.date")}}: </strong>&nbsp;{{explode(" ",$noticia->data_publicacao)[0]}}
            </div>
            <div class="row">
                <strong>{{__("blog.tags")}}: </strong> 
                @foreach ($noticia->tags as $tag)
                
                    {!!$tag->draw($lang)!!}
                    
                @endforeach
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <p>{{$noticia->textos->where('tipo', 'corpo')->first()->texto}}</p>
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection