<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('productos')->insert([
            [
                'nombre'=>'Plan 1',
                'periodo'=>'1 mes',
                'precio'=> 499.00,
                'detalles'=> 'Todos los dispositivos\r\n 3 dispositivos a la vez\r\n Alta definición y 4K\r\n Descarga hasta 30 títulos\r\n 5 Perfiles',
                'created_at'=> now(),
                'updated_at'=> now()
            ],
            [
                'nombre'=>'Plan 2',
                'periodo'=>'3 meses',
                'precio'=> 1249.00,
                'detalles'=> 'Todos los dispositivos\r\n 3 dispositivos a la vez\r\n Alta definición y 4K\r\n Descarga hasta 30 títulos\r\n 5 Perfiles',
                'created_at'=> now(),
                'updated_at'=> now()
            ],
            [
                'nombre'=>'Plan 3',
                'periodo'=>'12 meses',
                'precio'=> 3999.00,
                'detalles'=> 'Todos los dispositivos\r\n 3 dispositivos a la vez\r\n Alta definición y 4K\r\n Descarga hasta 30 títulos\r\n 5 Perfiles\r\n Chromecast y Airplay disponibles.\r\n Descarga y disfruta donde sea.',
                'created_at'=> now(),
                'updated_at'=> now()
            ],
        ]);
    }
}
