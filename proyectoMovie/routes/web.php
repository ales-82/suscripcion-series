<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\admin;
use App\Http\Middleware\usuario;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//los productos
Route::get('/',[App\Http\Controllers\HomeController::class,'products'])->name('home');

/** BLOG O NOTICIAS**/

Route::get('/blog/novedades/noticias',[App\Http\Controllers\HomeController::class,'news'])->name('noticias');

Route::get('/blog/novedades/noticias/{slug}',[App\Http\Controllers\HomeController::class,'articulo'])->name('articulo');


/* Autenticación*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');

    Route::post('/sesion', [\App\Http\Controllers\LoginController::class, 'sesion'])->name('sesion');

    Route::get('/Registro', [\App\Http\Controllers\LoginController::class, 'registro'])->name('registro');


    Route::post('/auth', [\App\Http\Controllers\LoginController::class, 'auth'])->name('auth');
});


Route::middleware('auth')->group(function(){    

    Route::get('cerrar_sesion', [\App\Http\Controllers\LoginController::class, 'logOut'])->name('logout');
    
    //USUARIO-CLIENTE
    Route::middleware([usuario::class])->group(function(){
        
        //Home del producto
        Route::get('/servicio/producto/{producto}',[App\Http\Controllers\ProductoController::class,'show'])->name('producto');

       Route::get('/perfil/{id}',[\App\Http\Controllers\UsuarioController::class, 'perfil'])->name('perfil');

       //actualiza sus datos de perfil
       Route::post('/update/{id}',[\App\Http\Controllers\UsuarioController::class, 'update'])->name('update-perfil'); 

       /**FIN CONFIGURACIÓN USUARIO**/

       /** SUSCRIPCIONES **/       

       //muestra las suscripciones
       Route::get('/suscripcion/{usuario_id}',[\App\Http\Controllers\UsuarioController::class, 'show'])->name('info');

        //paga por primera vez la suscripción.
       Route::get('/pago_confirmado/{id}',[\App\Http\Controllers\VentaController::class,'pagoConfirmado']);

       //cambia de plan de suscripción.
       Route::get('/cambiar-plan/{id}',[\App\Http\Controllers\ProductoController::class, 'edit'])->name('edit.producto');

       Route::get('/cambiar-plan-elegido/{id}',[\App\Http\Controllers\ProductoController::class, 'cambiarPlan'])->name('cambiar.plan');

       //paga por cambiar de suscripción.
       Route::get('/actualizar-plan/{id}',[\App\Http\Controllers\VentaController::class, 'update']);

       //cancela el plan de suscripción
       Route::get('/cancelar-plan',[\App\Http\Controllers\VentaController::class, 'destroy'])->name('cancelar.plan');
    });
   
   //ADMINISTRADOR 
   Route::middleware([admin::class])->group(function(){

        Route::get('admin/dashboard',[\App\Http\Controllers\VentaController::class, 'index'])->name('admin.dashboard.index');

        Route::get('admin/dashboard/abm-noticias',[\App\Http\Controllers\BlogController::class, 'index'])->name('abmnoticias');

        Route::get('admin/dashboard/abm-noticias/create',[\App\Http\Controllers\BlogController::class, 'create'])->name('abm-noticias.create');

        Route::post('admin/abm-noticias/store',[\App\Http\Controllers\BlogController::class,'store'])->name('abm-noticias.store');

        Route::get('admin/dashboard/abm-noticias/{blog}/edit',[\App\Http\Controllers\BlogController::class, 'edit'])->name('abm-noticias.edit');

        Route::post('admin/dashboard/abm-noticias/{blog}/update',[\App\Http\Controllers\BlogController::class, 'update'])->name('abm-noticias.update');


        Route::get('admin/dashboard/abm-noticias/delete/{id}',[\App\Http\Controllers\BlogController::class, 'destroy'])->name('abm-noticias.destroy');

        Route::get('admin/dashboard/usuarios',[\App\Http\Controllers\UsuarioController::class, 'index'])->name('usuarios');

        Route::get('admin/dashboard/usuarios/{id}/ver',[\App\Http\Controllers\UsuarioController::class, 'ver'])->name('ver-usuarios');
    });
  
});

