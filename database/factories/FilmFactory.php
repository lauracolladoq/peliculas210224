<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Film>
 */
class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        fake()->addProvider(new \Mmo\Faker\PicsumProvider(fake()));

        return [
            'titulo' => fake()->unique()->words(random_int(1, 3), true),
            'sinopsis' => fake()->text(),
            'caratula' => 'caratulas/' . fake()->picsum('public/storage/caratulas', 400, 400, false),
            'disponible' => fake()->randomElement(["SI", "NO"]),
            'category_id' => Category::all()->random()->id
        ];
    }
}
