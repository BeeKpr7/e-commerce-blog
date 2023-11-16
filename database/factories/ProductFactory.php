<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use App\Enums\ProductStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'place' => $this->faker->city,
            'description' => $this->faker->sentence,
            'image' => $this->faker->imageUrl(360, 360, 'animals', true, 'dogs', true),
            'slug' => $this->faker->unique()->slug,
            'category_id' => Category::factory(),
            'status' => $this->faker->randomElement(array_column(ProductStatus::cases(), 'value')),
        ];
    }
}
