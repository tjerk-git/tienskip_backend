<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blogitem>
 */
class BlogitemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $isPublished = fake()->boolean(80); // 80% chance of being published
        
        return [
            'title' => fake()->sentence(rand(3, 8)),
            'content' => fake()->paragraphs(rand(3, 8), true),
            'is_published' => $isPublished,
            'published_at' => $isPublished ? fake()->dateTimeBetween('-2 years', 'now')->format('Y-m-d') : null,
            'image' => fake()->optional(0.7)->imageUrl(800, 600, 'nature', true),
        ];
    }
}