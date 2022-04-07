<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TidingFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'owner_id' => 0,
            'slug' => $this->faker->word,
            'short_description' => $this->faker->words(3, true),
            'long_description' => $this->faker->words(5, true),
            'body' => $this->faker->paragraph(),
        ];
    }
}
