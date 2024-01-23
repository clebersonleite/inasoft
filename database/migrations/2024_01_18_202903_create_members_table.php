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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email');
            $table->string('telefone');
            $table->string('data_de_nascimento');
            $table->string('logradouro');
            $table->string('numero');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('estado');
            $table->string('referencia');
            $table->string('cep');
            $table->enum('genero', ['masculino', 'feminino']);
            $table->enum('estado_civil', ['casado', 'solteiro', 'divorciado', 'viúvo']);
            $table->boolean('batizado');
            $table->enum('cargo', ['membro', 'anfitrião', 'líder', 'supervisor', 'coordenador', 'pastor']);

            $table->unsignedBigInteger('fkCodDepartment')->default(null)->nullable();;

            $table->foreign('fkCodDepartment')
                ->references('id')
                ->on('departments')
                ->onDelete('cascade')
                ->nullable();

            $table->unsignedBigInteger('fkCodCell')->default(null)->nullable();;

            $table->foreign('fkCodCell')
                ->references('id')
                ->on('cells')
                ->onDelete('cascade')
                ->nullable();

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
        Schema::dropIfExists('members');
    }
};
