
@extends('adminlte::page')

@section('title', 'Facturaciones')

@section('content_header')
    <h1>Registrar de Facturaciones</h1>
@stop

@section('content')
    <form action="{{url('/facturaciones/registrar')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_Fac" class="form-label">Id Factura</label>
            <input type="number" class="form-control" id="id_Fac" name="id_Fac">
        </div>
        <div class="mb-3">
            <label for="fec_Fac" class="form-label">Fecha</label>
            <input type="date" class="form-control" id="fec_Fac" name="fec_Fac">
        </div>
        <div class="mb-3">
            <label for="montoTo_Fac" class="form-label">Monto Total $</label>
            <input type="number" class="form-control" id="montoTo_Fac" name="montoTo_Fac">
        </div>
        <div class="mb-3">
            <label for="select_cliente" class="form-label">Seleccionar Cliente</label>
            <select class="form-control" id="select_cliente" name="id_Cli">
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->idCli }}">{{ $cliente->nomCli }}</option>
                @endforeach
            </select>
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