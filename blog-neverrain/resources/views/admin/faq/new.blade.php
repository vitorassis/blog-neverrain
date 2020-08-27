@extends('layouts.app')

@section('content')    
    <div class="container">
        <div class="row"><h1>Nova Pergunta:</h1></div>
        <form action="/ademiro/faq/store" method="post">
            @csrf
            
            <div class="row">
                <div class="col-md-12 text-center">Pergunta:</div>
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
                                    <td><label for="question_{{$lang}}">{{$lang}}</label></td>
                                    <td><input type="text" name="question_{{$lang}}" class="form-control" id="question_{{$lang}}" required></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">Resposta:</div>
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
                                    <td><label for="answer_{{$lang}}">{{$lang}}</label></td>
                                    <td><textarea name="answer_{{$lang}}" class="form-control" id="answer_{{$lang}}" cols="30" rows="10" required></textarea></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 text-right"><label for="upvotes">Upvotes:</label></div>
                <div class="col-md-6 text-center">
                   <input type="number" name="upvotes" id="upvotes" min=1>
                </div>
            </div>
            
            <div class="row">
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>

        </form>
    </div>
@endsection