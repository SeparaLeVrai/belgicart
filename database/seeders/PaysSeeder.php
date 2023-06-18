<?php

namespace Database\Seeders;

use App\Models\Pays;
use Illuminate\Database\Seeder;

class PaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Models\Pays::create([
            'paysFr' => \App\Models\Pays::FRANCE,
            'paysEn' => \App\Models\Pays::FRANCE2,
            'paysNl' => \App\Models\Pays::FRANCE3,
            'paysDe' => \App\Models\Pays::FRANCE4,
        ]);

        \App\Models\Pays::create([
            'paysFr' => \App\Models\Pays::BELGIQUE,
            'paysEn' => \App\Models\Pays::BELGIQUE2,
            'paysNl' => \App\Models\Pays::BELGIQUE3,
            'paysDe' => \App\Models\Pays::BELGIQUE4,
        ]);

        \App\Models\Pays::create([
            'paysFr' => \App\Models\Pays::ALLEMAGNE,
            'paysEn' => \App\Models\Pays::ALLEMAGNE2,
            'paysNl' => \App\Models\Pays::ALLEMAGNE3,
            'paysDe' => \App\Models\Pays::ALLEMAGNE4,
        ]);

        \App\Models\Pays::create([
            'paysFr' => \App\Models\Pays::PAYSBAS,
            'paysEn' => \App\Models\Pays::PAYSBAS2,
            'paysNl' => \App\Models\Pays::PAYSBAS3,
            'paysDe' => \App\Models\Pays::PAYSBAS4,
        ]);

        \App\Models\Pays::create([
            'paysFr' => \App\Models\Pays::ROYAUMEUNI,
            'paysEn' => \App\Models\Pays::ROYAUMEUNI2,
            'paysNl' => \App\Models\Pays::ROYAUMEUNI3,
            'paysDe' => \App\Models\Pays::ROYAUMEUNI4,
        ]);

        \App\Models\Pays::create([
            'paysFr' => \App\Models\Pays::LUXEMBOURG,
            'paysEn' => \App\Models\Pays::LUXEMBOURG2,
            'paysNl' => \App\Models\Pays::LUXEMBOURG3,
            'paysDe' => \App\Models\Pays::LUXEMBOURG4,
        ]);

        // $pays = [
        //     [
        //         'pays' => 'France',
        //     ],
        //     [
        //         'pays' => 'Belgique',
        //     ],
        // ];

        // foreach ($pays as $payss) {
        //     Pays::create($payss);
        // }
    }
}
