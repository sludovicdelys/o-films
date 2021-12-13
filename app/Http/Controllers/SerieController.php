<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    public function index()
    {
        $series = Serie::all();
        return view('serie.index', [
            "series" => $series
        ]);
    }
}
