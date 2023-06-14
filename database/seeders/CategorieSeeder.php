<?php

namespace Database\Seeders;

use App\Models\Categories;
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

        \App\Models\Categories::create([
            'nom' => \App\Models\Categories::INSOLITE,
        ]);

        // $categories = [
        //     [
        //         'nom' => 'Relief',
        //     ],
        //     [
        //         'nom' => 'Hydrographie',
        //     ],
        //     [
        //         'nom' => 'Monuments',
        //     ],
        //     [
        //         'nom' => 'Population',
        //     ],
        //     [
        //         'nom' => 'Lieux insolites',
        //     ],
        // ];

        // foreach ($categories as $category) {
        //     Categories::create($category);
        // }
    }
}
