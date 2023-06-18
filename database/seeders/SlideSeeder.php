<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Slides::create([
            'path' => '/storage/images/7ke7HZWE3XBidlWZMVttuJ15TqzI356QmdP2ILtg.png',
        ]);

        \App\Models\Slides::create([
            'path' => '/storage/avatar/b1zG4qAGRaZGpgrtu6TYqTes7chCKBxaxep96ZHI.jpg',
        ]);

        \App\Models\Slides::create([
            'path' => '/storage/images/photo1.jpeg',
        ]);

        \App\Models\Slides::create([
            'path' => '/storage/images/photo2.jpeg',
        ]);

        \App\Models\Slides::create([
            'path' => '/storage/images/photo3.jpeg',
        ]);
    }
}
