<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('members')->insert([
            [
                'photo'        => 'images/members/member_1.jpg',
                'name'         => 'Zachran Razendra',
                'position'     => 'Founder & Web Developer',
                'qualification'=> 'Master of Business Administration',
                'attribute'    => 'Visionary leader, strategic thinker, and passionate entrepreneur.',
                'skill'        => 'Leadership, Business Strategy, Negotiation',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'photo'        => 'images/members/member_2.jpg',
                'name'         => 'Muhammad Raista Firdaus',
                'position'     => 'UI/UX Designer',
                'qualification'=> 'Bachelor of Computer Science',
                'attribute'    => 'Tech enthusiast with a passion for innovation and problem-solving.',
                'skill'        => 'Software Development, Cloud Computing, Cybersecurity',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'photo'        => 'images/members/member_3.jpg',
                'name'         => 'Adnin Farizie Miradi',
                'position'     => 'Quality Assurance',
                'qualification'=> 'Master of Management',
                'attribute'    => 'Strong analytical skills and a results-oriented mindset.',
                'skill'        => 'Operations Management, Process Optimization, Team Building',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'photo'        => 'images/members/member_4.jpg',
                'name'         => 'Taufan Rahmatdani',
                'position'     => 'Business Analyst',
                'qualification'=> 'Bachelor of Marketing',
                'attribute'    => 'Creative and data-driven marketer with a passion for branding.',
                'skill'        => 'Digital Marketing, Market Analysis, Brand Strategy',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
        ]);
    }
}
