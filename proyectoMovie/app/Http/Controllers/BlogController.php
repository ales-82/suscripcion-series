<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use App\Http\Requests\StoreBlogRequest;
//use App\Http\Requests\UpdateBlogRequest;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $noticias = Blog::orderBy('id','desc')->paginate(5);
        return view('admin.dashboard.abm-noticias', compact('noticias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //return 1;
        return view('admin.dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo'=>'required|min:5',
            'resumen'=>'String|nullable',
            'contenido'=>'required|String|min:20',            
            'imagen'=>'required|image|max:2000|mimes:jpg,png,jpeg'
        ]);

        $urlImage = null;

        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $destinationPath = "images/";
            $filename = $file->getClientOriginalName();
            $uploadSuccess = $request->file('imagen')->move($destinationPath, $filename);
            $urlImage = "http://localhost:8000/images/" . $filename;
        }
         
         $request_slug = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($request->titulo));

        Blog::create([
            'titulo'=>$request->titulo,
            'slug'=> $request_slug,
            'resumen'=>$request->resumen,
            'contenido'=>$request->contenido,
            'imagen'=>$urlImage,
            'usuario_id'=>Auth::user()->rol_id,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        return redirect()->route('abmnoticias')->with('success','Publicación registrada');
    }    
   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $blog = Blog::where('id',$blog->id)->get();

        return view('admin.dashboard.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'titulo'=>'min:5',
            'resumen'=>'String|nullable',
            'contenido'=>'|String|min:20',            
            'imagen'=>'image|max:2000|mimes:jpg,png,jpeg'
        ]);      
        $urlImage = $blog->imagen;

        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $destinationPath = "images/";
            $filename = $file->getClientOriginalName();
            $uploadSuccess = $request->file('imagen')->move($destinationPath, $filename);
            $urlImage = "http://localhost:8000/images/" . $filename;
        }

        $request_slug = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($request->titulo));        

        Blog::where('id',$blog->id)->update([
            'titulo'=>$request->titulo,
            'slug'=>$request_slug,
            'resumen'=>$request->resumen,
            'contenido'=>$request->contenido,
            'imagen'=>$urlImage,
            'usuario_id'=>Auth::user()->rol_id           
        ]);
        
        return redirect()->route('abmnoticias')->with('success','Publicación actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $delete = Blog::where('id',$id)->delete();

        return redirect()->route('abmnoticias')->with('delete','Se ha eliminado el artículo');
    }
}
