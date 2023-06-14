<?php

namespace Database\Seeders;

use App\Models\Reponse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reponses = [
            [
                'text' => 'Signal de Botrange',
                'good_answer' => 1,
            ],
            [
                'text' => 'Baraque Michel',
                'good_answer' => 0,
            ],
        ];

        foreach ($reponses as $reponse) {
            Reponse::create($reponse);
        }
    }
}
