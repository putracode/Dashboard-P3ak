<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Aplikasi;
use App\Models\Dashboard;
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

        Dashboard::create([
            'name' => 'P3AK'
        ]);

        Aplikasi::create([
            'title' => 'iTransport', 
            'url' => 'https://itransport.iconpln.co.id/login'
        ]);

        Aplikasi::create([
            'title' => 'SIPO HPI', 
            'url' => 'https://sipo.hapindo.co.id/'
        ]);

        Aplikasi::create([
            'title' => 'SIPP', 
            'url' => 'http://10.14.23.246:8080/sipp/Login/'
        ]);

        Aplikasi::create([
            'title' => 'Project Management', 
            'url' => 'https://project.iconpln.co.id/index.php/auth'
        ]);
        
        Aplikasi::create([
            'title' => 'Amarta', 
            'url' => 'https://amarta.iconpln.co.id/'
        ]);

        Aplikasi::create([
            'title' => 'IBC', 
            'url' => ' https://ibc.iconpln.co.id/Account/Login'
        ]);

        Aplikasi::create([
            'title' => 'iSPP', 
            'url' => 'https://ispp.iconpln.co.id/index.php'
        ]);
    }
}
