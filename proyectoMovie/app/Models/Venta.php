<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;
use App\Models\Producto;


class Venta extends Model
{
    use HasFactory;

    protected $fillable = [
            'id',
            'nombre_producto',
            'pago_suscripcion',         
            'venta_id'
        ];


    public function usuarios(){
        return $this->belongsTo(Usuario::class);
    }

    public function productos(){         
        
        return $this->belongsToMany(Producto::class,'registro_venta');

    }
}
