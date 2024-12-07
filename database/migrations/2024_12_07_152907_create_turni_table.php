<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurniTable extends Migration
{
    public function up()
{
    if (!Schema::hasTable('turni')) {
        Schema::create('turni', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bagnino');
            $table->unsignedBigInteger('piscina');
            $table->string('ruolo', 50);
            $table->date('data');
            $table->time('oraInizio');
            $table->time('oraFine');
            $table->decimal('compenso', 10, 2);
            $table->timestamps();

            $table->foreign('bagnino')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('piscina')->references('id')->on('piscine')->onDelete('cascade');
            $table->foreign('ruolo')->references('nome')->on('ruoli')->onDelete('cascade');
        });
    }
}

    public function down()
    {
        Schema::dropIfExists('turni');
    }
}
