<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->sentence,
            'slug' => $this->faker->unique()->slug,
            'excerpt' =>'<p>'.implode('</><p>',$this->faker->paragraphs(2)).'</p>',
            'body' =>'<p>'.implode('</><p>',$this->faker->paragraphs(6)).'</p>',
            'image'=> $this->faker->imageUrl(360, 360, 'animals', true, 'dogs', true),
        ];
    }
}
