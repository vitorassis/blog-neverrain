@extends('layouts.app')


@section('content')
@php  @endphp
    
    <div class="container">
        <div class="row"><h1>Alterar Jogo</h1></div>
        <div class="row">
            <a href="./midia/{{$jogo->id}}" class="btn btn-primary">Alterar mídias</a>
        </div>
        <form action="./{{$jogo->id}}" method="post">
            @csrf
            <div class="row form-group">
                <div class="col-md-6 text-right"><label for="nome">Nome:</label></div>
                <div class="col-md-4">
                    <input type="text" name="nome" class="form-control" id="nome" value="{{$jogo->nome}}" required>
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
                                    <td><label for="titulo_empolgante_{{$lang}}">{{$lang}}</label></td>
                                    <td><input type="text" name="titulo_empolgante_{{$lang}}" class="form-control" id="titulo_empolgante_{{$lang}}" value="{{json_decode($jogo->titulo_empolgante)->$lang}}" required></td>
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
                                    <td><label for="descricao_empolgante_{{$lang}}">{{$lang}}</label></td>
                                    <td><textarea name="descricao_empolgante_{{$lang}}" class="form-control" id="descricao_empolgante_{{$lang}}" cols="30" rows="10" required>{{json_decode($jogo->descricao_empolgante)->$lang}}</textarea></td>
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
                                    <td><textarea name="descricao_{{$lang}}" class="form-control" id="descricao_{{$lang}}" cols="30" rows="10" required>{{json_decode($jogo->descricao)->$lang}}</textarea></td>
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