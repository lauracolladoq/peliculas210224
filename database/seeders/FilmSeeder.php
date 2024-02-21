<?php

namespace Database\Seeders;

use App\Models\Film;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $films = Film::factory(50)->create();

        foreach ($films as $item){
            $tags = self::devolverIdsTagsRandom();
            //Llamo al método tags del modelo de Film y le añado estos tags
            $item->tags()->attach($tags);
        }

        //Le asigno las etiquetas
    }

    public function devolverIdsTagsRandom(): array
    {
        //Guardo los id de los tags en un array
        $idsTags = Tag::pluck('id')->toArray();

        //Creo un array para guardar estos tags random
        $tags = [];

        //Creo un array que almacena ids random, primero indico el array y luego el número de parámetros que va a tener
        //Se pone mínimo 2 porque si es solo 1 lo almacena como string y no como array
        $indices = array_rand($idsTags, random_int(2, count($idsTags)));

        //Recorro esos indices y los guardo uno por uno en el array de $tags random
        foreach ($indices as $indice) {
            $tags[] = $idsTags[$indice];
        }
        return $tags;
    }
}
