<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Venta;

class Producto extends Model
{
    use HasFactory;

     protected $fillable = [
            'id',
            'nombre',
            'periodo',
            'precio',
            'detalles',
            'created_at'            
      ];

     public function ventas(){         
        
        return $this->belongsToMany(Venta::class,'registro_venta');

    }   
    
}
