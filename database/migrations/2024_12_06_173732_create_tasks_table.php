<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Título de la tarea
            $table->text('details')->nullable(); // Detalles opcionales
            $table->boolean('completed')->default(false); // Estado de la tarea
            $table->unsignedBigInteger('project_id'); // Relación con el proyecto
            $table->timestamps();

            // Clave foránea
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
