@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <a href="/ademiro/tags/new" class="btn btn-primary">Adicionar Tag</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <td>Nome</td>
                <td>Ação</td>
                <td>Ação</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($tags as $tag)
                <tr>
                    <td>{{$tag->nome}}</td>
                    <td><a href="/ademiro/tags/edit/{{$tag->id}}" class="btn btn-warning">Editar</a></td>
                    <td><button onclick="removeTag({{$tag->id}})" class="btn btn-danger">Excluir</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>    
@endsection