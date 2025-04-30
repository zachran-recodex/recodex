<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'William Jack',
                'position' => 'Founder@XYZ',
                'rating' => 5,
                'title' => 'Super customer service!',
                'content' => 'Excellent customer service and I was really impressed and happy with my purchase especially as it was a last minute order which got to me in time, and when it arrived I was very happy with the design and size and so was the recipient.',
                'photo_path' => 'assets/img/images/th-1/testimonial-user-img-1.png',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Smith Align',
                'position' => 'Businessman',
                'rating' => 5,
                'title' => 'Exceptional creativity and vision',
                'content' => 'Working with Mthemeus was a game-changer for our brand. Their exceptional creativity & vision breathed new life into our visual. The logo they designed perfectly captures our essence & has become instantly recognizable. We couldn\'t be happier with the results!',
                'photo_path' => 'assets/img/images/th-1/testimonial-user-img-2.png',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Milano Joe',
                'position' => 'Creative Director',
                'rating' => 5,
                'title' => 'Innovative and professional',
                'content' => 'I can\'t say enough good things about them. Their team is not only incredibly talented but also highly professional. They listened to our ideas and brought them to life in ways we couldn\'t have imagined. Their innovative approach and dedication to our project.',
                'photo_path' => 'assets/img/images/th-1/testimonial-user-img-3.png',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Danial Mark',
                'position' => 'Marketing Director',
                'rating' => 5,
                'title' => 'Transformed our brand',
                'content' => 'Our partnership with Mthemeus transformed our brand from ordinary to extraordinary. Their branding expertise and meticulous design work elevated our marketing materials to a whole new level. Our customers have taken notice, and boost in brand recognition.',
                'photo_path' => 'assets/img/images/th-1/testimonial-user-img-4.png',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'Jastine Strudo',
                'position' => 'Product Manager',
                'rating' => 5,
                'title' => 'Outstanding Attention to Detail',
                'content' => 'Mthemeus has an outstanding attention to detail. They meticulously crafted every aspect of our project, ensuring that it not only met but exceeded our expectations. Their commitment to quality shines through in every design they create.',
                'photo_path' => 'assets/img/images/th-1/testimonial-user-img-5.png',
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'name' => 'Andrew Trate',
                'position' => 'Marketing Director',
                'rating' => 5,
                'title' => 'Positive Impact on Sales',
                'content' => 'The designs produced by [Design Agency Name] had an immediate positive impact on our sales and customer engagement. Their work speaks for itself, and we\'ve received countless compliments on our new branding and marketing materials.',
                'photo_path' => 'assets/img/images/th-1/testimonial-user-img-6.png',
                'is_active' => true,
                'sort_order' => 6,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
