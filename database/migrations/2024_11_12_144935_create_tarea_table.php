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
        Schema::create('tarea', function (Blueprint $table) {
            $table->id();
            $table->string('dni');
            $table->string('titulo');
            $table->string('descripcion');
            $table->date('fecha_vencimiento')->nullable(); 
            $table->bigInteger('estado_id')->nullable();
            $table->bigInteger('users_id')->nullable();
            $table->bigInteger('status')->nullable();
            $table->timestamps();
            $table->index(['estado_id']);
            $table->index(['users_id']);
            $table->index(['status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarea');
    }
};
