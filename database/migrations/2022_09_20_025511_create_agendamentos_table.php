<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email');
            $table->string('whatsapp')->nullable();
            $table->boolean('corte')->default(false)->nullable();
            $table->boolean('sobrancelhas')->default(false)->nullable();
            $table->boolean('barba')->default(false)->nullable();
            $table->boolean('hidratacao')->default(false)->nullable();
            $table->string('horario')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendamentos');
    }
};
