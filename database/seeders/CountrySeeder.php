<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            [
                'isocode' => "ISO 3166-2:AF",
                'name' => "Afghanistan",
            ],
            [
                'isocode' => "ISO 3166-2:NO",
                'name' => "Norway",
            ],
            [
                'isocode' => "ISO 3166-2:ET",
                'name' => "Ethiopia",
            ],
            [
                'isocode' => "ISO 3166-2:GR",
                'name' => "Greece",
            ],
            [
                'isocode' => "ISO 3166-2:MZ",
                'name' => "Mozambique",
            ],
            [
                'isocode' => "ISO 3166-2:US",
                'name' => "The United States of America",
            ],
            
        ]);
    }
}
