<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;

class Blog extends Model
{
    use HasFactory;

     protected $fillable = [
        'titulo',
        'slug',
        'resumen',
        'contenido',
        'imagen',
        'usuario_id'
    ];

    public function usuarios(){
        return $this->belongsTo(Usuario::class);
    }
}
