<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Charts\UserChart;

//use App\Http\Requests\StoreVentaRequest;
//use App\Http\Requests\UpdateVentaRequest;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $usuarios = Venta::select('ventas.nombre_producto','ventas.pago_suscripcion','ventas.usuario_id','usuarios.usuario')->join('usuarios','usuarios.id','=','ventas.usuario_id')->get();
        

        $array_usuarios = json_decode($usuarios);     


        $array_u = [];

        foreach($array_usuarios as $arr_u){         
            array_push($array_u,$arr_u->usuario);         
        }        

        $array_unico = array_unique($array_u);

        $count_usuario = array_count_values($array_u);

        $prod = Producto::all();
        $ventas = Venta::all();


        $array_result_p = json_decode($prod);
        $array_result_v = json_decode($ventas);

        $array_p = [];
        $array_v = [];

        foreach($array_result_p as $arr_p){         
            array_push($array_p,$arr_p->periodo);         
        }

        foreach($array_result_v as $arr_v){         
            array_push($array_v,$arr_v->nombre_producto);         
        }        

        $count_result = array_count_values($array_v);       


        $usersChart = new UserChart;
        $usersChart->labels($array_p);
        $usersChart->dataset('Productos más comprados', 'bar', array_values($count_result));


        $usersChart1  = new UserChart;
        $usersChart1->labels($array_unico);
        $usersChart1->dataset('El suscriptor más activo ', 'bar', array_values($count_usuario));


        return view('admin.dashboard.dashboard', [ 'usersChart' => $usersChart, 'usersChart1'=> $usersChart1 ] );
        
    }



    public function pagoConfirmado($id)
    {

        if(Auth::check()){

            $prod = Producto::where('id',$id)->get();
            
            $idVenta = Venta::insertGetId([
                'nombre_producto'=>$prod[0]->periodo,
                'pago_suscripcion'=>$prod[0]->precio,
                'usuario_id'=>Auth::user()->id,
                'created_at'=>now(),
                'updated_at'=>now()
            ]);

            DB::table('registro_venta')->insert([
                'producto_id'=>$prod[0]->id,
                'venta_id'=> $idVenta,
                'created_at'=>now(),
                'updated_at'=>now()
            ]);

            return redirect()->route('info',Auth::user()->id)->with('success','Se suscribió exitosamente, gracias');
        }
        
        return redirect()->route('login')->with('back','Ud debe iniciar sesión');
    }

  
    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    { 

        $ventas = Venta::where('usuario_id',Auth::user()->id)->orderBy('id','DESC')->first();        
        
        if($ventas!=null){
            
            $plan = Producto::where('id',$id)->first();            
            
            
            Venta::where('id',$ventas->id)->update([
                'nombre_producto'=>$plan->periodo,
                'pago_suscripcion'=>$plan->precio,
                'usuario_id'=>Auth::user()->id,                
            ]); 

            DB::table('registro_venta')
                ->where('venta_id',$ventas->id)
                ->update([
                'producto_id'=>$plan->id,
                'venta_id'=> $ventas->id,
                'created_at'=>now(),
                'updated_at'=>now()
            ]);        

            return redirect()->route('info', Auth::user()->id)->with('success','Su plan ha cambiado');;       
        }
        return redirect()->route('home')->with('fallo','hubo un fallo en el registro');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {

        //obtengo el servicio activo que coincide con el ultimo; ordenado descendemente, y para seleccion un solo registro utilizo first
         $ventas = Venta::where('usuario_id',Auth::user()->id)->orderBy('id','DESC')->first();        
        
        if($ventas){

            Venta::where('id',$ventas->id)->update([
                'estado'=>'baja'
            ]);

            return redirect()->route('info', Auth::user()->id)->with('success','se ha dado de baja su suscripcion'); 
        }

        return redirect()->route('home')->with('fallo','hubo un fallo en el registro');
    }
}
