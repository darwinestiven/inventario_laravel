<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facturacion;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\ProductoV;
use App\Models\Categoria;


class FacturacionesController extends Controller
{
    public function index(){
        $facturacion = Facturacion::all();
        return view('facturaciones.listado', ['factu'=> $facturacion]);
    }

    public function form_registro(){
        $clientes = Cliente::all();
        $productos = Producto::with('categoriaRelacion')->get();

        $categorias = Categoria::all();
        return view('facturaciones.form_registro', ['clientes' => $clientes,'produc' => $productos,'categorias' => $categorias]);
    }

    public function getPrecioVenta($id)
    {
        $producto = Producto::with('existencia')->find($id);
        if ($producto && $producto->existencia) {
            return response()->json(['preVenExis' => $producto->existencia->preVenExis]);
        } else {
            return response()->json(['preVenExis' => '0']);
        }
    }



    public function registrar(Request $request){
        // Validar que no haya campos vacíos
        $request->validate([
            'id_Cli' => 'required',
            'id_Fac' => 'required|unique:facturacion,idFac',
            'fec_Fac' => 'required',
            //'montoTo_Fac' => 'required',
        ]);

        // Si no existe, procede con el registro
        $factura = new Facturacion();
        $factura->cliente = $request->input('id_Cli');
        $factura->idFac = $request->input('id_Fac');
        $factura->fecFac = $request->input('fec_Fac');
        $factura->montoToFac = $request->input('precioTotalPagarHidden');
        $factura->save();

        return redirect()->route('listado_facturaciones')->with('success', 'Fáctura registrada correctamente');
    }

    public function registrarPro(Request $request){

        // Si no existe, procede con el registro
        $venta = new ProductoV();

        $venta->id_factura = $request->input('id_Fac');
        $venta->categoria = $request->input('categoria');
        $venta->precio = $request->input('precioProductoHidden');
        $venta->total = $request->input('precioTotalHidden');
        //$venta->producto = $request->input('producto');
        $venta->cantidad = $request->input('cantidadProducto');
        
        $venta->save();
        return redirect()->route('form_registro_fac')->with('success', 'Fáctura registrada correctamente');
    }


    public function form_edicion($id){
        $factura = Facturacion::findorFail($id);
        $clientes = Cliente::all();
        return view('facturaciones.form_edicion', ['factu' => $factura, 'clientes' => $clientes]);
    }

    public function editar(Request $request, $id){
        $factura = Facturacion::findorFail($id);
        $factura->cliente = $request->input('id_Cli');
        $factura->fecFac = $request->input('fec_Fac');
        $factura->montoToFac = $request->input('montoTo_Fac');
        // Validar que no haya campos vacíos
        $request->validate([
            'id_Cli' => 'required',
            'fec_Fac' => 'required',
            'montoTo_Fac' => 'required',
        ]);
        $factura->save();
        return redirect()->route('listado_facturaciones')->with('info', 'Fáctura editada exitosamente');
    }

    public function eliminar($id){
        $factura = Facturacion::findorFail($id);
        $factura->delete();
        return redirect()->route('listado_facturaciones')->with('danger', 'Fáctura eliminada exitosamente');
    }
}
