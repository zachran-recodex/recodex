<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Member::create([
            'name' => 'Andrew Mark',
            'position' => 'CEO',
            'photo_path' => null,
            'description' => 'Andrew Mark is the CEO of our design agency. He plays a key role in overseeing the agency\'s operations, growth and strategic direction. As the leader of the organization, he also sets the company\'s vision, mission, and values. He spent 15 years providing strategic direction and ensuring the organization\'s goals and objectives were met.',
            'social_links' => [
                'twitter' => 'http://www.twitter.com',
                'facebook' => 'http://www.facebook.com',
                'instagram' => 'http://www.instagram.com',
                'linkedin' => 'http://www.linkedin.com',
            ],
            'is_active' => true,
            'sort_order' => 1,
        ]);
    }
}
