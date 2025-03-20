<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegistroVentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('registro_venta')->insert([
            [
                'producto_id' => 2,
                'venta_id'=> 1,                
                'created_at' => now(),
                'updated_at' => now()
            ],            
        ]);
    }
}
