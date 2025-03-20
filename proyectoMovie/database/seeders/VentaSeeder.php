<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('ventas')->insert([
            [
                'nombre_producto' => '3 meses',
                'pago_suscripcion'=> 1249.00,
                'usuario_id' => 3,                
                'created_at' => now(),
                'updated_at' => now()
            ],            
        ]);
    }
}
