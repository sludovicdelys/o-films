<?php

namespace App\Services;

use App\Models\Serie;
use App\Models\Genre;
use App\Models\Country;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class ApiBetaSeries
{
    public static function getSeriesByTitle(string $name)
    {
        // Si on en est là, le contenu de la recherche est validé et on peut faire l'appel à l'API
        // en utilisant la facade Http de Laravel : https://laravel.com/docs/8.x/http-client
        $apiResponse = Http::get('https://api.betaseries.com/search/shows', [
            'key' => env('BETASERIES_API_KEY'),
            'text' => $name
        ]);
        // On extrait les données de la réponse
        return $apiResponse->json();
    }

    public static function getSerieDetailById(int $betaseriesId)
    {
        $serie = new Serie();

        // On fait un appel à l'API BetaSeries pour récupérer les données de la série
        $apiResponse = Http::get("https://api.betaseries.com/shows/display", [
            'key' => env('BETASERIES_API_KEY'),
            'id' => $betaseriesId
        ]);
        // On extrait les données de la réponse
        $apiData = $apiResponse->json()['show'];

        // On hydrate l'objet Show avec les données récupérées
        $serie->title = $apiData['title'];
        $serie->year = $apiData['creation'];
        $serie->review= $apiData['description'];
        $serie->seasons = $apiData['seasons'];
        $serie->stars = $apiData['notes']['mean'];

        // L'API ne nous donne pas le nombre d'épisodes moyen par saison mais nous pouvons le calculer
        // en faisant la moyenne des épisodes par saison (information fournie dans la clé "seasons_details")
        // Pour celà nous pouvons nous servir des collections de Laravel et de la methode avg:
        // https://laravel.com/docs/8.x/collections#method-avg
        $serie->episodesPerSeason = round(collect($apiData['seasons_details'])->avg('episodes'));

        // L'API nous donne les genres sous la forme d'un tableau, hors notre application ne gère qu'un seul genre.
        // On va donc prendre le premier élément du tableau.
        // $apiData['genres'] étant un tableau associatif je vais m'aider de la méthode Arr::first()
        // pour récupérer le premier élément du tableau ($monTableau[0] fonctionne uniquement dans le cas d'un tableau indexé)
        $genre = Arr::first($apiData['genres']);

        /// On vérifie en base de données si on a un genre avec le même nom que celui de l'API.
        // Si il existe, on récupère son id, sinon on en crée un nouveau puis on récupère son id.
        // Ca tombe bien, Eloquent a une méthode pour ça : firstOrCreate() qui nous renvoie le model depuis la BDD si il existe,
        // sinon elle en crée un nouveau et le renvoie, on aura plus qu'a aller chercher l'id :) !

        // Dans un premier temps, eloquent fait un select
        // En cherchant un genre egal a $genre
        // Si il trouve un genre deja existant dans la BDD
        // Il le renvoit

        // SI il ne trouve pas un genre avec le name egal a $genre
        // Eloquent fait un insert d'un nouveau genre dont le name
        // sera $genre

        $serie->genre_id = Genre::firstOrCreate([
            'name' => $genre
        ])->id;

        // Même chose pour le pays, on va vérifier si il existe déjà dans la base de données, sinon on le crée

        $serie->country_id = Country::firstOrCreate([
            'name' => $apiData['country']
        ])->id;

        return $serie;
    }
}