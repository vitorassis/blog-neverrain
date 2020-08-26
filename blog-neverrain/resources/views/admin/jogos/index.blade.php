@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <a href="/ademiro/jogos/new" class="btn btn-primary">Adicionar Jogo</a>
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
                        <td>{{$jogo->nome}} @if($jogo->alert) <span><i class="material-icons text-danger">warning</span>@endif </td>
                        <td><a href="/ademiro/jogos/edit/{{$jogo->id}}" class="btn btn-warning">Editar</a></td>
                        <td><button onclick="removeGame({{$jogo->id}})" class="btn btn-danger">Excluir</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>    
@endsection