<?php

namespace Database\Factories;

use App\Models\doctor;
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
    public function definition(): array
    {
        return [
            'doctor_id' => doctor::inRandomOrder()->first()->id,
            'date_time' => $this->faker->dateTime,
            'availibility' => $this->faker->randomElement([true, false]),
        ];
    }
}
