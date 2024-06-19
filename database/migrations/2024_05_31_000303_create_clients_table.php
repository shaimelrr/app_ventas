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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('ci', 15);
            $table->string('name', 75);
            $table->date('birth_date');
            $table->string('gender', 15);

            // Cambiar group_id para permitir valores nulos
            $table->unsignedBigInteger('group_id')->nullable();

            // Eliminar la restricción de clave foránea (foreign key constraint)
            // $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            // Si deseas mantener la relación, puedes dejarla así y definir grupos en la base de datos

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
