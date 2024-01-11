
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
        <div class="row">
            <!-- Columna para el selector de clientes -->
            <div class="col-md-2 mb-3">
                <label for="select_cliente" class="form-label">Seleccionar Cliente</label>
                <select class="form-control" id="select_cliente" name="id_Cli">
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->idCli }}">{{ $cliente->nomCli }}</option>
                    @endforeach
                </select>
            </div>
        
            <!-- Columna para el botón de registro -->
            <div class="col-md-4" >
                <a href="/clientes/registrar" type="button" class="btn btn-success" style="margin-top: 32px;">Registrar Nuevo Cliente</a>
            </div>
        </div>
        
        <div class="mb-3">
            <label for="fec_Fac" class="form-label">Fecha</label>
            <input type="date" class="form-control" id="fec_Fac" name="fec_Fac">
        </div>

        
        

        @if($errors->any())
            <div class="alert alert-danger hide-message">
                <p>El código ya existe o hay campos vacíos.</p>
            </div>
        @endif

        
        
   

    <!-- A continuación del formulario ya existente -->
<div class="mb-3">
     <!-- Tabla con una sola fila inicialmente -->
     <div class="card">
        <div class="card-header">
            Detalle de Facturación
        </div>
        <div class="card-body">
            <div style="max-height: 400px; overflow-y: auto;">
                <table class="table" id="tablaFacturacion">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Categoría</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Total</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
            <div class="text-right">
                <button type="button" class="btn btn-primary" id="agregarFila">Añadir Producto</button>
            </div>
            <div  class="modal fade" id="modalAddProducto" tabindex="-1" role="dialog" aria-labelledby="modalAddProductoLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalAddProductoLabel">Añadir Producto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Formulario para añadir producto -->
                            <form id="formAddProducto" action="{{ url('/facturaciones/registrarpro') }}" method="POST">
                                <!-- Campos del formulario -->
                                @csrf
                                <div class="form-group">
                                    <label for="categoriaProducto">Categoría</label>
                                    <select class="form-control categoria-select" id="select_categoria" name="categoria">
                                        <option value="">Seleccione una Categoria</option>
                                        @foreach($categorias as $categoria)
                                            <option value="{{ $categoria->idCat }}">{{ $categoria->nomCat }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nombreProducto">Producto</label>
                                    <select class="form-control producto-select" data-index="0" id="select_producto2" name="producto[]">
                                        <option value="">Seleccione un producto</option>
                                        @foreach($produc as $producto)
                                            <option value="{{ $producto->idProd }}" data-categoria-id="{{ $producto->categoriaRelacion->idCat }}">
                                                {{ $producto->nomProd }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="cantidadProducto">Cantidad</label>
                                    <input type="number" class="form-control" id="cantidadProducto" name="cantidadProducto">
                                </div>
                                <div class="form-group">
                                    <label for="precioProducto">Precio</label>
                                    <input type="text" class="form-control" id="precioProducto" name="precioProducto" disabled>
                                    <input type="hidden" name="precioProductoHidden" id="precioProductoHidden">
                                </div>
                                <!-- Input para mostrar el precio total -->
                                <div class="form-group">
                                    <label for="precioTotal">Precio Total</label>
                                    <input type="text" class="form-control" id="precioTotal" name="precioTotal" disabled>
                                    <input type="hidden" name="precioTotalHidden" id="precioTotalHidden">

                                </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" form="formAddProducto" class="btn btn-primary" id="guardarProducto">Guardar</button>
                            </div>   <!-- Más campos si son necesarios -->
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <div class="form-group">
        <label for="precioTotal">Total a pagar</label>
        <input type="text" class="form-control" id="precioTotalPagar" name="precioTotalPagar" disabled>
        <input type="hidden" name="precioTotalPagarHidden" id="precioTotalPagarHidden">

    </div>
    
    <button type="submit" class="btn btn-success">Comprar</button>
</div>

 </form>    

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
      
    <script src="{{ asset('js/messages.js') }}"></script>
    <script src="{{ asset('js/tabla_p.js') }}"></script>
    
@stop