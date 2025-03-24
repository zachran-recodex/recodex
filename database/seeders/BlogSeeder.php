<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogs = [];

        for ($i = 1; $i <= 20; $i++) {
            $blogs[] = [
                'title'       => 'Blog Post ' . $i,
                'description' => 'Ini adalah deskripsi dari blog post ke-' . $i,
                'image'       => 'images/blog_' . $i . '.jpg',
                'created_at'  => now(),
                'updated_at'  => now(),
            ];
        }

        DB::table('blogs')->insert($blogs);
    }
}
