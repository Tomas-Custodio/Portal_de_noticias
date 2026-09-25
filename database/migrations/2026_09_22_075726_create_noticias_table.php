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
        Schema::create('noticias', function (Blueprint $table) {

            $table->id();

            $table->date('data');

            $table->string('img');

            $table->string('slug')->unique();

            $table->string('titulo');

            $table->text('conteudo');

            $table->string('resumo');

            $table->foreignId('user_id')->cascadeOnDelete();

            $table->foreignId('categoria_id')->cascadeOnDelete();

            $table->string('estado')
                ->default('aberto');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('noticias');
    }
};