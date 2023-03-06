<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DifficulteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Models\Difficulte::create([
            'level' => \App\Models\Difficulte::DEBUTANT,
        ]);

        \App\Models\Difficulte::create([
            'level' => \App\Models\Difficulte::AMATEUR,
        ]);

        \App\Models\Difficulte::create([
            'level' => \App\Models\Difficulte::EXPERT,
        ]);
    }
}
