<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SerieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('series')->insert([
            [
                'title' => 'La Roue du Temps',
                'year' => '2021',
                'seasons' => 1,
                'episodesPerSeason' => 8,
                'stars' => 2,
                'review' => "La vie de cinq villageois bascule quand une femme puissante et mystérieuse leur révèle que l'un d'eux est l'enfant d'une ancienne prophétie qui pourra plonger le monde dans les Ténèbres à jamais. Accepteront-ils de suivre cette inconnue afin de préserver le Monde, avant que le Ténébreux ne s'échappe de sa prison et que l’Ultime Bataille ne commence ?",
                'country_id' => 6,
                'genre_id' => 3,
            ],
            [
                'title' => 'Cowboy Bebop',
                'year' => '2021',
                'seasons' => 1,
                'episodesPerSeason' => 5,
                'stars' => 3,
                'review' => "Aux trousses des pires criminels de la galaxie, des chasseurs de primes sont prêts à sauver le monde, si la récompense en vaut la peine.",
                'country_id' => 6,
                'genre_id' => 3,
            ],
            [
                'title' => 'ANNE WITH AN "E"',
                'year' => '2017',
                'seasons' => 3,
                'episodesPerSeason' => 10,
                'stars' => 4,
                'review' => "En 1890, une adolescente, maltraitée en orphelinat et par des familles d'accueil, atterrit par erreur dans le foyer d'une vieille dame sans enfant et de son frère. Avec le temps, Anne, 13 ans, va illuminer leur vie grâce à son esprit fantasque, sa vive intelligence et son imagination débordante.",
                'country_id' => 6,
                'genre_id' => 1,
            ]
        ]);
    }
}
