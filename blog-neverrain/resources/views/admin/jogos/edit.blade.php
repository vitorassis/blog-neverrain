@extends('layouts.app')

@section('content')
@php  @endphp
    
    <div class="container">
        <div class="row"><h1>Alterar Jogo</h1></div>
        <div class="row">
            <a href="/ademiro/jogos/edit/midia/{{$jogo->id}}" class="btn btn-primary">Alterar mídias</a>
        </div>
        <form action="/ademiro/jogos/edit/{{$jogo->id}}" method="post">
            @csrf
            <div class="row form-group">
                <div class="col-md-6 text-right"><label for="nome">Nome:</label></div>
                <div class="col-md-4">
                    <input type="text" name="nome" class="form-control" id="nome" value="{{$jogo->nome}}" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-6 text-right"><label for="nome">Plataformas:</label></div>
                <div class="col-md-4">
                    <div class="container-select">
                        <div class="tag-container">

                            <select name="plataformas" id="plataformas" class="form-control" onchange="selectEvent()">
                                <option></option>
                                @foreach($plataformas as $plat)
                                    <option value="{{$plat->nome}}">{{$plat->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="plataformas" id="platfs" value="{{$jogo->plataformas}}">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-6 text-right"><label for="data_lancamento">Data de Lançamento:</label></div>
                <div class="col-md-4">
                    <input type="date" name="data_lancamento" class="form-control" id="data_lancamento" value="{{explode(" ", $jogo->data_lancamento)[0]}}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center">Título Empolgante:</div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <table>
                        <thead>
                            <tr>
                                <th>Língua</th>
                                <th>Texto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($langs as $lang)
                                <tr>
                                    <td><label for="titulo_empolg_{{$lang}}">{{$lang}}</label></td>
                                    <td><input type="text" name="titulo_empolg_{{$lang}}" class="form-control" id="titulo_empolg_{{$lang}}" value="{{$jogo->textos->where('tipo', 'titulo_empolg')->where('lang', $lang)->first()->texto}}" required></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">Descrição Empolgante:</div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <table>
                        <thead>
                            <tr>
                                <th>Língua</th>
                                <th>Texto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($langs as $lang)
                                <tr>
                                    <td><label for="descricao_empolg_{{$lang}}">{{$lang}}</label></td>
                                    <td><textarea name="descricao_empolg_{{$lang}}" class="form-control" id="descricao_empolg_{{$lang}}" cols="30" rows="10" required>{{$jogo->textos->where('tipo', 'descricao_empolg')->where('lang', $lang)->first()->texto}}</textarea></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">Descrição:</div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <table>
                        <thead>
                            <tr>
                                <th>Língua</th>
                                <th>Texto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($langs as $lang)
                                <tr>
                                    <td><label for="descricao_{{$lang}}">{{$lang}}</label></td>
                                    <td><textarea name="descricao_{{$lang}}" class="form-control" id="descricao_{{$lang}}" cols="30" rows="10" required>{{$jogo->textos->where('tipo', 'descricao')->where('lang', $lang)->first()->texto}}</textarea></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>

        </form>
        
    </div>
@endsection