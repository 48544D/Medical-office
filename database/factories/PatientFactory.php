<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstName' => $this->faker->firstName,
            'lastName' => $this->faker->lastName,
            'birthDate' => $this->faker->date,
            'gender' => $this->faker->randomElement(['male', 'female']),
            'phoneNumber' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'medicalHistory' => $this->faker->text,
            'insuranceInfo' => $this->faker->text,
        ];
    }
}