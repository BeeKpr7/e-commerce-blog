<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Etienne',
            'email' => 'etienne@laravel.com',
        ]);

        Post::factory(5)->create([
            'user_id' => $user->id
        ]);

        Comment::factory(10)->create();

        Product::factory(10)->create();
    }
}
