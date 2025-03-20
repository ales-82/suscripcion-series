<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Rol;
use App\Models\Blog;
use App\Models\Venta;


class Usuario extends User
{
     use HasApiTokens, Notifiable;

    protected $fillable = [
        'usuario',
        'email',
        'password',
        'nombre',
        'apellido',
        'telefono',
        'domicilio',
        'rol_id'
    ];

    public function rols(){
        return $this->belongsTo(Rol::class);
    }

    public function blogs(){

        return $this->hasMany(Blog::class);

    }

    public function ventas(){

        return $this->hasMany(Venta::class);

    }

}
