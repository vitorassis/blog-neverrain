@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row"><h1>Editar Pergunta:</h1></div>
    <form action="/ademiro/faq/edit/{{$faq->id}}" method="post">
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
                                <td><input type="text" name="question_{{$lang}}" class="form-control" id="question_{{$lang}}" value="{{$faq->textos->where('tipo', 'question')->where('lang', $lang)->first()->texto}}" required></td>
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
                                <td><textarea name="answer_{{$lang}}" class="form-control" id="answer_{{$lang}}" cols="30" rows="10" required>{{$faq->textos->where('tipo', 'answer')->where('lang', $lang)->first()->texto}}</textarea></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 text-right"><label for="upvotes">Upvotes:</label></div>
            <div class="col-md-6 text-center">
               <input type="number" name="upvotes" id="upvotes" min=1 value="{{$faq->upvotes}}">
            </div>
        </div>
        
        <div class="row">
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>

    </form>
</div>
@endsection