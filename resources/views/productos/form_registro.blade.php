@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>Registro de Productos</h1>
@stop

@section('content')
    <form action="{{ url('/productos/registrar') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="id_Prod" class="form-label">Id Producto</label>
            <input type="number" class="form-control" id="id_Prod" name="id_Prod">
        </div>
        <div class="mb-3">
            <label for="nom_Prod" class="form-label">Nombre Producto</label>
            <input type="text" class="form-control" id="nom_Prod" name="nom_Prod">
        </div>
        <div class="mb-3">
            <label for="select_categoria" class="form-label">Seleccionar Categoria</label>
            <select class="form-control" id="select_categoria" name="categoria">
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->idCat }}">{{ $categoria->nomCat }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="det_Prod" class="form-label">Detalle Producto</label>
            <input type="text" class="form-control" id="det_Prod" name="det_Prod">
        </div>
        <div class="mb-3">
            <label for="imagen_producto" class="form-label">Imagen del Producto</label>
            <input type="file" class="form-control" id="imagen_producto" name="imagen_producto">
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
