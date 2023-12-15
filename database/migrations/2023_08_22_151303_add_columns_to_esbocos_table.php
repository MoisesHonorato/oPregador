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
        Schema::table('esbocos', function (Blueprint $table) {
            $table->unsignedBigInteger('livro_id')->nullable();
            $table->integer('capitulo')->nullable();
            $table->string('versiculo')->nullable();
            $table->foreign('livro_id')->references('id')->on('livros')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('esbocos', function (Blueprint $table) {
            $table->dropForeign(['livro_id']);
            $table->dropColumn(['livro_id', 'capitulo', 'versiculo']);
        });
    }
};
