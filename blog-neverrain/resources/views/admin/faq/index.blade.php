@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <a href="/ademiro/faq/new" class="btn btn-primary">Adicionar Pergunta</a>
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
                @foreach ($questoes as $questao)
                    <tr>
                        <td>{{$questao->textos->where('lang', 'pt')->where('tipo', 'question')->first()->texto}} @if($questao->alert) <span><i class="material-icons text-danger">warning</span>@endif </td>
                        <td><a href="/ademiro/faq/edit/{{$questao->id}}" class="btn btn-warning">Editar</a></td>
                        <td><button onclick="removeFaq({{$questao->id}})" class="btn btn-danger">Excluir</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>    
@endsection