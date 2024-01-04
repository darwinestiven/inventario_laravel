<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Categoria;

class CategoriasController extends Controller
{
    public function index(){
        $categorias = Categoria::all();
        return view ('categorias.listado', ['category'=>$categorias]);
    }

    public function form_registro(){
        return view ('categorias.form_registro');
    }

    public function registrar(Request $request){
        // Validar que no haya campos vacíos
        $request->validate([
            'id_Cat' => 'required|unique:categoria,idCat',
            'nom_Cat' => 'required',
            'des_Cat' => 'required',
        ]);
    
        $categoria = new Categoria();
        $categoria->idCat = $request->input('id_Cat');
        $categoria->nomCat = $request->input('nom_Cat');
        $categoria->desCat = $request->input('des_Cat');
        $categoria->save();
    
        return redirect()->route('listado_categorias')->with('success', 'Categoria registrada exitosamente');
    }
    public function form_edicion($id){
        $categoria = Categoria::findorFail($id);
        return view('categorias.form_edicion',['category'=>$categoria]);
    }

    public function editar(Request $request, $id){
        $categoria = Categoria::findorFail($id);
        $categoria->nomCat = $request->input('nom_Cat');
        $categoria->desCat = $request->input('des_Cat');
        // Validar que no haya campos vacíos
        $request->validate([
            'nom_Cat' => 'required',
            'des_Cat' => 'required',
        ]);
        $categoria->save();
        return redirect()->route('listado_categorias')->with('info', 'Categoria editada exitosamente');
    }

    public function eliminar($id){
        $categoria = Categoria::findorFail($id);
        $categoria->delete();
        return redirect()->route('listado_categorias')->with('danger', 'Categoria eliminada exitosamente');
    }
}
