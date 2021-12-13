@extends('layout.base')

@section('title', 'Ajouter un film')

@section('content')
    <div class="box">
        <form action="" method="post">
            <div class="field">
                <label class="label">Titre</label>
                <div class="control">
                <input name="title" class="input" type="text" placeholder="Text input">
                </div>
            </div>
            <div class="field">
                <label class="label">Année de sortie</label>
                <div class="control">
                <input name="year" class="input" type="year" placeholder="Text input">
                </div>
            </div>
            <div class="field">
                <label class="label">Moyenne</label>
                <div class="control">
                <input name="stars" min="0" max="5" class="input" type="number" placeholder="Text input">
                </div>
            </div>
            <div class="field">
                <label class="label">resumé</label>
                <div class="control">
                <input name="title" class="input" type="text" placeholder="Text input">
                </div>
            </div>
            <div class="field">
                <label class="label">Pays</label>
                <div class="control">
                    <div class="select">
                    <select name="country">
                        <option>Exemple 1</option>
                        <option>Exemple 2</option>
                    </select>
                    </div>
                </div>
            </div>
            <div class="field">
                <label class="label">Genre</label>
                <div class="control">
                    <div class="select">
                    <select name="genre">
                        <option>Exemple 1</option>
                        <option>Exemple 2</option>
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
