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
                'title' => 'Meow',
                'year' => '2021',
                'seasons' => 2,
                'episodesPerSeason' => 4,
                'stars' => 6,
                'review' => "Not so pretty cat",
                'country_id' => 1,
                'genre_id' => 1,
            ]
        ]);
    }
}
