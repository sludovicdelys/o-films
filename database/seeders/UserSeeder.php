<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'password' => "imblackandimcute",

            ],
            [
                
                'name' => "Anuk",
                'email' => "anuk@oclock.com",
                'password' => "imgreyandimhandsome",
            ],
        ]);
    }

    /**
     * Update the password for the user 
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Validate the new password lenth...

        $request->user()->fill([
            'password' => Hash::make($request->newPassword)
        ])->save();
    } 
}
