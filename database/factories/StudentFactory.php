<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition(): array
    {
        return [
            'name'         => $this->faker->name(),
            'email'        => $this->faker->unique()->safeEmail(),
            'phone'        => $this->faker->unique()->phoneNumber(),
            'joining_date' => $this->faker->dateTimeBetween('2025-01-01', '2025-12-31'),
            'course_id'    => Course::factory(), // Create course automatically
            'status'       => $this->faker->randomElement(['ongoing', 'completed']),
        ];
    }
}
