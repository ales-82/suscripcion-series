<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class AuthController extends Controller
{
    public function register(Request $request){

        $validar = $request->validate([
            'usuario'=>'required|String|max:255',
            'email'=>'required|String|email|max:255|unique:users',
            'password'=>'required|String|min:8'            
        ]);

        if(!$validar){
            return response()->json($validar->errors());
        }

        $user = Usuario::create([
            'usuario'=>$request->usuario,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'rol_id'=> 1
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;


        return response()->json(['data'=>$user,'access_token'=>$token,'token_type'=>'Bearer',]);

    }

    public function login(Request $request){

        $credenciales = $request->only('email','password');      

        if(!Auth::attempt($request->only('email','password')))
        {
            return response()->json(['message'=>'Unauthorized'], 401);
        }

        $user = Usuario::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
        ->json([
            'message'=>'Hola '.$user->name,
            'accessToken'=>$token,
            'token_type'=>'Bearer',
            'user'=>$user,
        ]);

    }

    public function logout()
    {
        auth()->user()->token()->delete();

        return ['message'=>'Ha cerrado sesión correctamente y el token se eliminó con éxito'];
    }
}
