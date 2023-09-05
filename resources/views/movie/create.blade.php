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
                <input value="{{ old('title', $movie->title) }}" name="title" class="input" type="text" placeholder="titre du film">
                </div>
            </div>
            <div class="field">
                <label class="label">Année de sortie</label>
                <div class="control">
                <input value="{{ old('year'), $movie->year }}" name="year" class="input" type="year" placeholder="année de sortie du film">
                </div>
            </div>
            <div class="field">
                <label class="label">Note</label>
                <div class="select">
                    <select name="stars">
                        <option>choisissez une note</option>
                        <option value="0" {{ old('stars', $movie->stars) == 0 ? 'selected' : '' }}>0</option>
                        <option value="1" {{ old('stars', $movie->stars) == 1 ? 'selected' : '' }}>1</option>
                        <option value="2" {{ old('stars', $movie->stars) == 2 ? 'selected' : '' }}>2</option>
                        <option value="3" {{ old('stars', $movie->stars) == 3 ? 'selected' : '' }}>3</option>
                        <option value="4" {{ old('stars', $movie->stars) == 4 ? 'selected' : '' }}>4</option>
                        <option value="5" {{ old('stars', $movie->stars) == 5 ? 'selected' : '' }}>5</option>
                    </select>
                </div>
            </div>
            <div class="field">
                <label class="label">Resumé</label>
                <div class="control">
                <input value="{{ old('review'), $movie->review }}" name="review" class="input" type="text" placeholder="résumé du film">
                </div>
            </div>
            <div class="field">
                <label class="label">Pays</label>
                <div class="control">
                    <div class="select">
                        <select name="country_id">
                            <option>choisissez un pays</option>

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
                            <option>choisissez un genre</option>

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
                <div class="control">
                    <button class="button is-primary">Annuler</button>
                </div>
            </div>
        </form>
    </div>
@endsection
