<?php

namespace Database\Factories;

use App\Models\doctor;
use App\Models\patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MedicalRecordFactory extends Factory
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
            'record_date' => $this->faker->date,
            'test_results' => $this->faker->sentence,
            'diagnosis' => $this->faker->sentence,
            'treatment' => $this->faker->sentence,
            'prescription' => $this->faker->sentence,
            'created_at' => $this->faker->randomElement(['2021-05-11', '2021-05-12', '2021-05-03', '2021-05-14', '2021-05-05', '2021-05-06', '2021-05-27']),
        ];
    }
}
