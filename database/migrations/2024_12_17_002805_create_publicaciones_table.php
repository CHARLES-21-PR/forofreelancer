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
         Schema::create('publicaciones', function (Blueprint $table) {
             $table->id();
             $table->unsignedBigInteger('id_tema');
             $table->unsignedBigInteger('id_usuario');
             $table->text('contenido', 128);
             $table->date('fecha_creacion');
             $table->timestamps();
 
             $table->foreign('id_tema')->references('id')->on('tema')->onDelete('cascade');
             $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
             
         });
     }
 
     /**
      * Reverse the migrations.
      */
     public function down(): void
     {
         Schema::dropIfExists('publicaciones');
        }
};
