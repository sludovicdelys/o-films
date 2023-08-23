<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\Country;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('movie/index', [
            "movies" => $movies
        ]);
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movie/create', [
            "movie" => new Movie(),
            "genres" => Genre::all(),
            "countries" => Country::all(),
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
        // On valide le formulaire 
        // https://laravel.com/docs/8.x/validation#quick-writing-the-validation-logic
        $request->validate([
            'title' => 'required',
            'year' => 'required|numeric',
            'stars' => 'required|numeric',
            'review' => 'required|min:20',
            'country_id' => 'required|exists:countries,id',
            'genre_id' => 'required|exists:genres,id'
        ]);
        
        $id = $request->input("id");
        
        if ($id == "") {
            $movie = new Movie();
        } else {
            $movie = Movie::find($id);
        }
        
        // On doit vérifier si la requete contient un id 

        // Si elle contient un id, on est sur un update

        // Si elle ne contient pas un id, on est sur un insert
          
        $movie->title = $request->title;
        $movie->year = $request->year;
        $movie->stars = $request->stars;
        $movie->review = $request->review;
        $movie->country_id = $request->country_id;
        $movie->genre_id = $request->genre_id;
        $movie->save();

        return redirect()->route('movies');
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
        $movie = Movie::find($id);

        // appel la view formulaire en envoyant la liste des genres et des pays
        return view('movie/edit', [
            'movie' => $movie,
            'genres' => Genre::all(),
            'countries' => Country::all()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Movie::destroy($id);

        return redirect('movies');
    }
}
