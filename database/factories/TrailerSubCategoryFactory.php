<?php

namespace Database\Factories;

use App\Models\TrailerCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TrailerSubCategory>
 */
class TrailerSubCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'long_description' => fake()->paragraph,
            'trailer_category_id' => TrailerCategory::factory(),
        ];
    }
}
