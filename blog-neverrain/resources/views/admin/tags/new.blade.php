@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row"><h1>Nova Tag</h1></div>
    <form action="/ademiro/tags/store" method="post">
        @csrf
        <div class="row form-group">
            <div class="col-md-6 text-right"><label for="nome">Nome:</label></div>
            <div class="col-md-4">
                <input type="text" name="nome" class="form-control" id="nome" required>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-6 text-right"><label for="cor">Cor:</label></div>
            <div class="col-md-4">
                <input type="color" name="cor" class="form-control" id="cor">
            </div>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    </form>
@endsection