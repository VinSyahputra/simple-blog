<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        //     'name' => 'admin',
        //     'email' => 'admin@admin.com',
        //     'password' => bcrypt('admin123'),
        // ]);

        // \App\Models\User::factory(10)->create();
        // \App\Models\Category::factory(10)->create();


        // Category::create([
        //     'name' => 'Personal',
        //     'slug' => 'personal'
        // ]);
        // Category::create([
        //     'name' => 'Technology',
        //     'slug' => 'technology'
        // ]);
        // Category::create([
        //     'name' => 'Sport',
        //     'slug' => 'sport'
        // ]);
        // Category::create([
        //     'name' => 'Health',
        //     'slug' => 'health'
        // ]);

        \App\Models\Post::factory(40)->create();
    }
}
