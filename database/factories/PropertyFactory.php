<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->name,
            'price' => $this->faker->numerify('#####'),
            'bedroom_count' => $this->faker->numberBetween(1,10),
            'bathroom_count' => $this->faker->numberBetween(1,10),
            'storey_count' => $this->faker->numberBetween(1,10),
            'garage_count' => $this->faker->numberBetween(1,10),
        ];
    }
}
