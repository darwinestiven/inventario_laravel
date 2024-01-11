@extends('adminlte::page')

@section('title', 'Existencias')

@section('content_header')
    <h1>Actualización de Existencias</h1>
@stop

@section('content')
    <form action="{{ url('/existencias/editar', $existencia->idExis) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="idExis" class="form-label">Id Existencia</label>
            <input type="number" class="form-control" id="idExis" name="idExis" value='{{ $existencia->idExis }}' disabled>
        </div>
        <div class="mb-3">
            <label for="cantIniExis" class="form-label">Cantidad Inicial</label>
            <input type="number" class="form-control" id="cantIniExis" name="cantIniExis" value='{{ $existencia->cantIniExis }}'>
        </div>
        <div class="mb-3">
            <label for="cantActExis" class="form-label">Cantidad Actual</label>
            <input type="number" class="form-control" id="cantActExis" name="cantActExis" value='{{ $existencia->cantActExis }}'>
        </div>
        <div class="mb-3">
            <label for="preComExis" class="form-label">Precio Compra</label>
            <input type="number" class="form-control" id="preComExis" name="preComExis" value='{{ $existencia->preComExis }}'>
        </div>
        <div class="mb-3">
            <label for="preVenExis" class="form-label">Precio Venta</label>
            <input type="number" class="form-control" id="preVenExis" name="preVenExis" value='{{ $existencia->preVenExis }}'>
        </div>
        <div class="mb-3">
            <label for="categoria" class="form-label">Categoría</label>
            <select class="form-control" id="categoria" name="categoria">
                @foreach($categorias as $categoria)
                <option value="{{ $categoria->idCat }}" 
                    {{ $categoria->idCat == $existencia->categoria ? 'selected' : '' }}>
                    {{ $categoria->nomCat }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="producto" class="form-label">Producto</label>
            <select class="form-control" id="producto" name="producto">
                @foreach($productos as $producto)
                    <option value="{{ $producto->idProd }}"
                        {{ $producto->idProd == $existencia->Producto ? 'selected' : '' }}>
                        {{ $producto->nomProd }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="proveedor" class="form-label">Proveedor</label>
            <select class="form-control" id="proveedor" name="proveedor">
                @foreach($proveedores as $proveedor)
                    <option value="{{ $proveedor->idPro }}"
                        {{ $proveedor->idPro == $existencia->Proveedor ? 'selected' : '' }}>
                        {{ $proveedor->nomPro }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="fecExis" class="form-label">Fecha Existencia</label>
            <input type="date" class="form-control" id="fecExis" name="fecExis" value='{{ $existencia->fecExis }}'>
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
