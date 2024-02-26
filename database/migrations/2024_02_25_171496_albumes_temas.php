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
        Schema::create('album_tema', function (Blueprint $table) {
            $table->foreignId("album_id")->constrained("albumes");
            $table->foreignId("tema_id")->constrained("temas");
            $table->primary(['album_id', 'tema_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('album_temas');
    }
};
