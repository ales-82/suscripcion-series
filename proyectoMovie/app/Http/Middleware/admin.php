<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth()->user()->rol_id == 1){
            return $next($request);
        }elseif(Auth()->user()->rol_id == 2){
            return redirect()->route('home')->with('message','Ha ingresado a nuestro sitio;');
        }else{
            return "Usuario no registrado";
        }        
    }
}
