<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Simone Ragusini',
            'email' => 'simone.ragu@gmail.com',
            'password' => Hash::make('password123'), // Password criptata
            'foto' => null, // Puoi aggiungere un URL della foto se disponibile
            'brevettoAB' => true,
            'brevettoIstruttore' => false,
            'brevettoNeonatale' => false,
            'brevettoBaby' => false,
            'brevettoFitness' => false,
            'brevettoSportAcqua' => false,
            'brevettoNuoto' => false,
            'coordinatore' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
