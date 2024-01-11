@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>Listado de Productos</h1>
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
    <a href="/productos/registrar" type="button" class="btn btn-success">Registrar</a>
</div>
<br>

<!-- Formulario de Búsqueda -->
<form action="{{ route('listado_productos') }}" method="GET">
    <div class="input-group mb-3">
        <input type="text" name="search" class="form-control" placeholder="Buscar producto" value="{{ request()->search }}">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">Buscar</button>
        </div>
    </div>
</form>

<!-- Contenedor de Tarjetas de Productos -->
<div class="row">
    
        @foreach($produc as $producto)
            <div class="col-md-3 mb-3 d-flex align-items-stretch">
                <div class="card">
                    <h3 class="card-title text-center titulo-grande"><strong>{{ $producto->nomProd }}</strong></h3>
                    <!-- Aquí puedes insertar una imagen si la tienes -->
                    <img src="{{ asset('storage/'.$producto->imagen) }}" class="card-img-top" alt="..."> 

                    <div class="card-body">
                        
                        <p class="card-text"><strong>ID:</strong> {{ $producto->idProd }}</p>
                        <p class="card-text"><strong>Categoría:</strong> {{ $producto->category->nomCat }}</p>
                        <p class="card-text">{{ $producto->detProd }}</p>

                        <div class="text-center">
                            <a href="{{ route('editar_producto', $producto->idProd) }}" class="btn btn-primary btn-same-size"> <i class=" fas fa-pencil-alt"></i> Editar</a>
                            <a href="{{ route('eliminar_producto', $producto->idProd) }}" class="btn btn-danger btn-same-size"> <i class=" fas fa-trash-alt"></i> Eliminar</a>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        @endforeach

</div>

<!-- Paginación manual -->
<!-- Paginación manual con botones Anterior y Siguiente -->
<div class="pagination">
    <!-- Botón Anterior -->
    @if ($currentPage > 1)
        <a href="{{ request()->fullUrlWithQuery(['page' => $currentPage - 1]) }}">Anterior</a>
    @else
        <span>Anterior</span>
    @endif

    <!-- Números de página -->
    @for ($i = 1; $i <= $totalPages; $i++)
        <a href="{{ request()->fullUrlWithQuery(['page' => $i, 'search' => request()->search]) }}">
            {{ $i }}
        </a>
    @endfor

    <!-- Botón Siguiente -->
    @if ($currentPage < $totalPages)
        <a href="{{ request()->fullUrlWithQuery(['page' => $currentPage + 1]) }}">Siguiente</a>
    @else
        <span>Siguiente</span>
    @endif
</div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="/css/stylepagi.css">
    
@stop

@section('js')
    <script src="{{ asset('js/messages.js') }}"></script>
    
    
@stop
