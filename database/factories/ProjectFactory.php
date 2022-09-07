<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->sentence(3),
            'leader_id' => fake()->numberBetween(1, 2),
            'owner' => fake()->name(),
            'deadline' => fake()->date(),
            'progress' => fake()->numberBetween(70, 100),
            'description' => fake()->paragraph(4),
        ];
    }
}
