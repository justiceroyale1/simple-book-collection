<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => Str::title(fake()->words(3, true)),
            'author' => fake()->name(),
            'description' => fake()->text(),
            'published_year' => fake()->year(),
            'status' => fake()->randomElement(Book::getStatusList())
        ];
    }
}
