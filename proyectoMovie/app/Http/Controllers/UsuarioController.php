<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Venta;
use App\Models\Producto;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function perfil($id)
    {

        $usuario = Usuario::select(['id','usuario','email','nombre','apellido','telefono','domicilio','imagen','rol_id'])->where('id',$id)->get();
        //dd($usuario);

        return view('perfil.perfil', compact('usuario'));
    }

    public function index()
    {

        //$user = Usuario::select('usuarios.id','usuarios.usuario','usuarios.email','ventas.nombre_producto','ventas.estado')->join('ventas', 'usuarios.id','=','ventas.usuario_id')->where('estado','activo')->get();

        $user = Usuario::select('usuarios.id','usuarios.usuario','usuarios.email','rols.perfil')->join('rols','usuarios.rol_id','=','rols.id')->where('usuarios.rol_id','2')->get();
        
        $usuario_json = json_decode($user);        

        return view('admin.dashboard.usuarios', compact('usuario_json'));
    }

    public function ver($id)
    {
        $user = Usuario::where('id',$id)->get();

        $historial = Venta::where('usuario_id',$user[0]->id)->orderBy('id','DESC')->get();

        //echo(count($historial));
        if(count($historial)!=0){
            return view('admin.dashboard.ver-usuario', compact('user', 'historial'));
        }
        return view('admin.dashboard.ver-usuario', compact('user'));       

    }   

    /**
     * Display the specified resource.
     */
    public function show($usuario_id)
    {        

         $sale = Venta::where(['usuario_id'=>$usuario_id, 'estado'=>'activo'])->get();
            
         if(count($sale)>0){
            
            $producto = Producto::where('periodo',$sale[0]->nombre_producto)->get();

            return view('perfil.suscripcion', compact('sale', 'producto'));
         }         
         
        return view('perfil.suscripcion', compact('sale'));
    }    

    public function update(Request $request, $id){

        $request->validate([
            'nombre'=>'alpha|min:3|nullable',
            'email'=>'email|nullable',            
            'apellido'=>'alpha|min:3|nullable',
            'telefono'=>'numeric|min:10|nullable',
            'domicilio'=>'String|min:3|nullable',
            'imagen'=>'image|max:2000|mimes:jpg,png,jpeg|dimensions:min_width=200, min_height=200'
        ]);

        $urlImage = $request->prev_image;

        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $destinationPath = "images/";
            $filename = $file->getClientOriginalName();
            $uploadSuccess = $request->file('imagen')->move($destinationPath, $filename);
            $urlImage = "http://localhost:8000/images/" . $filename;            
        }


        $up = Usuario::where('id',$id)->update(
            [
                'email'=>$request->email,                
                'nombre'=>$request->nombre,
                'apellido'=>$request->apellido,
                'telefono'=>$request->telefono,
                'domicilio'=>$request->domicilio,
                'imagen'=>$urlImage
        ]);

        return redirect()->back()->with('success','Su informacion ha sido actualizado');
    }

   
}
