@extends('errors::illustrated-layout')

@section('code', '404 😭')

@section('title', __('Página não encontrada'))

@section('image')

<div style="background-image: url('https://foxtrotdigitalstudio.com/wp-content/uploads/2016/12/404-1.jpg');" class="absolute pin bg-no-repeat md:bg-left lg:bg-center">
</div>

@endsection

@section('message', __('A página que você procurou, não foi possível encontrar.'))