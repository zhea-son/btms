<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
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
            'bus_id' => fake()->numberBetween(1,25),
            'route_id' => fake()->numberBetween(1,29),
            'date' => Carbon::today()->startOfWeek()->addDays(rand(0, 6))->format('Y-m-d'),
            'departure_time' => fake()->time('H:i'),
            'fare' => fake()->numberBetween(300,4000),
            'estimated_time' => fake()->numberBetween(3,24),
            'status' => 'Stand By',
            'no_of_passengers' => null,
            'income' => null,
            'completed' => false,
        ];
    }
}
