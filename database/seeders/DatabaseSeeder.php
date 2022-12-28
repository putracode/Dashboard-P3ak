<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Aplikasi;
use App\Models\Highlight;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Saputra',
            'role' => 'admin',
            'email' => 'saputra@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'name' => 'User',
            'role' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password')
        ]);

        Highlight::create([
            'title' => 'Dolorem ist laurent',
            'url' => 'https://www.studentstutorial.com/laravel/laravel-ajax-retrieve',
        ]);
        Highlight::create([
            'title' => 'Dolorem ist laurent',
            'url' => 'https://www.studentstutorial.com/laravel/laravel-ajax-retrieve',
        ]);
        Highlight::create([
            'title' => 'Dolorem ist laurent',
            'url' => 'https://www.studentstutorial.com/laravel/laravel-ajax-retrieve',
        ]);
        Highlight::create([
            'title' => 'Dolorem ist laurent',
            'url' => 'https://www.studentstutorial.com/laravel/laravel-ajax-retrieve',
        ]);
        Highlight::create([
            'title' => 'Dolorem ist laurent',
            'url' => 'https://www.studentstutorial.com/laravel/laravel-ajax-retrieve',
        ]);
        Highlight::create([
            'title' => 'Dolorem ist laurent',
            'url' => 'https://www.studentstutorial.com/laravel/laravel-ajax-retrieve',
        ]);
        Highlight::create([
            'title' => 'Dolorem ist laurent',
            'url' => 'https://www.studentstutorial.com/laravel/laravel-ajax-retrieve',
        ]);
        Highlight::create([
            'title' => 'Dolorem ist laurent',
            'url' => 'https://www.studentstutorial.com/laravel/laravel-ajax-retrieve',
        ]);
        Highlight::create([
            'title' => 'Dolorem ist laurent',
            'url' => 'https://www.studentstutorial.com/laravel/laravel-ajax-retrieve',
        ]);
        Highlight::create([
            'title' => 'Dolorem ist laurent',
            'url' => 'https://www.studentstutorial.com/laravel/laravel-ajax-retrieve',
        ]);
    }
}
