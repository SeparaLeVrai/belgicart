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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->foreignId('reponse1_id')->constrained('reponses');
            $table->foreignId('reponse2_id')->constrained('reponses');
            $table->foreignId('categorie_id')->constrained('categories');
            $table->foreignId('difficulte_id')->constrained('difficultes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
