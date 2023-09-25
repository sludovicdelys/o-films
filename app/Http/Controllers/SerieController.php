<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Serie;
use App\Models\Country;
use App\Services\ApiBetaSeries;
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
        // Si la requête contient un paramètre "betaseries_id"
        // cela signifie que l'on souhaite importer une série depuis l'API BetaSeries
        if ($request->has('betaseries_id')) {
            // On valide que "betaseries_id" soit bien un entier
            $request->validate([
                'betaseries_id' => 'integer'
            ]);
            $serie = ApiBetaSeries::getSerieDetailById($request->input('betaseries_id'));
        }

        return view('serie.create', [
            "serie" => $serie ?? new Serie(),
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
            'review' => 'required',
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
    public function edit($id)
    {

        $serie = Serie::find($id) ?? new Serie();

        return view('serie.create', [
            "serie" => $serie,
            "countries" => Country::all(),
            "genres" => Genre::all()
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
        $request->validate([
            'title' => 'required',
            'year' => 'required|numeric',
            'seasons' => 'required|numeric',
            'episodesPerSeason' => 'required|numeric',
            'stars' => 'required|numeric',
            'review' => 'required',
            'country_id' => 'required|exists:countries,id',
            'genre_id' => 'required|exists:genres,id'
        ]);

        if ($id !== null) {
            $serie = Serie::find($id) ?? new Serie();
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

            $seriesList = ApiBetaSeries::getSeriesByTitle($request->input('name'));
            // On a identifié le tableau des résultats qui se trouve dans la clé "shows" de $apiData
            // Il n'y a plus qu'à renvoyer la vue avec les données nécessaires
            return view('serie.searchApi', [
                'resultsNumber' => $seriesList['total'],
                'results' => $seriesList['shows']
            ]);
        }
        // Si on n'a pas de recherce, on renvoie la view du formulaire de recherche sans données
        return view('serie.searchAPI');
    }
}
