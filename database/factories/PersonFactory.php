<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class PersonFactory extends Factory
{
 
    public function definition(): array
    {
        $facts = [
            'Houdt van koffie en kan er 10 koppen per dag drinken',
            'Heeft alle afleveringen van The Office gezien',
            'Kan jongleren met 4 ballen tegelijk',
            'Spreekt vloeiend 3 talen',
            'Is een keer op TV geweest',
            'Heeft een verzameling van 200+ vinylplaten',
            'Kan een Rubiks kubus oplossen in onder de 2 minuten',
            'Is bang voor spinnen maar houdt van slangen',
            'Heeft in 15 verschillende landen gewoond',
            'Kan pizza\'s draaien als een echte pizzabakker',
            'Heeft ooit een marathon gelopen',
            'Kan alle hoofdsteden van Europa opnoemen',
            'Is vegetariër sinds de middelbare school',
            'Heeft een tweelingbroer/zus',
            'Kan op één been staan voor 5 minuten',
        ];
        
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'member_since' => "2011",
            'description' => "vrijwilliger",
            'fact' => fake()->optional(0.8)->randomElement($facts),
        ];
    }
}
