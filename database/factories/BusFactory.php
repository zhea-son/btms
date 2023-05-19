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
        $type = fake()->randomElement(['Micro','Tourist','Deluxe','Semi-Deluxe']);
        return [
            'company_id' => fake()->numberBetween(1,10),
            'number_plate' => fake()->unique()->bothify('??-Pra-##-###-??-####'),
            'contact' => fake()->phoneNumber(),
            'seats' => function () use ($type) {
                if ($type === 'Micro') {
                    return 16;
                } elseif ($type === 'Tourist') {
                    return 40;
                } elseif ($type === 'Deluxe') {
                    return 45;
                } elseif ($type === 'Semi-Deluxe') {
                    return 50;
                } else {
                    return random_int(12, 50);
                }
            },
            'type' => $type ,          
        ];
    }
}
