@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Actualización de Clientes</h1>
@stop

@section('content')
    <form action="{{url('/clientes/editar', $client->idCli)}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_Cli" class="form-label">Id Cliente</label>
            <input type="number" class="form-control" id="id_Cli" name="id_Cli" value='{{$client->idCli}}' disabled>
        </div>
        <div class="mb-3">
            <label for="nom_Cli" class="form-label">Nombre Cliente</label>
            <input type="text" class="form-control" id="nom_Cli" name="nom_Cli" value='{{$client->nomCli}}'>
        </div>
        <div class="mb-3">
            <label for="correo_Cli" class="form-label">Correo Cliente</label>
            <input type="email" class="form-control" id="correo_Cli" name="correo_Cli" value='{{$client->correoCli}}'>
        </div>
        <div class="mb-3">
            <label for="tel_Cli" class="form-label">Teléfono Cliente</label>
            <input type="number" class="form-control" id="tel_Cli" name="tel_Cli" value='{{$client->telCli}}'>
        </div>
        <div class="mb-3">
            <label for="dir_Cli" class="form-label">Direccion Cliente</label>
            <input type="text" class="form-control" id="dir_Cli" name="dir_Cli" value='{{$client->dirCli}}'>
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
