@extends('layout.base')

@section('title', 'Importer une série depuis BetaSeries')

@section('content')

<h1 class="title">Importer une série depuis BetaSeries</h1>

<form action="#" method="GET" class="box column is-one-third">
  <div class="field">
      <label class="label">Nom de la série</label>
      <div class="control">
        <input class="input" type="text" placeholder="Text input">
      </div>
  </div>
  <div class="field is-grouped">
      <div class="control">
        <button class="button is-link">Submit</button>
      </div>
  </div>
</form>
@endsection