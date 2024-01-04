
@extends('adminlte::page')

@section('title', 'Proveedores')

@section('content_header')
    <h1>Registrar de Proveedores</h1>
@stop

@section('content')
    <form action="{{url('/proveedores/registrar')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_Pro" class="form-label">Id Proveedor</label>
            <input type="number" class="form-control" id="id_Pro" name="id_Pro">
        </div>
        <div class="mb-3">
            <label for="nom_Pro" class="form-label">Nombre Proveedor</label>
            <input type="text" class="form-control" id="nom_Pro" name="nom_Pro">
        </div>
        <div class="mb-3">
            <label for="correo_Pro" class="form-label">Correo Proveedor</label>
            <input type="email" class="form-control" id="correo_Pro" name="correo_Pro">
        </div>
        <div class="mb-3">
            <label for="tel_Pro" class="form-label">Teléfono Proveedor</label>
            <input type="number" class="form-control" id="tel_Pro" name="tel_Pro">
        </div>
        <div class="mb-3">
            <label for="dir_Pro" class="form-label">Direccion Proveedor</label>
            <input type="text" class="form-control" id="dir_Pro" name="dir_Pro">
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