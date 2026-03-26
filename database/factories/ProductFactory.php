<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'sku' => strtoupper(Str::random(8)),
            'name' => $this->faker->words(2, true),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->numberBetween(10000, 1000000),
            'stock' => $this->faker->numberBetween(0, 100),
            'meta' => [
                'color' => $this->faker->safeColorName(),
                'brand' => $this->faker->company(),
            ],
        ];
    }
}
