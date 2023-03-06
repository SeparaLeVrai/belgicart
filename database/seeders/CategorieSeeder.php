<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Models\Categories::create([
            'nom' => \App\Models\Categories::RELIEF,
        ]);

        \App\Models\Categories::create([
            'nom' => \App\Models\Categories::HYDROGRAPHIE,
        ]);

        \App\Models\Categories::create([
            'nom' => \App\Models\Categories::MONUMENTS,
        ]);

        \App\Models\Categories::create([
            'nom' => \App\Models\Categories::POPULATION,
        ]);
    }
}
