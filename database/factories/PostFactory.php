<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id' => rand(1, 4),
            'user_id' => User::all()->random()->id,
            'title' => fake()->sentence(mt_rand(2, 8)),
            'slug' => fake()->slug(),
            'excerpt' => fake()->paragraph(),
            'body' => collect(fake()->paragraphs(mt_rand(5, 10)))
                ->map(fn ($p) => "<p>$p</p>")->implode(''),

        ];
    }
}
