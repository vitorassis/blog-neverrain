@extends('layouts.app')

@section('content')    
    <div class="container">
        <div class="row"><h1>Novo Jogo</h1></div>
        <form action="/ademiro/jogos/store" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row form-group">
                <div class="col-md-6 text-right"><label for="nome">Nome:</label></div>
                <div class="col-md-4">
                    <input type="text" name="nome" class="form-control" id="nome" required>
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
                    <input type="hidden" name="plataformas" id="platfs" value="[]">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-6 text-right"><label for="data_lancamento">Data de Lançamento:</label></div>
                <div class="col-md-4">
                    <input type="date" name="data_lancamento" class="form-control" id="data_lancamento" required>
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
                                    <td><label for="titulo_empolg_{{$lang}}">{{$lang}}</label></td>
                                    <td><input type="text" name="titulo_empolg_{{$lang}}" class="form-control" id="titulo_empolg_{{$lang}}" required></td>
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
                                    <td><label for="descricao_empolg_{{$lang}}">{{$lang}}</label></td>
                                    <td><textarea name="descricao_empolg_{{$lang}}" class="form-control" id="descricao_empolg_{{$lang}}" cols="30" rows="10" required></textarea></td>
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
            <div class="row">Press Kit:</div>
            <div class="row"><input type="file" class="form-control" name="press_kit" accept=".zip,.rar,.7zip" required ></div>
            <div class="row">Carrossel:</div>
            <div class="row"><input type="file" class="form-control" name="carousel_pic[]" accept="image/*" multiple required></div>
            <div class="row">Imagem empolgante:</div>
            <div class="row"><input type="file" class="form-control" name="empolg_pic" accept="image/*" required></div>
            <div class="row">Trailer YouTube:</div>
            <div class="row"><input type="text" class="form-control" name="trailer_vid" required></div>
            <div class="row">Vídeo de fundo (vimeo):</div>
            <div class="row"><input type="text" class="form-control" name="bkgd_vid" required></div>
            <div class="row">Embed Links (Um por linha):</div>
            <div class="row"><textarea class="form-control" name="links"></textarea></div>
            <div class="row">
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>

        </form>
    </div>
@endsection