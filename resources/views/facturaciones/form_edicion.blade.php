@extends('adminlte::page')

@section('title', 'Facturaciones')

@section('content_header')
    <h1>Actualización de Facturaciones</h1>
@stop

@section('content')
    <form action="{{url('/facturaciones/editar', $factu->idFac)}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_Fac" class="form-label">Id Cliente</label>
            <input type="number" class="form-control" id="id_Fac" name="id_Fac" value='{{$factu->idFac}}' disabled>
        </div>
        <div class="mb-3">
            <label for="fec_Fac" class="form-label">Nombre Cliente</label>
            <input type="date" class="form-control" id="fec_Fac" name="fec_Fac" value='{{$factu->fecFac}}'>
        </div>
        <div class="mb-3">
            <label for="montoTo_Fac" class="form-label">Correo Cliente</label>
            <input type="number" class="form-control" id="montoTo_Fac" name="montoTo_Fac" value='{{$factu->montoToFac}}'>
        </div>
        <div class="mb-3">
            <label for="select_cliente" class="form-label">Seleccionar Cliente</label>
            <select class="form-control" id="select_cliente" name="id_Cli">
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->idCli }}" 
                            {{ $cliente->idCli == $factu->cliente ? 'selected' : '' }}>
                        {{ $cliente->nomCli }}
                    </option>
                @endforeach
            </select>
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
