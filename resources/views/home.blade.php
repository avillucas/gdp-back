@extends('layouts.plantillabase')

@section('title','Home')
@section('h-title','Bienvenido al administrador de guardianes de patitas')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    {{ __('Desde este administrador puedes gestionar los contenidos del sitio web ') }}
@endsection
