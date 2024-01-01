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
        Schema::create('photo_markers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('photo_id')->nullable();

            $table->string('code')->nullable(); // Código do marcador
            $table->string('icon_path')->nullable(); // Ícone que será exibido
            $table->string('tooltip', 50)->nullable(); // Título (hover no ícone)
            $table->text('content')->nullable(); // Descrição detalhada (pop up que abre na direita ao clicar no ícone)
            $table->float('yaw', 8, 6)->nullable(); // Orientação horizontal, com precisão decimal
            $table->float('pitch', 8, 6)->nullable(); // Inclinação, com precisão decimal
            $table->integer('clientX')->nullable(); // Posição do clique no cliente X
            $table->integer('clientY')->nullable(); // Posição do clique no cliente Y
            $table->integer('textureX')->nullable(); // Coordenada X na textura
            $table->integer('textureY')->nullable(); // Coordenada Y na textura
            $table->integer('viewerX')->nullable(); // Posição X no visor
            $table->integer('viewerY')->nullable(); // Posição Y no visor

            $table->timestamps();
            $table->foreign('photo_id')->references('id')->on('photos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photo_markers');
    }
};
