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
        Schema::create('artista_tema', function (Blueprint $table) {
            $table->foreignId("artista_id")->constrained("artistas");
            $table->foreignId("tema_id")->constrained("temas");
            $table->primary(['artista_id', 'tema_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artista_tema');
    }
};
