@extends('layout.base')

@section('title', 'Ajouter un film')

@section('content')
<div class="row">
    <div class="col-md-7 col-lg-8 m-auto">
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible" role="alert">
            <div class="alert-header">
                <h4>Une ou plusieurs erreurs sont présentes dans le formulaire</h4>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <!-- 
            //TODO : Style error message list
            <div class="alert-body">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div> 
            -->
        </div>
        @endif
        <form action="{{ route('movies.store') }}" method="post" class="row needs-validation" novalidate>
            @csrf
            <input type="hidden" name="id" value="{{ $movie->id }}">
            <div class="col-12 mb-3">
                <label for="title" class="form-label">Titre</label>
                <input value="{{ old('title', $movie->title) }}" type="text" class="form-control" name="title" id="title" required>
                <div class="invalid-feedback">Veuillez fournir un titre.</div>
            </div>
            <div class="col-12 mb-3">
                <label for="year" class="form-label">Année de sortie</label>
                <input value="{{ old('year'), $movie->year }}" type="year" class="form-control" name="year" id="year" required>
                <div class="invalid-feedback">Veuillez fournir l'année de sortie.</div>
            </div>
            <div class="col-12 mb-3">
                <label for="stars" class="form-label">Note</label>
                <select  class="form-select" name="stars" required>
                    <option value="0" {{ old('stars', $movie->stars) == 0 ? 'selected' : '' }}>0</option>
                    <option value="1" {{ old('stars', $movie->stars) == 1 ? 'selected' : '' }}>1</option>
                    <option value="2" {{ old('stars', $movie->stars) == 2 ? 'selected' : '' }}>2</option>
                    <option value="3" {{ old('stars', $movie->stars) == 3 ? 'selected' : '' }}>3</option>
                    <option value="4" {{ old('stars', $movie->stars) == 4 ? 'selected' : '' }}>4</option>
                    <option value="5" {{ old('stars', $movie->stars) == 5 ? 'selected' : '' }}>5</option>
                </select>
            </div>
            <div class="col-12 mb-3">
                <label for="review" class="form-label">Resumé</label>
                <textarea value="{{ old('review'), $movie->review }}" class="form-control" id="review" rows="3" required></textarea>
                <div class="invalid-feedback">Veuillez fournir un résumé.</div>
            </div>
            <div class="col-12 mb-3">
                <label class="form-label">Pays</label>
                <select class="form-select" name="country_id" required>
                    <option selected disabled value="">Choisir...</option>

                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}" @if (old('country_id', $movie->country_id) == $country->id )
                            selected
                        @endif>{{ $country->name }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">Veuillez fournir le pays de production.</div>
            </div>
            <div class="col-12 mb-3">
                <label class="form-label">Genre</label>
                <select class="form-select" name="genre_id" required>
                    <option selected disabled value="">Choisir...</option>

                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}" @if (old('genre_id', $movie->genre_id) == $genre->id )
                            selected
                        @endif>{{ $genre->name }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">Veuillez fournir le genre.</div>
            </div>
            <div class="col-12 mb-3">
                <button type="submit" class="btn btn-success">Soumettre</button>
                <button type="submit" class="btn btn-secondary">Annuler</button>
            </div>
        </form>
    </div>
</div>
@endsection
