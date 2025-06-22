<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::factory()->create([
            'name'=>'Tester',
            'username'=>'tester',
            'email'=>'test@testmail.com',
            ]
        );

        $categories = [
            'Medical',
            'Sport',
            'Health',
            'Science',
            'Technology',
            'Politics',
            'Religious',
            'International',
            'Nature',
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }

//        Post::factory(100)->create();

    }
}
