<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'gewicht' => $this->faker->numberBetween(50, 100),
            'bmi' => $this->faker->numberBetween(15, 40),
            'toegevoegd' => $this->faker->date()
        ];
    }
}
