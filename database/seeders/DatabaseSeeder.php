<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory(3)->create();

        $this->call(TagSeeder::class);
        $this->call(CategorySeeder::class);

        //Imagen
        Storage::deleteDirectory('caratulas');
        Storage::createDirectory('caratulas');

        $this->call(FilmSeeder::class);
    }
}
