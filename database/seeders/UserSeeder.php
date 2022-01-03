<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                
                'name' => "Amon",
                'email' => "amon@oclock.com",
                'password' => Hash::make('imblackandimcute'),

            ],
            [
                
                'name' => "Anuk",
                'email' => "anuk@oclock.com",
                'password' => Hash::make('imgreyandimhandsome'),
            ],
        ]);
    }
}
