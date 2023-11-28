<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Default',
            'email' => 'default@example.com',
            'email_verified_at' => null,
            'password' => bcrypt('password'),
            'remember_token' => null,
            'created_at' => '2023-10-15 20:31:59',
            'updated_at' => '2023-10-15 20:31:59',
        ]);

        User::create([
            'name' => 'Default2',
            'email' => 'default2@example.com',
            'email_verified_at' => null,
            'password' => bcrypt('password'),
            'remember_token' => null,
            'created_at' => '2023-10-15 20:32:00',
            'updated_at' => '2023-10-15 20:32:00',
        ]);
    }
}
