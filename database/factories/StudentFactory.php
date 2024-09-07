<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'date_de_naissance'=>fake()->date(),
            'massar'=>fake()->numberBetween(0,22225555),
            'filiere'=> fake()->jobTitle(),
            'password'=>Hash::make(fake()->password()),
        ];
    }
}
