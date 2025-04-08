<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id'=>Category::factory(),
            'title'=>fake()->sentence(),
            'slug'=>fake()->slug(),
            'user_id'=>User::factory(),
            'intro'=>fake()->sentence(),
            'body'=>fake()->paragraph()
        ];
    }
}
