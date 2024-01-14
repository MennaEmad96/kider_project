<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use App\Models\Contact;
use App\Models\Appointment;
use App\Models\Teacher;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(2)->create();

        // User::factory(3)->create();
        // Testimonial::factory(2)->create();
        // Contact::factory(2)->create();
        // Appointment::factory(2)->create();
        Teacher::factory(2)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
