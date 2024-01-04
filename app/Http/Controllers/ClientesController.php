<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;


class ClientesController extends Controller
{
    public function index(){
        $clientes = Cliente::all();
        return view ('clientes.listado', ['client'=>$clientes]);
    }

    public function form_registro(){
        return view ('clientes.form_registro');
    }

    public function registrar(Request $request){
        // Validar que no haya campos vacíos
        $request->validate([
            'id_Cli' => 'required|unique:clientes,idCli',
            'nom_Cli' => 'required',
            'correo_Cli' => 'required',
            'tel_Cli' => 'required',
            'dir_Cli' => 'required',
        ]);
    
        $cliente = new Cliente();
        $cliente->idCli = $request->input('id_Cli');
        $cliente->nomCli = $request->input('nom_Cli');
        $cliente->correoCli = $request->input('correo_Cli');
        $cliente->telCli = $request->input('tel_Cli');
        $cliente->dirCli = $request->input('dir_Cli');
        $cliente->save();
    
        return redirect()->route('listado_clientes')->with('success', 'Cliente registrado exitosamente');
    }
    public function form_edicion($id){
        $cliente = Cliente::findorFail($id);
        return view('clientes.form_edicion',['client'=>$cliente]);
    }

    public function editar(Request $request, $id){
        $cliente = Cliente::findorFail($id);
        $cliente->nomCli = $request->input('nom_Cli');
        $cliente->correoCli = $request->input('correo_Cli');
        $cliente->telCli = $request->input('tel_Cli');
        $cliente->dirCli = $request->input('dir_Cli');
        // Validar que no haya campos vacíos
        $request->validate([
            'nom_Cli' => 'required',
            'correo_Cli' => 'required',
            'tel_Cli' => 'required',
            'dir_Cli' => 'required',
        ]);
        $cliente->save();
        return redirect()->route('listado_clientes')->with('info', 'Cliente editado exitosamente');
    }

    public function eliminar($id){
        $cliente = Cliente::findorFail($id);
        $cliente->delete();
        return redirect()->route('listado_clientes')->with('danger', 'Cliente eliminado exitosamente');
    }
}
