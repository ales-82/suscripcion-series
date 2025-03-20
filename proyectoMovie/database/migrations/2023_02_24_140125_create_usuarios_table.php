<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('usuario',50);
            $table->string('email',50)->unique();
            $table->string('password',150);
            $table->string('nombre',70)->nullable();
            $table->string('apellido',70)->nullable();
            $table->string('telefono',20)->nullable();
            $table->string('domicilio',100)->nullable();
            $table->text('imagen')->nullable();
            
            //1 tipo admin, 2 tipo usuario
            $table->unsignedBigInteger('rol_id')->nullable();
            $table->timestamps();

            $table->foreign('rol_id')->references('id')->on('rols')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
