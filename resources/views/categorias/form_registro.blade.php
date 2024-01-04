
@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>Registrar de Categorias</h1>
@stop

@section('content')
    <form action="{{url('/categorias/registrar')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_Cat" class="form-label">Id Categoria</label>
            <input type="number" class="form-control" id="id_Cat" name="id_Cat">
        </div>
        <div class="mb-3">
            <label for="nom_Cat" class="form-label">Nombre Categoria</label>
            <input type="text" class="form-control" id="nom_Cat" name="nom_Cat">
        </div>
        <div class="mb-3">
            <label for="des_Cat" class="form-label">Descripción Categoria</label>
            <input type="text" class="form-control" id="des_Cat" name="des_Cat">
        </div>

        @if($errors->any())
            <div class="alert alert-danger hide-message">
                <p>El código ya existe o hay campos vacíos.</p>
            </div>
        @endif

        <button type="submit" class="btn btn-success">Registrar</button>
        
    </form>

    

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{ asset('js/messages.js') }}"></script>
@stop