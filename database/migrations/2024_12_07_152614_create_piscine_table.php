<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePiscineTable extends Migration
{
    public function up()
    {
        Schema::create('piscine', function (Blueprint $table) {
            $table->id(); // Crea una colonna unsignedBigInteger come chiave primaria
            $table->string('nome', 50);
            $table->string('indirizzo', 255);
            $table->unsignedBigInteger('coordinatore')->nullable(); // FK verso users
            $table->string('foto', 255)->nullable();
            $table->timestamps();
        
            $table->foreign('coordinatore')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('piscine');
    }
}

