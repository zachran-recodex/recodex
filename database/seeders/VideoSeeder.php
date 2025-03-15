<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $videos = [
            'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            'https://www.youtube.com/watch?v=3JZ_D3ELwOQ',
            'https://www.youtube.com/watch?v=2Vv-BfVoq4g',
            'https://www.youtube.com/watch?v=kJQP7kiw5Fk',
            'https://www.youtube.com/watch?v=L_jWHffIx5E',
        ];

        foreach ($videos as $video) {
            DB::table('videos')->insert([
                'youtube_link' => $video,
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);
        }
    }
}
