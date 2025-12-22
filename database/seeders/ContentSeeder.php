<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Categories
        $categories = [
            ['name' => 'Technology'],
            ['name' => 'Design'],
            ['name' => 'Marketing'],
            ['name' => 'Business'],
        ];

        $catIds = [];
        foreach ($categories as $cat) {
            $c = \App\Models\Category::create($cat);
            $catIds[] = $c->id;
        }

        // Get Admin User
        $user = \App\Models\User::where('role', 1)->first();
        $userId = $user ? $user->id : 1;

        // Blogs
        $blogs = [
            [
                'title' => 'The Future of AI in Web Development',
                'slug' => 'future-of-ai-web-development',
                'description' => 'Artificial Intelligence is revolutionizing the way we build and interact with the web.',
                'content' => '<p>AI tools are becoming indispensable for developers...</p>',
                'status' => 1,
                'user_id' => $userId,
                'category_id' => $catIds[0],
            ],
            [
                'title' => '10 Tips for Minimalist UI Design',
                'slug' => '10-tips-minimalist-ui-design',
                'description' => 'Less is more. Learn how to create stunning interfaces with minimal elements.',
                'content' => '<p>Minimalism is not just a trend, it is a design philosophy...</p>',
                'status' => 1,
                'user_id' => $userId,
                'category_id' => $catIds[1],
            ],
            [
                'title' => 'Why SEO Matters in 2025',
                'slug' => 'why-seo-matters-2025',
                'description' => 'Search engines are smarter than ever. Here is how to keep up.',
                'content' => '<p>SEO is constantly evolving...</p>',
                'status' => 1,
                'user_id' => $userId,
                'category_id' => $catIds[2],
            ],
             [
                'title' => 'Remote Work Trends',
                'slug' => 'remote-work-trends',
                'description' => 'How companies are adapting to the new normal of distributed teams.',
                'content' => '<p>Remote work is here to stay...</p>',
                'status' => 1,
                'user_id' => $userId,
                'category_id' => $catIds[3],
            ],
        ];

        foreach ($blogs as $blog) {
             \App\Models\Blog::create($blog);
        }
    }
}
