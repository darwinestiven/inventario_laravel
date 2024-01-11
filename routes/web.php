<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\FacturacionesController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ExistenciasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});


Route::get('/dashboard', [HomeController::class,'index' ] 
)->middleware(['auth', 'verified'])->name('dashboard');

//Rutas Facultades
Route::get('/categorias/listado', [CategoriasController::class,'index' ] 
)->middleware(['auth', 'verified'])->name('listado_categorias');

Route::get('/categorias/registrar', [CategoriasController::class, 'form_registro']
)->middleware(['auth', 'verified'])->name('form_registro_cat');

Route::post('/categorias/registrar', [CategoriasController::class, 'registrar']
)->middleware(['auth', 'verified'])->name('registrar_cat');



Route::get('/categorias/editar/{id}' , [CategoriasController::class, 'form_edicion']
)->middleware(['auth', 'verified'])->name('editar_cat');

Route::post('/categorias/editar/{id}' , [CategoriasController::class, 'editar']
)->middleware(['auth', 'verified'])->name('editar_categoria');

Route::get('/categorias/eliminar/{id}', [CategoriasController::class, 'eliminar']
)->middleware(['auth', 'verified'])->name('eliminar_cat');


################################################################


//Rutas Clientes
Route::get('/clientes/listado', [ClientesController::class,'index' ] 
)->middleware(['auth', 'verified'])->name('listado_clientes');

Route::get('/clientes/registrar', [ClientesController::class, 'form_registro']
)->middleware(['auth', 'verified'])->name('form_registro_cli');

Route::post('/clientes/registrar', [ClientesController::class, 'registrar']
)->middleware(['auth', 'verified'])->name('registrar_cli');



Route::get('/clientes/editar/{id}' , [ClientesController::class, 'form_edicion']
)->middleware(['auth', 'verified'])->name('editar_cli');

Route::post('/clientes/editar/{id}' , [ClientesController::class, 'editar']
)->middleware(['auth', 'verified'])->name('editar_cliente');

Route::get('/clientes/eliminar/{id}', [ClientesController::class, 'eliminar']
)->middleware(['auth', 'verified'])->name('eliminar_cli');


################################################################



//Rutas Proveedores
Route::get('/proveedores/listado', [ProveedoresController::class,'index' ] 
)->middleware(['auth', 'verified'])->name('listado_proveedores');

Route::get('/proveedores/registrar', [ProveedoresController::class, 'form_registro']
)->middleware(['auth', 'verified'])->name('form_registro_pro');

Route::post('/proveedores/registrar', [ProveedoresController::class, 'registrar']
)->middleware(['auth', 'verified'])->name('registrar_pro');



Route::get('/proveedores/editar/{id}' , [ProveedoresController::class, 'form_edicion']
)->middleware(['auth', 'verified'])->name('editar_pro');

Route::post('/proveedores/editar/{id}' , [ProveedoresController::class, 'editar']
)->middleware(['auth', 'verified'])->name('editar_proveedor');

Route::get('/proveedores/eliminar/{id}', [ProveedoresController::class, 'eliminar']
)->middleware(['auth', 'verified'])->name('eliminar_pro');


################################################################

// Rutas Productos
Route::get('/productos/listado', [ProductosController::class, 'index']
)->middleware(['auth', 'verified'])->name('listado_productos');

Route::get('/productos/registrar', [ProductosController::class, 'form_registro']
)->middleware(['auth', 'verified'])->name('form_registro_producto');

Route::post('/productos/registrar', [ProductosController::class, 'registrar']
)->middleware(['auth', 'verified'])->name('registrar_producto');

Route::get('/productos/editar/{id}', [ProductosController::class, 'form_edicion']
)->middleware(['auth', 'verified'])->name('editar_prod');

Route::post('/productos/editar/{id}', [ProductosController::class, 'editar']
)->middleware(['auth', 'verified'])->name('editar_producto');

Route::get('/productos/eliminar/{id}', [ProductosController::class, 'eliminar']
)->middleware(['auth', 'verified'])->name('eliminar_producto');

##########
// Dentro de web.php
Route::get('/productos/{id}/precio', [FacturacionesController::class, 'getPrecioVenta']);



#####################################################################################

// Rutas Existencias
Route::get('/existencias/listado', [ExistenciasController::class, 'index']
)->middleware(['auth', 'verified'])->name('listado_existencias');

Route::get('/existencias/registrar', [ExistenciasController::class, 'form_registro']
)->middleware(['auth', 'verified'])->name('form_registro_existencia');

Route::post('/existencias/registrar', [ExistenciasController::class, 'registrar']
)->middleware(['auth', 'verified'])->name('registrar_existencia');

Route::get('/existencias/editar/{id}', [ExistenciasController::class, 'form_edicion']
)->middleware(['auth', 'verified'])->name('editar_exis');

Route::post('/existencias/editar/{id}', [ExistenciasController::class, 'editar']
)->middleware(['auth', 'verified'])->name('editar_existencia');

Route::get('/existencias/eliminar/{id}', [ExistenciasController::class, 'eliminar']
)->middleware(['auth', 'verified'])->name('eliminar_existencia');

############################################################################

//Rutas Facturaciones
Route::get('/facturaciones/listado', [FacturacionesController::class,'index' ] 
)->middleware(['auth', 'verified'])->name('listado_facturaciones');

Route::get('/facturaciones/registrar', [FacturacionesController::class, 'form_registro']
)->middleware(['auth', 'verified'])->name('form_registro_fac');

Route::post('/facturaciones/registrar', [FacturacionesController::class, 'registrar']
)->middleware(['auth', 'verified'])->name('registrar_fac');

Route::post('/facturaciones/registrarpro', [FacturacionesController::class, 'registrarPro']
)->middleware(['auth', 'verified'])->name('registrar_fac_pro');



Route::get('/facturaciones/editar/{id}' , [FacturacionesController::class, 'form_edicion']
)->middleware(['auth', 'verified'])->name('editar_fac');

Route::post('/facturaciones/editar/{id}' , [FacturacionesController::class, 'editar']
)->middleware(['auth', 'verified'])->name('editar_facturacion');

Route::get('/facturaciones/eliminar/{id}', [FacturacionesController::class, 'eliminar']
)->middleware(['auth', 'verified'])->name('eliminar_fac');


################################################################

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
