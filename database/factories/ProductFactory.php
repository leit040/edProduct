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
    public function definition()
    {
        return [
            'title'=>$this->faker->word(random_int(10,25)),
            'description'=>$this->faker->word(random_int(26,45)),
            'type_id'=>1,
            'category_id'=>1,
            'price'=>$this->faker->randomFloat(10,320),
            'file_id'=>1,
        ];
    }
}
