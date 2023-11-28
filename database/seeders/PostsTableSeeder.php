<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'title' => 'Default1',
            'content' => 'Default1',
            'user_id' => User::where('email', 'default@example.com')->first()->id,
            'category_id' => Category::where('name', 'Black')->first()->id,
        ]);

        Post::create([
            'title' => 'Default2',
            'content' => 'Default2',
            'user_id' => User::where('email', 'default2@example.com')->first()->id,
            'category_id' => Category::where('name', 'White')->first()->id,
        ]);

        Post::create([
            'title' => 'Default3',
            'content' => 'Default3',
            'user_id' => User::where('email', 'default@example.com')->first()->id,
            'category_id' => Category::where('name', 'Black')->first()->id,
        ]);

        Post::create([
            'title' => 'Default4',
            'content' => 'Default4',
            'user_id' => User::where('email', 'default2@example.com')->first()->id,
            'category_id' => Category::where('name', 'White')->first()->id,
        ]);

        Post::create([
            'title' => 'Default5',
            'content' => 'Default5',
            'user_id' => User::where('email', 'default@example.com')->first()->id,
            'category_id' => Category::where('name', 'Black')->first()->id,
        ]);

        Post::create([
            'title' => 'Default6',
            'content' => 'Default6',
            'user_id' => User::where('email', 'default2@example.com')->first()->id,
            'category_id' => Category::where('name', 'White')->first()->id,
        ]);
    }
}
