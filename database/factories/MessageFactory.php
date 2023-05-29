<?php

namespace Database\Factories;

use App\Models\doctor;
use App\Models\patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sender_id' => patient::inRandomOrder()->first()->id,
            'receiver_id' => doctor::inRandomOrder()->first()->id,
            'message' => $this->faker->text,
        ];
    }
}
