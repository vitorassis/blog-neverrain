@php $lang = app()->getLocale(); @endphp

@extends('layouts.master')

@section('banner-img', asset('img/home-banner.jpg'))

@section('title', 'blog');

@section('conteudo')
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
    <div class="row">
        <div class="col-md-12 text-center">
            {{$noticias->links()}}
        </div>
    </div>
@endsection