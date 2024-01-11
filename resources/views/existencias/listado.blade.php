@extends('adminlte::page')

@section('title', 'Existencias')

@section('content_header')
    <h1>Listado de Existencias</h1>
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
    <a href="{{ url('/existencias/registrar') }}" type="button" class="btn btn-success">Registrar</a>
</div>
<br>

<table class="table" id="table-programs">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Id Existencia</th>
      <th scope="col">Cantidad Inicial</th>
      <th scope="col">Cantidad Actual</th>
      <th scope="col">Precio Compra</th>
      <th scope="col">Precio Venta</th>
      <th scope="col">Categoría</th>
      <th scope="col">Producto</th>
      <th scope="col">Proveedor</th>
      <th scope="col">Fecha Existencia</th>
      <th scope="col">Opción</th>
    </tr>
  </thead>
  <tbody>
    @php
        $i = 1;
    @endphp
    
    @foreach($existencias as $existencia)
    <tr>
      <th scope="row">{{$i}}</th>
      <td>{{$existencia->idExis}}</td>
      <td>{{$existencia->cantIniExis}}</td>
      <td>{{$existencia->cantActExis}}</td>
      <td>{{$existencia->preComExis}}</td>
      <td>{{$existencia->preVenExis}}</td>
      <td>{{$existencia->category->nomCat}}</td>
      <td>{{$existencia->product->nomProd}}</td>
      <td>{{$existencia->supplier->nomPro}}</td>
      <td>{{$existencia->fecExis}}</td>
      <td>
        <a href="{{ route('editar_existencia', $existencia->idExis) }}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
        <a href="{{ route('eliminar_existencia', $existencia->idExis) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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
