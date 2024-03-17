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
        Schema::table('members', function (Blueprint $table) {
            $table->string('telefone')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->string('data_de_nascimento')->nullable()->change();
            $table->string('estado_civil')->nullable()->change();
            $table->string('genero')->nullable()->change();
            $table->string('batizado')->nullable()->change();
            $table->unsignedBigInteger('fkCodDepartment')->nullable()->change();
            $table->string('logradouro')->nullable()->change();
            $table->string('numero')->nullable()->change();
            $table->string('cidade')->nullable()->change();
            $table->string('estado')->nullable()->change();
            $table->string('referencia')->nullable()->change();
            $table->unsignedBigInteger('fkCodCell')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->string('telefone')->nullable();
            $table->string('email')->nullable();
            $table->string('data_de_nascimento')->nullable();
            $table->string('estado_civil')->nullable();
            $table->string('genero')->nullable();
            $table->string('batizado')->nullable();
            $table->bigInteger('fkCodDepartment')->nullable();
            $table->string('logradouro')->nullable();
            $table->string('numero')->nullable();
            $table->string('cidade')->nullable();
            $table->string('estado')->nullable();
            $table->string('referencia')->nullable();
            $table->bigInteger('fkCodCell')->nullable()->change();
        });
    }
};
