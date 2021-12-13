<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movies')->insert([
            [
                'title' => 'Miaou',
                'year' => '2021',
                'stars' => 4,
                'review' => 'Pretty cat',
                'country_id' => 1,
                'genre_id' => 1,
            ]
        ]);
    }
}
