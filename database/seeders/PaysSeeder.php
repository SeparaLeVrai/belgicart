<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Models\Pays::create([
            'pays' => \App\Models\Pays::FRANCE,
        ]);

        \App\Models\Pays::create([
            'pays' => \App\Models\Pays::BELGIQUE,
        ]);
    }
}
