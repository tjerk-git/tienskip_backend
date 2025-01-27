<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $currentDate = Carbon::parse('2025-01-27');  // Using the current date from metadata

        $events = [
            [
                'name' => 'Summer Music Festival',
                'description' => 'A vibrant outdoor music festival featuring local and international artists.',
                'address' => 'Stadspark',
                'city' => 'Groningen',
                'province' => 'Groningen',
                'start_date' => $currentDate->copy()->addDays(5),
                'end_date' => $currentDate->copy()->addDays(7),
            ],
            [
                'name' => 'Tech Conference 2025',
                'description' => 'Annual technology conference with workshops and networking opportunities.',
                'address' => 'MartiniPlaza',
                'city' => 'Groningen',
                'province' => 'Groningen',
                'start_date' => $currentDate->copy()->addDays(15),
                'end_date' => $currentDate->copy()->addDays(17),
            ],
            [
                'name' => 'Food & Wine Festival',
                'description' => 'Experience the finest local cuisine and wines from the region.',
                'address' => 'Grote Markt',
                'city' => 'Groningen',
                'province' => 'Groningen',
                'start_date' => $currentDate->copy()->addDays(2),
                'end_date' => $currentDate->copy()->addDays(3),
            ],
            [
                'name' => 'Art Exhibition: Northern Lights',
                'description' => 'Showcasing works from talented northern artists.',
                'address' => 'Groninger Museum',
                'city' => 'Groningen',
                'province' => 'Groningen',
                'start_date' => $currentDate->copy()->addDays(1),
                'end_date' => $currentDate->copy()->addDays(30),
            ],
            [
                'name' => 'Cultural Heritage Day',
                'description' => 'Explore the rich history and traditions of Groningen.',
                'address' => 'Forum Groningen',
                'city' => 'Groningen',
                'province' => 'Groningen',
                'start_date' => $currentDate->copy()->addDays(10),
                'end_date' => $currentDate->copy()->addDays(10),
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
