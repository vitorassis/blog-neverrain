@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <a href="./jogos/new" class="btn btn-primary">Adicionar Jogo</a>
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
                @foreach ($jogos as $jogo)
                    <tr>
                        <td>{{$jogo->nome}}</td>
                        <td><a href="./jogos/edit/{{$jogo->id}}" class="btn btn-warning">Editar</a></td>
                        <td><a href="./jogos/delete/{{$jogo->id}}" class="btn btn-danger">Excluir</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>    
@endsection