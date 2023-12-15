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
        Schema::create('sermons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('esboco_id');
            $table->unsignedBigInteger('usuario_id');
            $table->string('local_sermon');
            $table->date('data_sermon');
            $table->text('observacao');
            $table->timestamps();

            // Chaves estrangeiras
            $table->foreign('esboco_id')->references('id')->on('esbocos');
            $table->foreign('usuario_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sermons');
    }
};
