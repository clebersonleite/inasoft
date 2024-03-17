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
        Schema::table('cells', function (Blueprint $table) {
            $table->string('logradouro')->nullable()->change();
            $table->string('numero')->nullable()->change();
            $table->string('bairro')->nullable()->change();
            $table->string('cidade')->nullable()->change();
            $table->string('estado')->nullable()->change();
            $table->string('referencia')->nullable()->change();
            $table->string('cep')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cells', function (Blueprint $table) {
            $table->string('logradouro')->nullable();
            $table->string('numero')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('estado')->nullable();
            $table->string('referencia')->nullable();
            $table->string('cep')->nullable();
        });
    }
};
