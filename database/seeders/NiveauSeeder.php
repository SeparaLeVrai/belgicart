<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NiveauSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Models\Niveau::create([
            'grade' => \App\Models\Niveau::ADMIN,
        ]);

        \App\Models\Niveau::create([
            'grade' => \App\Models\Niveau::USER,
        ]);
    }
}
