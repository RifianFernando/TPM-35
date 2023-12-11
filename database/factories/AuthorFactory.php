<?php

namespace Database\Factories;

use App\Models\author;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => author::factory(),
            'author_name' => fake()->name(),
            'tempat_lahir' => fake()->name(),
        ];
    }
}
