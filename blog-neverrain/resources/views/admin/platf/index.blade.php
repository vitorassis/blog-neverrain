@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <a href="/ademiro/plataformas/new" class="btn btn-primary">Adicionar Plataforma</a>
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
            @foreach ($plataformas as $plataforma)
                <tr>
                    <td>{{$plataforma->nome}}</td>
                    <td><a href="/ademiro/plataformas/edit/{{$plataforma->id}}" class="btn btn-warning">Editar</a></td>
                    <td><button onclick="removePlataforma({{$plataforma->id}})" class="btn btn-danger">Excluir</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>    
@endsection