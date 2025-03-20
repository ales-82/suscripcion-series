<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    
    public function sesion(Request $request){

        /*if(empty($request->email) && empty($request->password)){
            return redirect()->route('login')->with('error','Campos requeridos, por favor ingrese todos sus datos');
        }        */
        $request->validate([
            'email'=>'required|min:3',
            'password'=>'required|min:4'
        ]);

        $credenciales = $request->only('email','password');

        if(Auth::attempt($credenciales)){
            $request->session()->regenerate();

            return redirect()->route('admin.dashboard.index');
        }

        return redirect()->route('login')->with('error','Usuario no registrado, por favor regístrese');
    }

    public function registro(){

        return view('auth.registro');

    }


    public function auth(Request $request){
        $request->validate([
            'usuario'=>'required|min:3',
            'email'=>'required|email',
            'password'=>'required|min:4'
        ]);

        Usuario::create([
            'usuario'=>$request->usuario,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'rol_id'=>2,
            'created_at'=> now(),
             'updated_at'=> now()

        ]);

        return redirect()->route('login')->with('success','Te has registrado al sistema, podés iniciar sesión');
    }

    public function logOut(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('bye','Su sesión ha sido  cerrado correctamente, ¡Te esperamos pronto!');
    }
}
