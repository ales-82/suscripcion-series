<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function products(){

        $products = Producto::all();       
        
        return view('index', compact('products'));

    }

    public function news(){

        $news = Blog::all();       
        
        return view('blogs.novedades.noticias', compact('news'));

    }

    public function articulo($slug){
        $art = Blog::where('slug',$slug)->get();

        $content =  explode('\r\n', $art[0]->contenido);

        return view('blogs.novedades.articulo',compact('art', 'content'));

    }
}
