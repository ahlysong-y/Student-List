<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'stuno' => 'STU-' . $this->faker->unique()->numberBetween(1000, 9999),
            'khmername' => 'សិស្ស ' . $this->faker->firstName(),
            'englishname' => $this->faker->name(),
            'gender' => $this->faker->randomElement(['ប្រុស', 'ស្រី']),
            'birthdate' => $this->faker->dateTimeBetween('-15 years', '-10 years')->format('Y-m-d'),
            'nation' => 'ខ្មែរ',
            'religion' => 'ព្រះពុទ្ធ',
            'room' => $this->faker->randomElement(['A1', 'B2', 'C3']),
            'session' => $this->faker->randomElement(['ព្រឹក', 'រសៀល']),
            'subject' => 'ចំណេះដឹងទូទៅ',
            'teacher' => $this->faker->name(),
            'history' => $this->faker->sentence(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'province' => 'ភ្នំពេញ',
            'district' => 'ដូនពេញ',
            'commune' => 'វត្តភ្នំ',
            'village' => 'ភូមិទី១',
            'fathername' => $this->faker->name('male'),
            'mothername' => $this->faker->name('female'),
            'healthy' => 'ល្អ',
            'marital_status' => 'នៅលីវ',
            'photo' => null,
        ];
    }
}
