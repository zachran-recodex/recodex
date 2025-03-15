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
                'name'         => 'Andi Wijaya',
                'position'     => 'CEO',
                'qualification'=> 'Master of Business Administration',
                'attribute'    => 'Visionary leader, strategic thinker, and passionate entrepreneur.',
                'skill'        => 'Leadership, Business Strategy, Negotiation',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'photo'        => 'images/members/member_2.jpg',
                'name'         => 'Budi Santoso',
                'position'     => 'CTO',
                'qualification'=> 'Bachelor of Computer Science',
                'attribute'    => 'Tech enthusiast with a passion for innovation and problem-solving.',
                'skill'        => 'Software Development, Cloud Computing, Cybersecurity',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'photo'        => 'images/members/member_3.jpg',
                'name'         => 'Citra Lestari',
                'position'     => 'COO',
                'qualification'=> 'Master of Management',
                'attribute'    => 'Strong analytical skills and a results-oriented mindset.',
                'skill'        => 'Operations Management, Process Optimization, Team Building',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'photo'        => 'images/members/member_4.jpg',
                'name'         => 'Dewi Anggraini',
                'position'     => 'CMO',
                'qualification'=> 'Bachelor of Marketing',
                'attribute'    => 'Creative and data-driven marketer with a passion for branding.',
                'skill'        => 'Digital Marketing, Market Analysis, Brand Strategy',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'photo'        => 'images/members/member_5.jpg',
                'name'         => 'Eko Prasetyo',
                'position'     => 'CFO',
                'qualification'=> 'Certified Public Accountant (CPA)',
                'attribute'    => 'Detail-oriented finance expert with a knack for financial planning.',
                'skill'        => 'Financial Analysis, Budgeting, Risk Management',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
        ]);
    }
}
