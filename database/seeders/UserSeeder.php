<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'pseudo' => 'Separa',
            'email' => 'carrenicolas18@gmail.com',
            'password' => Hash::make('test'),
            'avatar' => '/storage/avatar/pika.ping',
            'pays_id' => 2,
            'niveau_id' => 1,
        ]);

        \App\Models\User::create([
            'pseudo' => 'test',
            'email' => 'testuser@gmail.com',
            'password' => Hash::make('test'),
            'pays_id' => 2,
            'niveau_id' => 2,
        ]);
    }
}
