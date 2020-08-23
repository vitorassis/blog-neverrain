@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row"><h1>Nova Plataforma</h1></div>
    <form action="/ademiro/plataformas/store" method="post">
        @csrf
        <div class="row form-group">
            <div class="col-md-6 text-right"><label for="nome">Nome:</label></div>
            <div class="col-md-4">
                <input type="text" name="nome" class="form-control" id="nome" required>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-6 text-right"><label for="link">Link:</label></div>
            <div class="col-md-4">
                <input type="text" name="link" class="form-control" id="link">
            </div>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    </form>
@endsection