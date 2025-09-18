<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $currentDate = Carbon::now();  // Use current date to ensure events are in the future

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
            [
                'name' => 'Nordic Walking Workshop',
                'description' => 'Learn the proper techniques for Nordic walking in beautiful Groningen parks.',
                'address' => 'Noorderplantsoen',
                'city' => 'Groningen',
                'province' => 'Groningen',
                'start_date' => $currentDate->copy()->addDays(3),
                'end_date' => $currentDate->copy()->addDays(3),
            ],
            [
                'name' => 'University Sports Day',
                'description' => 'Annual sports day featuring various activities for students and locals.',
                'address' => 'University of Groningen Campus',
                'city' => 'Groningen',
                'province' => 'Groningen',
                'start_date' => $currentDate->copy()->addDays(8),
                'end_date' => $currentDate->copy()->addDays(8),
            ],
            [
                'name' => 'Cycling Tour: City & Countryside',
                'description' => 'Guided cycling tour through Groningen city and surrounding countryside.',
                'address' => 'Hoofdstation Groningen',
                'city' => 'Groningen',
                'province' => 'Groningen',
                'start_date' => $currentDate->copy()->addDays(6),
                'end_date' => $currentDate->copy()->addDays(6),
            ],
            [
                'name' => 'Photography Workshop',
                'description' => 'Learn street photography techniques in the historic city center.',
                'address' => 'Martinikerk',
                'city' => 'Groningen',
                'province' => 'Groningen',
                'start_date' => $currentDate->copy()->addDays(12),
                'end_date' => $currentDate->copy()->addDays(12),
            ],
            [
                'name' => 'Farmers Market Special',
                'description' => 'Weekly farmers market with special local produce and crafts.',
                'address' => 'Grote Markt',
                'city' => 'Groningen',
                'province' => 'Groningen',
                'start_date' => $currentDate->copy()->addDays(4),
                'end_date' => $currentDate->copy()->addDays(4),
            ],
            [
                'name' => 'Book Reading & Discussion',
                'description' => 'Monthly book club meeting discussing contemporary Dutch literature.',
                'address' => 'Forum Groningen',
                'city' => 'Groningen',
                'province' => 'Groningen',
                'start_date' => $currentDate->copy()->addDays(14),
                'end_date' => $currentDate->copy()->addDays(14),
            ],
            [
                'name' => 'Outdoor Fitness Bootcamp',
                'description' => 'High-intensity outdoor fitness session in the park.',
                'address' => 'Stadspark',
                'city' => 'Groningen',
                'province' => 'Groningen',
                'start_date' => $currentDate->copy()->addDays(7),
                'end_date' => $currentDate->copy()->addDays(7),
            ],
            [
                'name' => 'Local History Walking Tour',
                'description' => 'Discover the hidden stories of Groningen with a local historian.',
                'address' => 'Martinikerkhof',
                'city' => 'Groningen',
                'province' => 'Groningen',
                'start_date' => $currentDate->copy()->addDays(11),
                'end_date' => $currentDate->copy()->addDays(11),
            ],
            [
                'name' => 'Community Garden Workshop',
                'description' => 'Learn about urban gardening and sustainable living practices.',
                'address' => 'Selwerd Community Center',
                'city' => 'Groningen',
                'province' => 'Groningen',
                'start_date' => $currentDate->copy()->addDays(9),
                'end_date' => $currentDate->copy()->addDays(9),
            ],
            [
                'name' => 'Evening Jazz Session',
                'description' => 'Intimate jazz performance featuring local musicians.',
                'address' => 'De Oosterpoort',
                'city' => 'Groningen',
                'province' => 'Groningen',
                'start_date' => $currentDate->copy()->addDays(13),
                'end_date' => $currentDate->copy()->addDays(13),
            ],
            [
                'name' => 'Youth Soccer Tournament',
                'description' => 'Local youth soccer tournament for ages 12-16.',
                'address' => 'Euroborg Sports Complex',
                'city' => 'Groningen',
                'province' => 'Groningen',
                'start_date' => $currentDate->copy()->addDays(16),
                'end_date' => $currentDate->copy()->addDays(16),
            ],
            [
                'name' => 'Cooking Class: Regional Specialties',
                'description' => 'Learn to cook traditional Groningen dishes with local ingredients.',
                'address' => 'Culinary Institute Groningen',
                'city' => 'Groningen',
                'province' => 'Groningen',
                'start_date' => $currentDate->copy()->addDays(18),
                'end_date' => $currentDate->copy()->addDays(18),
            ],
            [
                'name' => 'Sustainability Fair',
                'description' => 'Learn about sustainable living practices and green technologies.',
                'address' => 'MartiniPlaza',
                'city' => 'Groningen',
                'province' => 'Groningen',
                'start_date' => $currentDate->copy()->addDays(20),
                'end_date' => $currentDate->copy()->addDays(21),
            ],
            [
                'name' => 'Language Exchange Meetup',
                'description' => 'Practice Dutch and other languages with locals and internationals.',
                'address' => 'Grand Café Central',
                'city' => 'Groningen',
                'province' => 'Groningen',
                'start_date' => $currentDate->copy()->addDays(19),
                'end_date' => $currentDate->copy()->addDays(19),
            ],
            [
                'name' => 'Vintage Market',
                'description' => 'Browse unique vintage items and second-hand treasures.',
                'address' => 'Vismarkt',
                'city' => 'Groningen',
                'province' => 'Groningen',
                'start_date' => $currentDate->copy()->addDays(22),
                'end_date' => $currentDate->copy()->addDays(22),
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
