<?php

namespace Database\Factories;

use App\Models\WorkField;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class WorkFieldFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name
        ];
    }
}
