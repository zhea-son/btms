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
            'company_id' => 1,
            'number_plate' => fake()->unique()->bothify('??-Pra-##-###-??-####'),
            'contact' => fake()->phoneNumber(),
            'seats' => fake()->numberBetween(15,80),
            'type' => fake()->randomElement(['Micro','Tourist','Deluxe','Semi-Deluxe']),           
        ];
    }
}
