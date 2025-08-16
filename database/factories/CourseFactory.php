<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()-> sentence(3),
            "duration" => fake() -> numberBetween(1, 36) . ' months',
            "fees" => fake() -> randomFloat(2, 1000, 50000),
            "status" => fake() -> boolean()
        ];
    }
}
