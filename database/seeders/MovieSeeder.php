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
                'title' => 'Kandahar',
                'year' => '2001',
                'stars' => 3,
                'review' => 'The film recounts the attempts of Nafas to return to Afghanistan after receiving a letter from her sister, who was left behind when the family escaped from Afghanistan years earlier. Nafas makes this desperate mission in an effort to rescue her sister, who has written in her letter that she plans to commit suicide on the last solar eclipse of the millennium.',
                'country_id' => 1,
                'genre_id' => 1,
            ],
            [
                'title' => 'THE WAVE',
                'year' => '2015',
                'stars' => 3,
                'review' => 'Après plusieurs années à surveiller la montagne qui surplombe le fjord où il habite, Kristian, scientifique, s’apprête à quitter la région avec sa famille. Quand un pan de montagne se détache et provoque un Tsunami, il doit retrouver les membres de sa famille et échapper à la vague dévastatrice.',
                'country_id' => 2,
                'genre_id' => 2,
            ],
            [
                'title' => 'DIFRET',
                'year' => '2015',
                'stars' => 3,
                'review' => 'A trois heures de route d’Addis Abeba, Hirut, 14 ans, est kidnappée sur le chemin de l’école: une tradition ancestrale veut que les hommes enlèvent celles qu’ils veulent épouser. Mais Hirut réussit à s’échapper en tuant son agresseur. Accusée de meurtre, elle est défendue par une jeune avocate, pionnière du droit des femmes en Ethiopie.',
                'country_id' => 3,
                'genre_id' => 1,
            ],
            [
                'title' => 'LA BATAILLE DES THERMOPYLES',
                'year' => '1962',
                'stars' => 2,
                'review' => "480 ans avant Jésus-Christ. Alors que la puissante armée perse s'apprête à envahir le territoire grec, le soldat grec Leonidas tente de lever une armée pour défendre un passage montagneux stratégique. Il ne parvient à rassembler que 300 soldats spartiates à la tête desquels il part courageusement affronter les hordes perses dans une bataille sans espoir.",
                'country_id' => 4,
                'genre_id' => 3,
            ],
            [
                'title' => 'A VIRGEM MARGARIDA',
                'year' => '0000',
                'stars' => 3,
                'review' => "1975. Mozambique. Le gouvernement révolutionnaire tient à éliminer toutes traces du colonialisme au plus vite.",
                'country_id' => 5,
                'genre_id' => 1,
            ]
        ]);
    }
}
