document.addEventListener('DOMContentLoaded', function () {
    // Inicializar DataTables, si lo estás usando
    $('#table-programs').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json"
        }
    });

    // Ocultar mensajes automáticamente después de 2 segundos
    setTimeout(function () {
        document.querySelectorAll('.hide-message').forEach(function (message) {
            message.style.display = 'none';
        });
    }, 2000);

    
    
});

$(document).ready(function() {
    $('#agregarFila').click(function() {
        $('#modalAddProducto').modal('show');
    });

    // Aquí puedes agregar más lógica para manejar la presentación de datos y la interacción con el modal
});

document.addEventListener('DOMContentLoaded', function () {
    // Resto del código...

    document.getElementById('select_categoria').addEventListener('change', function() {
        var categoriaSeleccionada = this.value;
        actualizarProductos(categoriaSeleccionada);
    });

    function actualizarProductos(categoriaId) {
        var selectProducto = document.getElementById('select_producto');
        selectProducto.innerHTML = '<option value="">Seleccione un Producto</option>';

        productos.forEach(function(producto) {
            if(producto.categoriaRelacion.idCat == categoriaId) {
                var opcion = document.createElement('option');
                opcion.value = producto.idProd;
                opcion.textContent = producto.nomProd;
                selectProducto.appendChild(opcion);
            }
        });
    }
});

document.getElementById('select_categoria').addEventListener('change', function() {
    var categoriaSeleccionada = this.value;
    var productos = document.querySelectorAll('.producto-select option');

    productos.forEach(function(producto) {
        if(producto.value === "") {
            producto.style.display = 'block'; // Siempre mostrar la opción por defecto
        } else {
            producto.style.display = 'none'; // Ocultar todos los productos inicialmente
            if (producto.getAttribute('data-categoria-id') == categoriaSeleccionada) {
                producto.style.display = 'block'; // Mostrar solo los productos que coincidan con la categoría seleccionada
            }
        }
    });
});

