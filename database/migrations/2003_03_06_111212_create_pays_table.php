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
        Schema::create('pays', function (Blueprint $table) {
            $table->id();
            $table->enum('paysFr', \App\Models\Pays::paysFr());
            $table->enum('paysEn', \App\Models\Pays::paysEn());
            $table->enum('paysNl', \App\Models\Pays::paysNl());
            $table->enum('paysDe', \App\Models\Pays::paysDe());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pays');
    }
};
