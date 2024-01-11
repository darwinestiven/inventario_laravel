<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Support\Facades\Storage;


class ProductosController extends Controller
{
    public function index(Request $request){
        $productos = Producto::all();
        $pageSize = 4;
        $query = Producto::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('nomProd', 'LIKE', "%{$search}%")
                  ->orWhere('idProd', 'LIKE', "%{$search}%")
                  ->orWhereHas('categoriaRelacion', function ($query) use ($search) {
                      $query->where('nomCat', 'LIKE', "%{$search}%"); // Asegúrate de que 'nombre' es el campo correcto en la tabla de categorías
                  })
                  // Agrega aquí otras condiciones de búsqueda si es necesario
                  ;
        }
        

        $productos = $query->get();

        // Obtén el número de la página actual. Si no está presente, usamos la página 1
        $currentPage = $request->input('page', 1);

        // Calcula el total de páginas
        $totalPages = ceil($productos->count() / $pageSize);

        // Calcula los elementos que se mostrarán en la página actual
        $currentProducts = $productos->slice(($currentPage - 1) * $pageSize, $pageSize)->all();

        // Pasa los datos a la vista
        return view('productos.listado', [
            'produc' => $currentProducts,
            'totalPages' => $totalPages,
            'currentPage' => $currentPage
        ]);
        
    }

    public function form_registro(){
        $categorias = Categoria::all();
        return view('productos.form_registro', ['categorias' => $categorias]);
    }

    public function registrar(Request $request){
        // Validar que no haya campos vacíos
        $request->validate([
            'id_Prod' => 'required|unique:productos,idProd',
            'nom_Prod' => 'required',
            'categoria' => 'required',
            'det_Prod' => 'required',
            //'imagen_producto' => 'image|mimes:jpeg,png,jpg,gif,svg', // Validación de la imagen
            'imagen_producto' => 'required',
        ]);
        
        $producto = new Producto();
        $producto->idProd = $request->input('id_Prod');
        $producto->nomProd = $request->input('nom_Prod');
        $producto->categoria = $request->input('categoria');
        $producto->detProd = $request->input('det_Prod');

        if ($request->hasFile('imagen_producto')) {
            $rutaImagen = $request->file('imagen_producto')->store('public/img');
            $producto->imagen = 'img/' . basename($rutaImagen);
        }
        
        $producto->save();

        return redirect()->route('listado_productos')->with('success', 'Producto registrado exitosamente');
    }

    public function form_edicion($id){
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all();
        return view('productos.form_edicion', ['producto' => $producto], ['categorias' => $categorias]);
    }

    public function editar(Request $request, $id){
        $producto = Producto::findOrFail($id);
        $producto->nomProd = $request->input('nom_Prod');
        $producto->categoria = $request->input('categoria');
        $producto->detProd = $request->input('det_Prod');
        // Validar que no haya campos vacíos
        $request->validate([
            'nom_Prod' => 'required',
            'categoria' => 'required',
            'det_Prod' => 'required',
            //'imagen_producto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('imagen_producto')) {
            // Eliminar la imagen anterior si existe
            if ($producto->imagen && Storage::exists('public/'.$producto->imagen)) {
                Storage::delete('public/'.$producto->imagen);
            }
               // Almacenar la nueva imagen y actualizar la ruta en el modelo
               $rutaImagen = $request->file('imagen_producto')->store('public/img');
               $producto->imagen = 'img/' . basename($rutaImagen);
        }

        $producto->save();
        return redirect()->route('listado_productos')->with('info', 'Producto editado exitosamente');
    }

    public function eliminar($id){
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return redirect()->route('listado_productos')->with('danger', 'Producto eliminado exitosamente');
    }
}
