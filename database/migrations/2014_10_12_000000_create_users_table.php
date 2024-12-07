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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Può essere usato come nome completo oppure separato
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('foto', 255)->nullable();
            $table->boolean('brevettoAB')->default(false);
            $table->boolean('brevettoIstruttore')->default(true);
            $table->boolean('brevettoNeonatale')->default(false);
            $table->boolean('brevettoBaby')->default(false);
            $table->boolean('brevettoFitness')->default(false);
            $table->boolean('brevettoSportAcqua')->default(false);
            $table->boolean('brevettoNuoto')->default(false);
            $table->boolean('coordinatore')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
