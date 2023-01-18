<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Library>
 */
class LibraryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => $this->faker->name,
            "membership" => $this->faker->randomElement(['VIP', 'Irregular', 'Regular']),
            "address" => $this->faker->address,
            "postal_code" => $this->faker->postcode,
            "user_id" =>$this->faker->randomElement(User::all()),
        ];
    }
}
