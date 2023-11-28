<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Default',
            'color' => '#1f2937',
            'user_id' => User::where('email', 'default@example.com')->first()->id,
        ]);

        Category::create([
            'name' => 'Black',
            'color' => '#000000',
            'user_id' => User::where('email', 'default2@example.com')->first()->id,
        ]);

        Category::create([
            'name' => 'Red',
            'color' => '#ff0000',
            'user_id' => User::where('email', 'default@example.com')->first()->id,
        ]);

        Category::create([
            'name' => 'White',
            'color' => '#ffffff',
            'user_id' => User::where('email', 'default2@example.com')->first()->id,
        ]);
    }
}
