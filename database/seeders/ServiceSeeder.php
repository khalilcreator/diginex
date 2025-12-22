<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Digital Strategy',
                'description' => 'We help brands navigate the digital landscape with data-driven strategies that drive growth and engagement. Our approach focuses on long-term value creation.',
                'position' => 1,
            ],
            [
                'title' => 'UX/UI Design',
                'description' => 'Creating intuitive and beautiful user experiences that delight users and solve complex problems. We believe design is not just how it looks, but how it works.',
                'position' => 2,
            ],
            [
                'title' => 'Web Development',
                'description' => 'Building robust, scalable, and secure web applications using the latest technologies. Our code is clean, efficient, and built for performance.',
                'position' => 3,
            ],
            [
                'title' => 'SEO Optimization',
                'description' => 'Improving your visibility in search results to drive organic traffic and generate leads. We use ethical, white-hat techniques for sustainable results.',
                'position' => 4,
            ],
            [
                'title' => 'Content Marketing',
                'description' => 'Crafting compelling stories that resonate with your audience and build brand authority. Content is king, and we help you wear the crown.',
                'position' => 5,
            ],
             [
                'title' => 'Mobile Apps',
                'description' => 'Developing native and cross-platform mobile applications that provide seamless experiences on the go. iOS and Android solutions tailored to your needs.',
                'position' => 6,
            ],
        ];

        foreach ($services as $service) {
            \App\Models\Service::create($service);
        }
    }
}
