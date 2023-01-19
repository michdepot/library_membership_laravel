<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Library;
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
    public function definition()
    {
        return [
            "title" => $this->faker->word,
            "year_published" => $this->faker->year,
            "price" => $this->faker->randomFloat(2, 10, 500),
            "publisher" => $this->faker->company,
            "library_id" => Library::first(),
        ];
    }
}
