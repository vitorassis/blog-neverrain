@php $lang = app()->getLocale(); @endphp

@extends('layouts.master')

@section('title', 'games')

@section('banner-img', asset('img/home-banner.jpg'))

@section('conteudo')
    @foreach ($jogos as $jogo)
        <a href="/{{$lang}}/games/{{$jogo->nome}}">
            <div class="row text-center">
                <div class="col-md-6"><img src="{{ asset($jogo->midias[0]->link) }}" alt="{{ $jogo->midias[0]->alt }}"></div>
                <div class="col-md-6">
                    <h1><div class="row">{{ $jogo->nome }}</div></h1>
                    <div class="row">
                        {{ $jogo->descricao_empolgante }}
                    </div>
                </div>
            </div>
        </a>
    @endforeach
@endsection