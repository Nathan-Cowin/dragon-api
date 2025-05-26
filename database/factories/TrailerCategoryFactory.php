<?php

namespace Database\Factories;

use App\Enums\UseType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TrailerCategory>
 */
class TrailerCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'use_type' => fake()->randomElement(UseType::class),
        ];
    }
}
