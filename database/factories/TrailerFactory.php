<?php

namespace Database\Factories;

use App\Models\Trailer;
use App\Models\TrailerSubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Trailer>
 */
class TrailerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'model_name' => fake()->word,
            'gross_weight' => fake()->randomNumber(),
            'unladen_weight' => fake()->randomNumber(),
            'length' => fake()->word(),
            'width' => fake()->word(),
            'bed_height' => fake()->randomNumber(),
            'number_of_axles' => fake()->word(),
            'tyre_size' => fake()->word(),
            'trailer_sub_category_id' => TrailerSubCategory::factory(),
        ];
    }
}
