<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->words(3, true);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'body' => $this->faker->paragraphs(2, true),
            'price' => $this->faker->randomFloat(2,10,2000)
        ];
    }
}
