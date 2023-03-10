<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
        'title' => $this->faker->name(),
        'short_description' => $this->faker->name(),
        'long_description' => $this->faker->name(),
        'seo_url' => $this->faker->slug(),
        'is_published' => 1,

        ];
    }
}
