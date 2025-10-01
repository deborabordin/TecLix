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
        Schema::create('ponto_de_coletas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('numero');
            $table->string('rua');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ponto_de_coletas');
    }
};
