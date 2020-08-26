@extends('layouts.master');

@section('title', 'Press Kit')

@section('conteudo')
    <div class="cotainer">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Press Kit</h1>
            </div>
        </div>
        @foreach ($jogos as $jogo)
            <hr>
            <div class="row mt-10">
                <div class="col-md-12 text-center">
                    <h2>{{$jogo->nome}}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    Download: 
                    <a href="{{asset($jogo->midias->first()->link)}}" target="_blank">
                        Clique aqui
                    </a>
                </div>
            </div>
        @endforeach
    </div>    
@endsection