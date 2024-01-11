@extends('adminlte::page')

@section('title', 'Existencias')

@section('content_header')
    <h1>Registro de Existencias</h1>
@stop

@section('content')
    <form action="{{ url('/existencias/registrar') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="idExis" class="form-label">Id Existencia</label>
            <input type="number" class="form-control" id="idExis" name="idExis">
        </div>
        <div class="mb-3">
            <label for="cantIniExis" class="form-label">Cantidad Inicial</label>
            <input type="number" class="form-control" id="cantIniExis" name="cantIniExis">
        </div>
        <div class="mb-3">
            <label for="cantActExis" class="form-label">Cantidad Actual</label>
            <input type="number" class="form-control" id="cantActExis" name="cantActExis">
        </div>
        <div class="mb-3">
            <label for="preComExis" class="form-label">Precio Compra</label>
            <input type="number" class="form-control" id="preComExis" name="preComExis">
        </div>
        <div class="mb-3">
            <label for="preVenExis" class="form-label">Precio Venta</label>
            <input type="number" class="form-control" id="preVenExis" name="preVenExis">
        </div>
        <div class="mb-3">
            <label for="categoria" class="form-label">Categoría</label>
            <select class="form-control" id="categoria" name="categoria">
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->idCat }}">{{ $categoria->nomCat }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="producto" class="form-label">Producto</label>
            <select class="form-control" id="producto" name="producto">
                @foreach($productos as $producto)
                    <option value="{{ $producto->idProd }}">{{ $producto->nomProd }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="proveedor" class="form-label">Proveedor</label>
            <select class="form-control" id="proveedor" name="proveedor">
                @foreach($proveedores as $proveedor)
                    <option value="{{ $proveedor->idPro }}">{{ $proveedor->nomPro }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="fecExis" class="form-label">Fecha Existencia</label>
            <input type="date" class="form-control" id="fecExis" name="fecExis">
        </div>

        @if($errors->any())
            <div class="alert alert-danger hide-message">
                <p>Todos los campos son obligatorios o el ID ya existe.</p>
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
