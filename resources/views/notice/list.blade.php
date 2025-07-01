@extends('layouts.plantillabase')

@section('title','Noticas')
@section('h-title','Listar noticias')

@section('content')
@if($message = Session::get('success'))
<div class="alert alert-success">
    <div>{{ $message }}</div>
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
     <div class="col-md-8"></div>
    <div class="col-6 col-md-4"><a class="btn btn-outline-primary" href="{{ route('notice.create') }}" >Crear Noticia</a></div>
</div>
 <div class="row">
      @foreach ($notices as $notice)
        <div class="col-sm">
          <div class="card">
            <div class="card-header">
             <img src="{{ asset($notice->image) }}" class="card-img-top" />
            </div>
            <div class="card-body">
              <p class="card-title">{{ $notice->title }}</p>
              <p class="card-text">{{ $notice->subtitle }}</p>
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-sm">
                  <a href="{{ route('notice.edit', $notice->id) }}"  class="btn btn-primary btn-sm">Editar</a>
                </div>
                <div class="col-sm">
                    <form action="{{ route('notice.destroy', $notice->id) }}" method="post">
                      @csrf
                      <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>

@endsection
