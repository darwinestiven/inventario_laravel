var contadorFilas = 0;

function actualizarPrecioTotal() {
    var cantidad = $('#cantidadProducto').val();
    var precio = $('#precioProductoHidden').val(); // Uso el valor oculto ya que el visible está deshabilitado
    var total = cantidad * precio;
    $('#precioTotal').val(total.toFixed(2)); // Actualizar el input del precio total
    $('#precioTotalHidden').val(total.toFixed(2)); // Actualizar el valor oculto si es necesario
     // Actualizar el valor oculto si es necesario
}

function actualizarTotalAPagar() {
    totalpagar = 0; // Resetea el total a pagar
    $('#tablaFacturacion tbody tr').each(function() {
        var totalFila = parseFloat($(this).find('td').eq(5).text()); // Obtiene el total de cada fila
        totalpagar += totalFila; // Suma al total
    });
    $('#precioTotalPagar').val(totalpagar.toFixed(2)); // Actualiza el input de total a pagar
    $('#precioTotalPagarHidden').val(totalpagar.toFixed(2)); // Actualiza el valor oculto
}

// Evento cuando cambia la cantidad
$('#cantidadProducto').on('input', actualizarPrecioTotal);

// Evento cuando se actualiza el precio (puedes llamar a esta función en tu AJAX success callback)
function actualizarPrecio(precio) {
    actualizarPrecioTotal();
    $('#precioProducto').val(precio);
    $('#precioProductoHidden').val(precio);
    
    
}


$('#guardarProducto').click(function() {
    var productoId = $('#select_producto2').val();

    $.ajax({
        url: '/productos/' + productoId + '/precio', // Asegúrate de usar la ruta correcta
        method: 'GET',
        success: function(data) {
            var precioVenta = data.preVenExis;
            agregarFilaTabla(precioVenta);
        },
        error: function(error) {
            console.log('Error al obtener el precio:', error);
            agregarFilaTabla(0); // En caso de error, puedes manejarlo como prefieras
        }
    });
});
$('#select_producto2').change(function() {
    var productoId = $(this).val();
    if(productoId) {
        $.ajax({
            url: '/productos/' + productoId + '/precio',
            method: 'GET',
            success: function(data) {
                var precioVenta = data.preVenExis;
                $('#precioProducto').val(precioVenta); // Establecer el precio en el input deshabilitado
                $('#precioProductoHidden').val(precioVenta); 
                // Establecer el precio en el campo oculto
            },
            error: function(error) {
                console.log('Error al obtener el precio:', error);
            }
        });
    }
});


function agregarFilaTabla(precioVenta) {
    contadorFilas++;
    var categoriaNombre = $('#select_categoria option:selected').text();
    var productoNombre = $('#select_producto2 option:selected').text();
    var cantidad = $('#cantidadProducto').val();
    var total = precioVenta * cantidad; // Calcula el total
    
    var nuevaFila = '<tr>' +
                        '<td>' + contadorFilas + '</td>' +
                        '<td>' + categoriaNombre + '</td>' +
                        '<td>' + productoNombre + '</td>' +
                        '<td>' + cantidad + '</td>' +
                        '<td>' + precioVenta + '</td>' +
                        '<td>' + total + '</td>' +
                        '<td><button type="button" class="btn btn-danger eliminarProducto">Eliminar</button></td>' +
                    '</tr>';
    
    $('#tablaFacturacion tbody').append(nuevaFila);
    actualizarTotalAPagar();
    // Limpiar los campos del formulario y cerrar el modal
    $('#formAddProducto')[0].reset();
    $('#modalAddProducto').modal('hide');
    
}

$(document).on('click', '.eliminarProducto', function() {
    $(this).closest('tr').remove();
    actualizarTotalAPagar();
});






