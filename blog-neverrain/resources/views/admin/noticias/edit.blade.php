@extends('layouts.app')

@section('content')    
    <div class="container">
        <div class="row"><h1>Nova Notícia</h1></div>
        <form action="/ademiro/noticias/edit/{{$noticia->id}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row form-group">
                <div class="col-md-6 text-right"><label for="nome">Tags:</label></div>
                <div class="col-md-4">
                    <div class="container-select">
                        <div class="tag-container tgs">

                            <select id="tags" class="form-control" onchange="selectEventTag()">
                                <option></option>
                                @foreach($tags as $tag)
                                    <option value="{{$tag->nome}}">{{$tag->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="tags" id="tgs" value="{{$noticia->tags}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">Título:</div>
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
                                    <td><label for="titulo_{{$lang}}">{{$lang}}</label></td>
                                    <td>
                                        <input type="text" name="titulo_{{$lang}}" class="form-control" id="titulo_{{$lang}}" value="{{$noticia->textos->where('tipo', 'titulo')->where('lang', $lang)->first()->texto}}" required>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">Corpo:</div>
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
                                    <td><label for="corpo_{{$lang}}">{{$lang}}</label></td>
                                    <td><textarea name="corpo_{{$lang}}" class="form-control" id="corpo_{{$lang}}" cols="30" rows="10" required>{{$noticia->textos->where('tipo', 'corpo')->where('lang', $lang)->first()->texto}}</textarea></td>
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
            <div class="row"><input type="file" class="form-control" name="head_pic" accept="image/*" ></div>
            
            <div class="row">
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>

        </form>
    </div>
@endsection