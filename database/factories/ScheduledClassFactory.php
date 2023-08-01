<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ScheduledClass>
 */
class ScheduledClassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'instructor_id' => $this->faker->numberBetween(12, 21),
            'class_type_id' => $this->faker->numberBetween(1, 4),
            'date_time' => $this->faker->dateTimeBetween('now', '+1 week'),
        ];
    }
}
