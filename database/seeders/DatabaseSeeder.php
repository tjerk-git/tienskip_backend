<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Person;
use App\Models\Blogitem;
use Database\Seeders\EventSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // create 10 persons
        Person::factory(10)->create();
        
        // create 15 blog items
        Blogitem::factory(15)->create();
        
        // Seed events
        $this->call(EventSeeder::class);
    }
}
