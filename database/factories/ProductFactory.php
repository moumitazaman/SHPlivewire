<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_category_id' => $this->faker->numberBetween(1, 50),
            'status' => $this->faker->boolean(),
            'name' => $this->faker->name(),
            'price' => $this->faker->numberBetween(80, 600),
            'image' => null
        ];
    }
}
