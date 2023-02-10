<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductCategory>
 */
class ProductCategoryFactory extends Factory
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
        'name' => $this->faker->name(),
        'category_description' => $this->faker->paragraph(),
        ];
    }
}
