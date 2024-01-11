
@extends('adminlte::page')

@section('title', 'Facturaciones')

@section('content_header')
    <h1>Listado de Facturaciones</h1>
@stop

@section('content')

@if(session('success'))
    <div class="alert alert-success hide-message">
        {{ session('success') }}
    </div>
@endif

@if(session('info'))
    <div class="alert alert-info hide-message">
        {{ session('info') }}
    </div>
@endif

@if(session('danger'))
    <div class="alert alert-danger hide-message">
        {{ session('danger') }}
    </div>
@endif

<div style="text-align: right;">
    <a href="/facturaciones/registrar" type="button" class="btn btn-success">Nueva Factura</a>
</div>
<br>

<table class="table" id="table-programs">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Id</th>
      <th scope="col">Fecha Factura</th>
      <th scope="col">Monto Total</th>
      <th scope="col">Cliente</th>
      <th scope="col">Opcion</th>
    </tr>
  </thead>
  <tbody>
    @php
        $i = 1;
    @endphp
    
    @foreach($factu as $c)
    <tr>
      <th scope="row">{{$i}}</th>
      <td>{{$c->idFac}}</td>
      <td>{{$c->fecFac}}</td>
      <td>$ {{$c->montoToFac}}</td>
      <td>{{$c->client->nomCli}}</td>
      <td>
        <a href="{{route('editar_fac', $c->idFac)}}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
        <a href="{{route('eliminar_fac', $c->idFac)}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
      </td>
      @php
          $i = $i + 1;
      @endphp
    </tr>
    @endforeach
  </tbody>
</table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
@stop

@section('js')
    <script src="{{ asset('js/messages.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
@stop

