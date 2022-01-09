<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Serie;
use App\Models\Country;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SerieController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $series = Serie::all();
        return view('serie.index', [
            "series" => $series
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $serie = new Serie();

        // Si la requête contient un paramètre "betaseries_id", on imposte la série correspondante depuis l'API de BetaSeries
        if ($request->has('betaseries_id')) {
            // On valide que "betaseries_id" soit bien un entier
            $validated = $request->validate([
                'betaseries_id' => 'integer'
            ]);
            // On fait un appel à l'API BetaSeries pour récupérer les données de la série
            $apiResponse = Http::get("https://api.betaseries.com/shows/display", [
                'key' => env('BETASERIES_API_KEY'),
                'id'=> $request->input('betaseries_id')
            ]);
            // On extrait les données de la réponse
            $apiData = $apiResponse->json()['show'];

            // On hydrate l'objet Serie avec les données récupérées
            $serie->title = $apiData['title'];
            $serie->year = $apiData['creation'];
            $serie->review = $apiData['description'];
            $serie->seasons = $apiData['seasons'];
            $serie->stars = $apiData['notes']['mean'];
            
             // L'API ne nous donne pas le nombre d'épisodes moyen par saison mais nous pouvons le calculer
            // en faisant la moyenne des épisodes par saison (information fournie dans la clé "seasons_details")
            // Pour celà nous pouvons nous servir des collections de Laravel et de la methode avg:
            // https://laravel.com/docs/8.x/collections#method-avg
            $serie->episodesPerSeason = floor(collect($apiData['seasons_details'])->avg('episodes'));

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
        }

        return view('serie.create', [
            "serie" => $serie,
            "genres" => Genre::all(),
            "countries" => Country::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'year' => 'required|numeric',
            'seasons' => 'required|numeric',
            'episodesPerSeason' => 'required|numeric',
            'stars' => 'required|numeric',
            'review' => 'required|min:20',
            'country_id' => 'required|exists:countries,id',
            'genre_id' => 'required|exists:genres,id'
        ]);

        if ($request->id !== null) {
            $serie = Serie::find($request->id) ?? new Serie();
        } else {
            $serie = new Serie();
        }

        $serie->title = $request->title;
        $serie->year = $request->year;
        $serie->seasons = $request->seasons;
        $serie->episodesPerSeason = $request->episodesPerSeason;
        $serie->stars = $request->stars;
        $serie->review = $request->review;
        $serie->country_id = $request->country_id;
        $serie->genre_id = $request->genre_id;
        $serie->save();

        return redirect()->route('series.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Serie $serie)
    {
        return view('serie.create', [
            "countries" => Country::all(),
            "genres" => Genre::all(),
            "serie" => $serie
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Serie::destroy($id);

        return redirect('series');
    }

    /**
     * Connects to the BetaSeries API and returns a lit of results 
     */
    public function searchApi(Request $request)
    {
        // Si on a une recherche, on fait un appel à l'API
        if ($request->has('name')) {
            // Pour commencer on valide les données du formulaire 
            $request->validate([
                'name' => 'max:255'
            ]);

            // Si le contenu de la recherche est validé on peut faire l'appel à l'API avec la facade Http de Laravel
            $apiResponse = Http::get('https://api.betaseries.com/search/shows', [
                'key' => env('BETASERIES_API_KEY'),
                'text'=>$request->name
            ]);

            // Ici on extrait les données de la réponse
            $apiData = $apiResponse->json();

            // On renvoie la view avec les données nécessaires
            return view('serie.searchAPI', [
                'results' => $apiData['shows'] // On a identifié que le tableau de reésultats que l'on cherche se trouve dans la clé "shows"
            ]);
        }
        // Si on n'a pas de recherce, on renvoie la view du formulaire de recherche sans données
        return view('serie.searchAPI');
    }
}
