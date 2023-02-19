<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MediaGallery>
 */
class MediaGalleryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
        'header' => $this->faker->name(),
        'description' => $this->faker->name(),
        'alt' => $this->faker->name(),
        'image' => $this->faker->imageUrl(),

        ];

    }
}

