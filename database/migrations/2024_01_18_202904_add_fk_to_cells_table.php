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
            $table->unsignedBigInteger('fkCodLider');

            $table->foreign('fkCodLider')
                ->references('id')
                ->on('members')
                ->onDelete('cascade');

            $table->unsignedBigInteger('fkCodLider2');

            $table->foreign('fkCodLider2')
                ->references('id')
                ->on('members')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cells', function (Blueprint $table) {
            $table->dropForeign(['fkCodLider']);
            $table->dropColumn('fkCodLider');

            $table->dropForeign(['fkCodLider2']);
            $table->dropColumn('fkCodLider2');
        });
    }
};
