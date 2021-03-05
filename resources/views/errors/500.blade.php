@extends('errors::illustrated-layout')

@section('code', '📴 500 ')

@section('title', __('Server Error'))

@section('image')

<div style="background-image: url('/images/404-bg.jpg');" class="absolute pin bg-no-repeat md:bg-left lg:bg-center">
</div>

@endsection

@section('message', __('Erro interno do nosso servidor. Mas tente novamente em alguns minutos.'))