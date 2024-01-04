<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;

class ProveedoresController extends Controller
{
    public function index(){
        $proveedores = Proveedor::all();
        return view ('proveedores.listado', ['prove'=>$proveedores]);
    }

    public function form_registro(){
        return view ('proveedores.form_registro');
    }

    public function registrar(Request $request){
        // Validar que no haya campos vacíos
        $request->validate([
            'id_Pro' => 'required|unique:proveedores,idPro',
            'nom_Pro' => 'required',
            'correo_Pro' => 'required',
            'tel_Pro' => 'required',
            'dir_Pro' => 'required',
        ]);
    
        $proveedor = new Proveedor();
        $proveedor->idPro = $request->input('id_Pro');
        $proveedor->nomPro = $request->input('nom_Pro');
        $proveedor->correoPro = $request->input('correo_Pro');
        $proveedor->telPro = $request->input('tel_Pro');
        $proveedor->dirPro = $request->input('dir_Pro');
        $proveedor->save();
    
        return redirect()->route('listado_proveedores')->with('success', 'Proveedor registrado exitosamente');
    }
    public function form_edicion($id){
        $proveedor = Proveedor::findorFail($id);
        return view('proveedores.form_edicion',['prove'=>$proveedor]);
    }

    public function editar(Request $request, $id){
        $proveedor = Proveedor::findorFail($id);
        $proveedor->nomPro = $request->input('nom_Pro');
        $proveedor->correoPro = $request->input('correo_Pro');
        $proveedor->telPro = $request->input('tel_Pro');
        $proveedor->dirPro = $request->input('dir_Pro');
        // Validar que no haya campos vacíos
        $request->validate([
            'nom_Pro' => 'required',
            'correo_Pro' => 'required',
            'tel_Pro' => 'required',
            'dir_Pro' => 'required',
        ]);
        $proveedor->save();
        return redirect()->route('listado_proveedores')->with('info', 'Proveedor editado exitosamente');
    }

    public function eliminar($id){
        $proveedor = Proveedor::findorFail($id);
        $proveedor->delete();
        return redirect()->route('listado_proveedores')->with('danger', 'Proveedor eliminado exitosamente');
    }
}
