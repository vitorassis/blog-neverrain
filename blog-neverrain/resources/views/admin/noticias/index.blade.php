@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <a href="/ademiro/noticias/new" class="btn btn-primary">Adicionar Notícia</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>Título</td>
                    <td>Ação</td>
                    <td>Ação</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($noticias as $noticia)
                    <tr>
                        <td>{{$noticia->textos->where('tipo', 'titulo')->first()->texto}} @if($noticia->alert) <span><i class="material-icons text-danger">warning</span>@endif </td>
                        <td><a href="/ademiro/noticias/edit/{{$noticia->id}}" class="btn btn-warning">Editar</a></td>
                        <td><button onclick="removeNoticia({{$noticia->id}})" class="btn btn-danger">Excluir</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>    
@endsection