<?php 

namespace Database\Factories;

use App\Models\Fee;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeeFactory extends Factory
{
    protected $model = Fee::class;

    public function definition(): array
    {
        return [
            'student_id' => Student::factory(), 
            'amount' => $this->faker->randomFloat(2, 500, 5000),
            'payment_date' => $this->faker->date(),
            'payment_mode' => $this->faker->randomElement(['Cash', 'Card', 'UPI', 'Bank Transfer']),
            'note' => $this->faker->sentence(),
        ];
    }
}

?>