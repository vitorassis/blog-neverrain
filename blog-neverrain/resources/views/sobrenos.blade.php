@extends('layouts.master')

@section('title','whoarewe')

@section('banner-img', asset('img/home-banner.jpg'))

@section('conteudo')
<center>
    <h1>{{__('aboutus.title')}}</h1>
    <h2>{{__('aboutus.subtitle')}}</h2>
</center>
@endsection