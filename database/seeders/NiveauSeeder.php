<?php

namespace Database\Seeders;

use App\Models\Niveau;
use Illuminate\Database\Seeder;

class NiveauSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Models\Niveau::create([
            'niveau' => \App\Models\Niveau::ADMIN,
        ]);

        \App\Models\Niveau::create([
            'niveau' => \App\Models\Niveau::USER,
        ]);
        // $niveaux = [
        //     [
        //         'niveau' => 'Administrateur',
        //     ],
        //     [
        //         'niveau' => 'Utilisateur',
        //     ],
        // ];

        // foreach ($niveaux as $niveau) {
        //     Niveau::create($niveau);
        // }
    }
}
