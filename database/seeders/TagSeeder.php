<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [

            'infantil' => '#FFD1DC',
            'acción' => '#B0E0E6',
            'aventura' => '#98FB98',
            'histórica' => '#BFB6C1',
            'animada' => '#FFA07A'
        ];
        foreach ($tags as $nombre => $color) {
            Tag::create(['nombre' => $nombre, 'color' => $color]);
        }
    }
}
