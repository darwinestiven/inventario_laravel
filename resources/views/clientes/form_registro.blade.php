
@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Registrar de Clientes</h1>
@stop

@section('content')
    <form action="{{url('/clientes/registrar')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_Cli" class="form-label">Id Cliente</label>
            <input type="number" class="form-control" id="id_Cli" name="id_Cli">
        </div>
        <div class="mb-3">
            <label for="nom_Cli" class="form-label">Nombre Cliente</label>
            <input type="text" class="form-control" id="nom_Cli" name="nom_Cli">
        </div>
        <div class="mb-3">
            <label for="correo_Cli" class="form-label">Correo Cliente</label>
            <input type="email" class="form-control" id="correo_Cli" name="correo_Cli">
        </div>
        <div class="mb-3">
            <label for="tel_Cli" class="form-label">Teléfono Cliente</label>
            <input type="number" class="form-control" id="tel_Cli" name="tel_Cli">
        </div>
        <div class="mb-3">
            <label for="dir_Cli" class="form-label">Direccion Cliente</label>
            <input type="text" class="form-control" id="dir_Cli" name="dir_Cli">
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