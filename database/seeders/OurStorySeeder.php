<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class OurStorySeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        // =========================
        // 1️⃣ HERO SECTION
        // =========================
        DB::table('our_story_sections')->insert([
            'type' => 'hero',
            'title' => 'Who Are We – Why Us?',
            'description' => 'At JM Innovatech Photography, we are more than just a creative studio — we’re storytellers driven by passion, precision, and purpose. With a blend of art and technology, we bring your moments to life through captivating visuals, cinematic quality, and unmatched professionalism.',
            'meta' => json_encode([
                'hero_image' => 'https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?q=80&w=800&auto=format&fit=crop',
                'hero_title' => 'Who Are We – Why Us?',
                'hero_description' => 'At JM Innovatech Photography, we are more than just a creative studio — we’re storytellers driven by passion, precision, and purpose.',
            ]),
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // =========================
        // 2️⃣ ABOUT / PAGE INFO SECTION
        // =========================
        DB::table('our_story_sections')->insert([
            'type' => 'page_info',
            'title' => 'About Us',
            'description' => 'Founded on creativity and innovation, JM Innovatech Photography has grown into a trusted name in visual storytelling. We combine artistic vision, advanced technology, and a customer-first approach to capture the essence of every moment.',
            'meta' => json_encode([
                'about_paragraph1' => 'Founded on creativity and innovation, JM Innovatech Photography has grown into a trusted name in visual storytelling. We combine artistic vision, advanced technology, and a customer-first approach to capture the essence of every moment.',
                'about_paragraph2' => 'From weddings and corporate events to brand campaigns and studio productions — our team ensures excellence in every frame. With over a decade of experience, we’ve turned thousands of memories into timeless visuals that inspire and connect.',
                'video_id' => 'nXo4uQ1iA3Y',
                'stats' => [
                    ['title' => 'Client Reviews', 'value' => 500],
                    ['title' => 'Support Team & Staff', 'value' => 50],
                    ['title' => 'Projects Completed', 'value' => 3000],
                    ['title' => 'Years of Experience', 'value' => 15],
                ],
            ]),
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // =========================
        // 3️⃣ FAQ & SIDE FEATURE SECTION
        // =========================
        DB::table('our_story_sections')->insert([
            'type' => 'faq',
            'title' => 'Frequently Asked Questions',
            'meta' => json_encode([
                'faqs' => [
                    [
                        'question' => 'What services does your company offer?',
                        'answer' => 'We provide professional photography, videography, branding, and creative media services for both individuals and businesses.'
                    ],
                    [
                        'question' => 'How can I book your services?',
                        'answer' => 'Bookings can be made directly through our website’s contact page or by reaching us via email or phone. We also respond quickly on WhatsApp.'
                    ],
                    [
                        'question' => 'Do you offer training or internships?',
                        'answer' => 'Yes, through our JM Innovatech Academy we offer hands-on training, mentorship, and internship opportunities in photography and media production.'
                    ]
                ],
                'side_title' => 'Need More Information?',
                'side_text' => 'Can’t find what you’re looking for? Our team is ready to help — feel free to get in touch anytime.',
                'side_button' => 'Contact Support',
                'side_image' => 'https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?q=80&w=800&auto=format&fit=crop'
            ]),
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // =========================
        // 4️⃣ CLIENTS SECTION
        // =========================
        $clients = [
            ['title' => 'Apple', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/a/ab/Apple-logo.png'],
            ['title' => 'Microsoft', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/4/44/Microsoft_logo.svg'],
            ['title' => 'Google', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/0/08/Google_Logo.svg'],
            ['title' => 'IBM', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/5/51/IBM_logo.svg'],
            ['title' => 'Amazon', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/a/a9/Amazon_logo.svg'],
            ['title' => 'Adobe', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/d/d5/Adobe_Systems_logo_and_wordmark.svg'],
            ['title' => 'Canon', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/9/96/Canon_logo.svg'],
            ['title' => 'Samsung', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/1/1b/Samsung_Logo.svg'],
        ];

        foreach ($clients as $client) {
            DB::table('our_story_clients')->insert([
                'title' => $client['title'],
                'image' => $client['image'],
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
