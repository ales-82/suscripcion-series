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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->string("nombre_producto",70);
            $table->float("pago_suscripcion",8,2);            
            $table->unsignedBigInteger('usuario_id')->nullable();
            $table->enum('estado',['activo','baja'])->default('activo')->nullable();
            $table->timestamps();
                         
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
