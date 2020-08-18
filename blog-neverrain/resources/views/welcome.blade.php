@extends('layouts.master')

@section('title', 'welcome')

@section('banner-img', asset('img/home-banner.jpg'))

@section('conteudo')
    <center>{{__("master.welcome")}}</center>
@stop