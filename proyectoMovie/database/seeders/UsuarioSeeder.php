<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usuarios')->insert([
            [
                'usuario'=>'admin',
                'email'=>'admin@admin.com',
                'password'=>Hash::make('1234'),
                'rol_id'=> 1,
                'created_at'=> now(),
                'updated_at'=> now()
            ],
            [
                'usuario'=>'usuario',
                'email'=>'usuario@gmail.com',
                'password'=>Hash::make('1234'),
                'rol_id'=> 2,
                'created_at'=> now(),
                'updated_at'=> now()
            ],
            [
                'usuario'=>'cliente',
                'email'=>'cliente@gmail.com',
                'password'=>Hash::make('1234'),
                'rol_id'=> 2,
                'created_at'=> now(),
                'updated_at'=> now()
            ]

        ]);
    }
}
