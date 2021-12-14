@extends('layout.base')

@section('title', 'Ajouter un film')

@section('content')
    <div class="box">
        @if ($errors->any())
        <article class="message is-danger">
            <div class="message-header">
            <p>Problème dans le formulaire</p>
            <button class="delete" aria-label="delete"></button>
            </div>
            <div class="message-body">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </article>
        @endif
        <form action="{{ route('movies.store') }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $movie->id }}">
            <div class="field">
                <label class="label">Titre</label>
                <div class="control">
                <input value="{{ old('title', $movie->title) }}" name="title" class="input" type="text" placeholder="Text input">
                </div>
            </div>
            <div class="field">
                <label class="label">Année de sortie</label>
                <div class="control">
                <input value="{{ old('year'), $movie->year }}" name="year" class="input" type="year" placeholder="Text input">
                </div>
            </div>
            <div class="field">
                <label class="label">Moyenne</label>
                <div class="control">
                <input value="{{ old('stars'), $movie->stars }}" name="stars" min="0" max="5" class="input" type="number" placeholder="Text input">
                </div>
            </div>
            <div class="field">
                <label class="label">resumé</label>
                <div class="control">
                <input value="{{ old('review'), $movie->review }}" name="review" class="input" type="text" placeholder="Text input">
                </div>
            </div>
            <div class="field">
                <label class="label">Pays</label>
                <div class="control">
                    <div class="select">
                        <select name="country_id">
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}" @if (old('country_id', $movie->country_id) == $country->id )
                                    selected
                                @endif>{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="field">
                <label class="label">Genre</label>
                <div class="control">
                    <div class="select">
                        <select name="genre_id">
                            @foreach ($genres as $genre)
                                <option value="{{ $genre->id }}" @if (old('genre_id', $movie->genre_id) == $genre->id )
                                    selected
                                @endif>{{ $genre->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="field is-grouped">
                <div class="control">
                <button class="button is-primary">Soumettre</button>
                </div>
            </div>
        </form>
    </div>
@endsection
