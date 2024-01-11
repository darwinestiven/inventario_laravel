<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Existencia;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Proveedor;

class ExistenciasController extends Controller
{
    public function index()
    {
        $existencias = Existencia::all();
        return view('existencias.listado', ['existencias' => $existencias]);
    }

    public function form_registro()
    {
        $categorias = Categoria::all();
        $productos = Producto::all();
        $proveedores = Proveedor::all();

        return view('existencias.form_registro', [
            'categorias' => $categorias,
            'productos' => $productos,
            'proveedores' => $proveedores,
        ]);
    }

    public function registrar(Request $request)
    {
        // Validar que no haya campos vacíos y realizar otras validaciones según tus necesidades
        $request->validate([
            'idExis' => 'required|unique:existencias,idExis',
            'cantIniExis' => 'required|integer',
            'cantActExis' => 'required|integer',
            'preComExis' => 'required|integer',
            'preVenExis' => 'required|integer',
            'categoria' => 'required|integer',
            'producto' => 'required|integer',
            'proveedor' => 'required|integer',
            'fecExis' => 'required|date',
        ]);

        $existencia = new Existencia();
        $existencia->idExis = $request->input('idExis');
        $existencia->cantIniExis = $request->input('cantIniExis');
        $existencia->cantActExis = $request->input('cantActExis');
        $existencia->preComExis = $request->input('preComExis');
        $existencia->preVenExis = $request->input('preVenExis');
        $existencia->categoria = $request->input('categoria');
        $existencia->producto = $request->input('producto');
        $existencia->proveedor = $request->input('proveedor');
        $existencia->fecExis = $request->input('fecExis');
        $existencia->save();

        return redirect()->route('listado_existencias')->with('success', 'Existencia registrada exitosamente');
    }

    public function form_edicion($id)
    {
        $existencia = Existencia::findOrFail($id);
        $categorias = Categoria::all();
        $productos = Producto::all();
        $proveedores = Proveedor::all();
    
        return view('existencias.form_edicion', [
            'existencia' => $existencia,
            'categorias' => $categorias,
            'productos' => $productos,
            'proveedores' => $proveedores,
        ]);
    }

    public function editar(Request $request, $id)
    {
        $existencia = Existencia::findOrFail($id);

        // Validar que no haya campos vacíos y realizar otras validaciones según tus necesidades
        $request->validate([
            'cantIniExis' => 'required|integer',
            'cantActExis' => 'required|integer',
            'preComExis' => 'required|integer',
            'preVenExis' => 'required|integer',
            'categoria' => 'required|integer',
            'producto' => 'required|integer',
            'proveedor' => 'required|integer',
            'fecExis' => 'required|date',
        ]);

        $existencia->cantIniExis = $request->input('cantIniExis');
        $existencia->cantActExis = $request->input('cantActExis');
        $existencia->preComExis = $request->input('preComExis');
        $existencia->preVenExis = $request->input('preVenExis');
        $existencia->categoria = $request->input('categoria');
        $existencia->producto = $request->input('producto');
        $existencia->proveedor = $request->input('proveedor');
        $existencia->fecExis = $request->input('fecExis');
        $existencia->save();

        return redirect()->route('listado_existencias')->with('info', 'Existencia editada exitosamente');
    }

    public function eliminar($id)
    {
        $existencia = Existencia::findOrFail($id);
        $existencia->delete();
        return redirect()->route('listado_existencias')->with('danger', 'Existencia eliminada exitosamente');
    }
}
