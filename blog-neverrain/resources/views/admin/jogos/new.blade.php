@extends('layouts.app')


@section('content')
@php  @endphp
    
    <div class="container">
        <div class="row"><h1>Novo Jogo</h1></div>
        <form action="./store" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row form-group">
                <div class="col-md-6 text-right"><label for="nome">Nome:</label></div>
                <div class="col-md-4">
                    <input type="text" name="nome" class="form-control" id="nome" required>
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
                                <td>Língua</td>
                                <td>Texto</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($langs as $lang)
                                <tr>
                                    <td><label for="titulo_empolgante_{{$lang}}">{{$lang}}</label></td>
                                    <td><input type="text" name="titulo_empolgante_{{$lang}}" class="form-control" id="titulo_empolgante_{{$lang}}" required></td>
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
                                <td>Língua</td>
                                <td>Texto</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($langs as $lang)
                                <tr>
                                    <td><label for="descricao_empolgante_{{$lang}}">{{$lang}}</label></td>
                                    <td><textarea name="descricao_empolgante_{{$lang}}" class="form-control" id="descricao_empolgante_{{$lang}}" cols="30" rows="10" required></textarea></td>
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
                                <td>Língua</td>
                                <td>Texto</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($langs as $lang)
                                <tr>
                                    <td><label for="descricao_{{$lang}}">{{$lang}}</label></td>
                                    <td><textarea name="descricao_{{$lang}}" class="form-control" id="descricao_{{$lang}}" cols="30" rows="10" required></textarea></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <hr>
            <div class="row">
                <h3>Mídias</h3>
            </div>
            <div class="row">Imagem da capa:</div>
            <div class="row"><input type="file" class="form-control" name="head_pic" accept="image/*" required ></div>
            <div class="row">Carrossel:</div>
            <div class="row"><input type="file" class="form-control" name="carousel_pic[]" accept="image/*" multiple required></div>
            <div class="row">Imagem empolgante:</div>
            <div class="row"><input type="file" class="form-control" name="empolg_pic" accept="image/*" required></div>
            <div class="row">Trailer YouTube:</div>
            <div class="row"><input type="text" class="form-control" name="trailer_vid" required></div>
            <div class="row">Embed Links (Um por linha):</div>
            <div class="row"><textarea class="form-control" name="links"></textarea></div>
            <div class="row">
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>

        </form>
    </div>
@endsection