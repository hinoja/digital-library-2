<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Document>
 */
class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $name = fake()->unique()->realText(25, 2),
            'slug' => Str::slug($name),
            'is_visible' => fake()->boolean(60),
            // 'file' => fake()->file('public/storage/documents/',$name),
            'description' => fake()->paragraph(3),
            // 'category_id' => fake()->numberBetween(1, 10),
            'author' => fake()->lastName(),
            'supervisor' => fake()->firstName(),
            'published_at' => fake()->date(),
            'option_id' => fake()->numberBetween(1, 3),
            'user_id' => fake()->numberBetween(1,10),
            'level_id' => fake()->numberBetween(1,5),
            // 'level_id' => fake()->numberBetween(1,5),
            'type_id' => fake()->numberBetween(1, 2),
            'github_link' => fake()->url()
        ];
    }
}
