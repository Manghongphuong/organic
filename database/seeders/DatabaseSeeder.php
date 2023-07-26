<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'fullname' => 'Hồng Phương',
            'name' => 'Phương',
            'email' => 'hp205125@gmail.com',
            'password' => bcrypt('123456'),
            'is_admin' => 1
        ]);
    }
}
