<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'question' => 'Quel est le point culminant de la Belgique ?',
                'reponse1' => 'Signal de Botrange',
                'reponse2' => 'Baraque Michel',
                'categorie_id' => 1,
                'difficulte_id' => 1,
            ],
        ];

        foreach ($questions as $question) {
            Question::create($question);
        }
    }
}
