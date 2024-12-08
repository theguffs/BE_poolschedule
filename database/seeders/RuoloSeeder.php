<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RuoloSeeder extends Seeder
{
    public function run()
    {
        DB::table('ruoli')->insert([
            ['nome' => 'AB', 'prezzoConBrevetto' => 10.45, 'prezzoSenzaBrevetto' =>  0],
        ]);
    }
}