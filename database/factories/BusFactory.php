<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bus>
 */
class BusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'company_id' => fake()->numberBetween(1,10),
            'number_plate' => fake()->unique()->bothify('??-Pra-##-###-??-####'),
            'contact' => fake()->phoneNumber(),
            'seats' => fake()->numberBetween(12,80),
            'type' => fake()->randomElement(['Micro','Tourist','Deluxe','Semi-Deluxe']),           
        ];
    }
}
