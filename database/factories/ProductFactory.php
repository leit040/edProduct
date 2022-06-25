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
            'title'=>$this->faker->words(random_int(3,12),true),
            'description'=>$this->faker->words(random_int(26,45),true),
            'type_id'=>1,
            'category_id'=>1,
            'price'=>rand(25,325),
            'image_id'=>1,
            'file_id'=>1,
        ];
    }
}
