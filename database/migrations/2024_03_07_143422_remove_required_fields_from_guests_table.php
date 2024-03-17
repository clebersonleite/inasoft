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
        Schema::table('guests', function (Blueprint $table) {
            Schema::table('guests', function (Blueprint $table) {
                $table->string('telefone')->nullable()->change();
                $table->string('email')->nullable()->change();
                $table->string('recebeu_jesus')->nullable()->change();
                $table->string('reconciliacao')->nullable()->change();
                $table->string('responsavel')->nullable()->change();
                $table->string('observacoes')->nullable()->change();
                $table->string('data_de_nascimento')->nullable()->change();
                $table->string('logradouro')->nullable()->change();
                $table->string('numero')->nullable()->change();
                $table->string('cidade')->nullable()->change();
                $table->string('estado')->nullable()->change();
                $table->string('referencia')->nullable()->change();
                $table->string('cep')->nullable()->change();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('guests', function (Blueprint $table) {
            $table->string('telefone')->change();
            $table->string('email')->change();
            $table->string('recebeu_jesus')->change();
            $table->string('reconciliacao')->change();
            $table->string('responsavel')->change();
            $table->string('observacoes')->change();
            $table->string('data_de_nascimento')->change();
            $table->string('logradouro')->change();
            $table->string('numero')->change();
            $table->string('cidade')->change();
            $table->string('estado')->change();
            $table->string('referencia')->change();
            $table->string('cep')->change();
        });
    }
};
