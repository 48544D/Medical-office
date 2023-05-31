<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // seeder for appointment
        \App\Models\appointement::factory(10)->create();

        // seeder for schedule
        // \App\Models\schedule::factory(10)->create();

        // seeder for user
        // \App\Models\User::factory(1)->create();

        // seeder for patient
        // \App\Models\patient::factory(10)->create();

        // seeder for doctor
        // \App\Models\doctor::factory(10)->create();

        // seeder for medical record
        // \App\Models\MedicalRecord::factory(10)->create();

        // seeder for message
        // \App\Models\message::factory(10)->create();
    }
}
