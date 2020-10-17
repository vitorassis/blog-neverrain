@php $lang = app()->getLocale(); @endphp

@extends('layouts.master')

@section('banner-img', asset('img/home-banner.jpg'))

@section('title', 'blog');

@section('conteudo')
    <div class="row">
        <div class="col-md-12 text-center">
            <h1>{{trans('blog.newstag', ['tag'=> $tag->nome])}} </h1>
        </div>
    </div>
    @foreach ($noticias as $noticia)        
        <a href="/{{$lang}}/blog/{{$noticia->textos->where('tipo', 'titulo')->first()->texto}}">
            <div class="row text-center">
                <div class="col-md-6"><img width="360" src="{{ asset($noticia->midias->first()->link) }}" alt="{{ $noticia->midias->first()->alt }}"></div>
                <div class="col-md-6">
                    <div class="row">
                        <h1>
                            {{ $noticia->textos->where('tipo', 'titulo')->first()->texto }}
                        </h1>
                    </div>

                </div>
            </div>
        </a>
    @endforeach
    <div class="row">
        <div class="col-md-12 text-center">
            {{$noticias->links()}}
        </div>
    </div>
@endsection