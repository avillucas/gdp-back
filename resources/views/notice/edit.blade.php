@extends('layouts.plantillabase')

@section('title','Noticas')
@section('h-title','Agregar una noticia')

@section('content')
@if($message = Session::get('success'))
<div class="alert alert-success">
    <div>{{ $message }}</div>
</div>
@endif
@if($message = Session::get('image'))
<div class="alert alert-success">
    <img src="uploads/{{ asset(Session::get('image')) }}">
</div>
@endif

@if(count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="row">
    <form action="{{ route('notice.update'), $notice->id }}" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="col-lg-6">
            <label class="form-label" for="title">{{ __('Titulo')}}:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $notice->title }}" required>
        </div>
        <div class="col-lg-6">
            <label class="form-label" for="subtitle">Subtitulo:</label>
            <input type="text" name="subtitle" id="subtitle" value="{{ $notice->subtitle }}" class="form-control"  >
        </div>
        <div class="col-lg-6">
            <label class="form-label" for="url">Enlace:</label>
            <input type="url" name="url" id="url" value="{{ $notice->url }}"  class="form-control">
        </div>
        <div class="col-lg-6">
            <label class="form-label" for="image">Imagen principal si desea reemplazarla:</label>
            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror"  >
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
    </form>
</div>
@endsection
