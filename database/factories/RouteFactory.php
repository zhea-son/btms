<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Route>
 */
class RouteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'company_id' => 1,
            'origin' => fake()->city(),
            'destination' => fake()->city(),
            'estimated_time' => fake()->numberBetween(2,36),
            'distance' => fake()->numberBetween(70,880),
            'via' => fake()->city(),
        ];
    }
}
