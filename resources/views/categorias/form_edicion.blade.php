@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>Actualización de Categorias</h1>
@stop

@section('content')
    <form action="{{url('/categorias/editar', $category->idCat)}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_Cat" class="form-label">Id Categoria</label>
            <input type="text" class="form-control" id="id_Cat" name="id_Cat" value='{{$category->idCat}}' disabled>
        </div>
        <div class="mb-3">
            <label for="nom_Cat" class="form-label">Nombre Categoria</label>
            <input type="text" class="form-control" id="nom_Cat" name="nom_Cat" value='{{$category->nomCat}}'>
        </div>
        <div class="mb-3">
            <label for="des_Cat" class="form-label">Descripción Categoria</label>
            <input type="text" class="form-control" id="des_Cat" name="des_Cat" value='{{$category->desCat}}'>
        </div>

        @if($errors->any())
            <div class="alert alert-danger hide-message">
                <p>Todos los campos son obligatorios.</p>
            </div>
        @endif

        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{ asset('js/messages.js') }}"></script>
@stop
