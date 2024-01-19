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
        Schema::create('cells', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->enum('tipo', ['familia', 'mulheres', 'homens', 'adolescentes', 'jovens', 'casais']);
            $table->string('anfitriao');
            $table->string('data_de_abertura');
            $table->string('logradouro');
            $table->string('numero');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('estado');
            $table->string('referencia');
            $table->string('cep');
            $table->unsignedBigInteger('fkCodChurch');

            $table->foreign('fkCodChurch')
                ->references('id')
                ->on('churches')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cells');
    }
};
