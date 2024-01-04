@extends('adminlte::page')

@section('title', 'Proveedores')

@section('content_header')
    <h1>Actualización de Proveedores</h1>
@stop

@section('content')
    <form action="{{url('/proveedores/editar', $prove->idPro)}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_Pro" class="form-label">Id Cliente</label>
            <input type="number" class="form-control" id="id_Pro" name="id_Pro" value='{{$prove->idPro}}' disabled>
        </div>
        <div class="mb-3">
            <label for="nom_Pro" class="form-label">Nombre Cliente</label>
            <input type="text" class="form-control" id="nom_Pro" name="nom_Pro" value='{{$prove->nomPro}}'>
        </div>
        <div class="mb-3">
            <label for="correo_Pro" class="form-label">Correo Cliente</label>
            <input type="email" class="form-control" id="correo_Pro" name="correo_Pro" value='{{$prove->correoPro}}'>
        </div>
        <div class="mb-3">
            <label for="tel_Pro" class="form-label">Teléfono Cliente</label>
            <input type="number" class="form-control" id="tel_Pro" name="tel_Pro" value='{{$prove->telPro}}'>
        </div>
        <div class="mb-3">
            <label for="dir_Pro" class="form-label">Direccion Cliente</label>
            <input type="text" class="form-control" id="dir_Pro" name="dir_Pro" value='{{$prove->dirPro}}'>
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
