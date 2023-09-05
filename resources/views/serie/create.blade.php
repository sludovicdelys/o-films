@extends('layout.base')

@section('title', 'Ajouter une série')

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
        <form action="{{ route('series.store') }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $serie->id }}">
            <div class="field">
                <label class="label">Titre</label>
                <div class="control">
                    <input value="{{ old('title', $serie->title) }}" name="title" class="input" type="text" placeholder="titre de la série">
                </div>
            </div>
            <div class="field">
                <label class="label">Année de sortie</label>
                <div class="control">
                    <input value="{{ old('year', $serie->year )}}" name="year" class="input" type="year" placeholder="année de sortie de la série">
                </div>
            </div>
            <div class="field">
                <label class="label">Nombre de saisons</label>
                <div class="control">
                    <input value="{{ old('seasons', $serie->seasons )}}" name="seasons" min="0" max="5" class="input" type="number" placeholder="nombre de saisons">
                </div>
            </div>
            <div class="field">
                <label class="label">Nombre d'épisodes par saison</label>
                <div class="control">
                    <input value="{{ old('episodesPerSeason', $serie->episodesPerSeason )}}" name="episodesPerSeason" min="0" max="10" class="input" type="number" placeholder="nombre d'épisodes par saison">
                </div>
            </div>
            <div class="field">
                <label class="label">Note</label>
                <div class="select">
                    <select name="stars">
                        <option>choisissez une note</option>
                        <option value="0" {{ old('stars', $serie->stars) == 0 ? 'selected' : '' }}>0</option>
                        <option value="1" {{ old('stars', $serie->stars) == 1 ? 'selected' : '' }}>1</option>
                        <option value="2" {{ old('stars', $serie->stars) == 2 ? 'selected' : '' }}>2</option>
                        <option value="3" {{ old('stars', $serie->stars) == 3 ? 'selected' : '' }}>3</option>
                        <option value="4" {{ old('stars', $serie->stars) == 4 ? 'selected' : '' }}>4</option>
                        <option value="5" {{ old('stars', $serie->stars) == 5 ? 'selected' : '' }}>5</option>
                    </select>
                </div>
            </div>
            <div class="field">
                <label class="label">Resumé</label>
                <div class="control">
                    <input value="{{ old('review', $serie->review )}}" name="review" class="input" type="text" placeholder="résumé de la série">
                </div>
            </div>
            <div class="field">
                <label class="label">Pays</label>
                <div class="control">
                    <div class="select">
                        <select name="country_id">
                            <option>choisissez un pays</option>

                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}" @if (old('country_id', $serie->country_id) == $country->id )
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
                                <option value="{{ $genre->id }}" @if (old('genre_id', $serie->genre_id) == $genre->id )
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