<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRuoliTable extends Migration
{
    public function up()
    {
        Schema::create('ruoli', function (Blueprint $table) {
            $table->string('nome', 50)->primary(); // Nome come chiave primaria
            $table->decimal('prezzoConBrevetto', 10, 2); // Prezzo con brevetto
            $table->decimal('prezzoSenzaBrevetto', 10, 2); // Prezzo senza brevetto
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ruoli');
    }
}
