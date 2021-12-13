<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\MovieSeeder;
use Database\Seeders\SerieSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            MovieSeeder::class,
            SerieSeeder::class
        ]);
    }
}
