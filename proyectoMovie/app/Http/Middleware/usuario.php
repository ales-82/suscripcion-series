<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class usuario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth()->user()->rol_id == 2){
            return $next($request);
        }elseif(Auth()->user()->rol_id == 1){
            return redirect()->route('admin.dashboard.index');
        }else{
            return "Usuario no registrado";
        }
        //return $next($request);
    }
}
