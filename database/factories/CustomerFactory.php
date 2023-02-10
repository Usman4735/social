<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 'qualification_id' => $this->faker->numerify('#'),
            'username' => $this->faker->name(),
            'full_name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'password' => Hash::make('password'), // password

        ];
    }
}
