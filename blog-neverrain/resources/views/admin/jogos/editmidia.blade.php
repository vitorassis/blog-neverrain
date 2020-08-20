@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row"><h1>Imagens de {{$jogo->nome}}</h1></div>
        <form action="./{{$jogo->id}}" method="post"  enctype="multipart/form-data">
            @csrf
            <div class="row">
                <h2>Capa:</h2>
            </div>
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Imagem</th>
                            <th>Trocar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img width="50%" src="{{ asset($jogo->r_midias['head_pic'][0]->link)}}" alt="{{$jogo->r_midias['head_pic'][0]->link}}"></td>
                            <td>
                                <input class="form-control" type="file" name="head_pic" accept="image/*">
                                <br>A exibição só será carragada após salvar o fomulário!
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <h2>Carrossel:</h2>
            </div>
            <div class="row">
                <h4>Adicionar: <h4>
                <input class="form-control" type="file" name="carousel_pic[]" accept="image/*" multiple>
                <br>A exibição só será carragada após salvar o fomulário!
                <input type="hidden" name="removerCarousel" id="removerCarousel" value="">
            </div>
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Imagem</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jogo->r_midias['carousel_pic'] as $item)
                            <tr>
                                <td><img width="50%" src="{{ asset($item->link)}}" alt="{{$item->link}}"></td>
                                <td>
                                    <button type="button" id="remCar{{$item->id}}" onclick="removeCar({{$item->id}})" class="btn btn-danger">
                                        Remover
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
            <div class="row">
                <h2>Foto Empolgante:</h2>
            </div>
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Imagem</th>
                            <th>Trocar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img width="50%" src="{{ asset($jogo->r_midias['empolg_pic'][0]->link)}}" alt="{{$jogo->r_midias['empolg_pic'][0]->link}}"></td>
                            <td>
                                <input class="form-control" type="file" name="empolg_pic" accept="image/*">
                                <br>A exibição só será carragada após salvar o fomulário!
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <h2>Trailer Youtube:</h2>
            </div>
            <div class="row">
                <input type="text" class="form-control" name="trailer_vid" value="{{$jogo->r_midias['trailer_vid'][0]->link}}">
            </div>
            <div class="row">
                <h2>Links:</h2>
            </div>
            <div class="row">
<textarea class="form-control" name="links" cols="10" rows="10">
@foreach ($jogo->r_midias['embed_lnk'] as $item)
{{$item->link}}
@endforeach
</textarea>
            </div>
            <div class="row">
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
        </form>
    </div>
    
@endsection