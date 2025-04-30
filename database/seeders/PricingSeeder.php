<?php

namespace Database\Seeders;

use App\Models\Pricing;
use Illuminate\Database\Seeder;

class PricingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pricings = [
            [
                'title' => 'Web Design Package',
                'description' => 'Web design packages offered a range of services and features to create websites.',
                'monthly_price' => 299,
                'quarterly_price' => 850,
                'semi_annually_price' => 1600,
                'annually_price' => 3200,
                'features' => [
                    'Consultation & Discovery',
                    'Responsive Design',
                    'E-commerce Integration',
                    'Custom Web Design',
                    'Testing and Quality Assurance',
                ],
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'UX/UI Package',
                'description' => 'UX/UI package offered a set of services aimed at designing user-friendly UI/UX.',
                'monthly_price' => 499,
                'quarterly_price' => 1450,
                'semi_annually_price' => 2800,
                'annually_price' => 5000,
                'features' => [
                    'Information Architecture',
                    'Wireframing & Prototyping',
                    'Usability Testing',
                    'Visual Design',
                    'User Interface (UI) Design',
                ],
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Branding Package',
                'description' => 'Branding package typically includes a comprehensive set of brand\'s identity.',
                'monthly_price' => 299,
                'quarterly_price' => 850,
                'semi_annually_price' => 1600,
                'annually_price' => 3200,
                'features' => [
                    'Brand Guidelines',
                    'Stationery & Website Design',
                    'E-commerce Integration',
                    'Social Media Assets',
                    'Signage & Packaging Design',
                ],
                'is_active' => true,
                'sort_order' => 3,
            ],
        ];

        foreach ($pricings as $pricing) {
            Pricing::create($pricing);
        }
    }
}
