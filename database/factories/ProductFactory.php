<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $images = [];
        for ($i = 0; $i < 3; $i++) {
            $images[] = $this->faker->imageUrl(640, 480);
        }

        return [
            'title' => $this->faker->name,
            'price' => $this->faker->randomFloat(2, 1, 100),
            'rabattPrice' => $this->faker->randomFloat(2, 1, 100),
            'stock' => $this->faker->numberBetween(0, 3),
            'description' => $this->faker->text,
            'images' => json_encode($images),
            'color' => $this->faker->colorName,
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
