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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->string('fechaInicio');
            $table->string('fechaFin');
            $table->string('cedula_cliente');
            //$table->foreign('cedula_cliente')->references('cedula')->on('clientes')->onDelete('cascade');
            $table->string('codigo_habitacion');
            //$table->foreign('codigo_habitacion')->references('codigo')->on('habitacions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
