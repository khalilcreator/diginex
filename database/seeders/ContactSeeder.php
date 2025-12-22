<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        $contacts = [
            [
                'name' => 'John Smith',
                'email' => 'john.smith@example.com',
                'subject' => 'Website Development Inquiry',
                'message' => 'Hi, I am interested in developing a modern e-commerce website for my business. Could you please provide more information about your services and pricing?',
                'created_at' => now()->subDays(5),
            ],
            [
                'name' => 'Sarah Johnson',
                'email' => 'sarah.j@company.com',
                'subject' => 'Mobile App Development',
                'message' => 'We are looking to build a mobile application for both iOS and Android. What is your development process and estimated timeline?',
                'created_at' => now()->subDays(3),
            ],
            [
                'name' => 'Michael Chen',
                'email' => 'mchen@startup.io',
                'subject' => 'Digital Marketing Services',
                'message' => 'Our startup needs help with SEO and digital marketing. Can we schedule a consultation call to discuss our requirements?',
                'created_at' => now()->subDays(2),
            ],
            [
                'name' => 'Emily Rodriguez',
                'email' => 'emily.r@business.com',
                'subject' => 'UI/UX Design Project',
                'message' => 'We need a complete redesign of our existing platform. Do you offer UI/UX design services? What is your portfolio like?',
                'created_at' => now()->subDay(),
            ],
            [
                'name' => 'David Thompson',
                'email' => 'david.t@gmail.com',
                'subject' => 'Partnership Opportunity',
                'message' => 'I represent a digital agency and would like to explore potential partnership opportunities. Please let me know if you are interested.',
                'created_at' => now()->subHours(12),
            ],
        ];

        foreach ($contacts as $contact) {
            Contact::create($contact);
        }
    }
}
