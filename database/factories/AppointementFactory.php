<?php

namespace Database\Factories;

use App\Models\doctor;
use App\Models\patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointement>
 */
class AppointementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'patient_id' => patient::inRandomOrder()->first()->id,
            'doctor_id' => doctor::inRandomOrder()->first()->id,
            'appointement_date_time' => $this->faker->dateTime,
            'status' => $this->faker->randomElement(['pending', 'confirmed', 'canceled']),
            'reason_for_appointement' => $this->faker->text,
            'notes' => $this->faker->text,
        ];
    }
}
