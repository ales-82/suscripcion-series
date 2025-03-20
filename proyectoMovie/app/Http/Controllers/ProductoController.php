<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


//use App\Http\Requests\StoreProductoRequest;
//use App\Http\Requests\UpdateProductoRequest;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $productos = Producto::all();

       return json_encode($productos);

    }    

    /**
     * Store a newly created resource in storage.
     */

    public function mostrar($id){

        $producto = Producto::where('id',$id)->get();


        return json_encode($producto);
    }


    public function store(Request $request)
    {
        $validar = $request->validate([
            'nombre'=>'required|min:5',
            'periodo'=>'required|min:5',
            'precio'=>'required|numeric',
            'detalles'=>'min:10',
        ]);        
            
        $ok = Producto::create([
            'nombre'=>$request->nombre,
            'periodo'=>$request->periodo,
            'precio'=>$request->precio,
            'detalles'=>$request->detalles
        ]);

        return json_encode($validar);        
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {        
        $sus = Venta::where([
                ['usuario_id','=',Auth::user()->id],
                ['estado','=','activo']
        ])->get();              
        
        if(count($sus)<=0){
            $producto = Producto::where('id',$producto->id)->get();
            $detalle =explode('\r\n', $producto[0]->detalles);

            return view('servicio.producto.producto', compact('producto','detalle'));    
        }

        return redirect()->route('info',Auth::user()->id)->with('wrong','Ya estas suscripto, podes cambiar de plan');    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $prod = Producto::where('id','!=', $id)->get();        

        return view('perfil.cambiar-plan', compact('prod'));
    }

    public function cambiarPlan($id)
    {
        $prod = Producto::where('id',$id)->get();  
        $detalle =explode('\r\n', $prod[0]->detalles);      

        return view('perfil.cambiar', compact('prod','detalle'));   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         $validar = $request->validate([
            'nombre'=>'required|min:5',
            'periodo'=>'required|min:5',
            'precio'=>'required|numeric',
            'detalles'=>'min:10',
        ]);

        
        $ok = Producto::where('id',$id)->update([
          'nombre'=>$request->nombre,
          'periodo'=>$request->periodo,
          'precio'=>$request->precio,
          'detalles'=>$request->detalles
        ]);

        return json_encode($validar);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $delete = Producto::where('id',$id)->delete();

        return json_encode($delete);
    }
}
