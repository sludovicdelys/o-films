@extends('layout.base')

@section('title', 'Importer une série depuis BetaSeries')

@section('content')

<h1 class="title">Importer une série depuis BetaSeries</h1>

<form action="" method="GET" class="box column is-one-third">
  <div class="field">
      <label class="label">Nom de la série</label>
      <div class="control">
        <input class="input" type="text" placeholder="Text input">
      </div>
  </div>
  <div class="field">
      <div class="control">
        <button class="button is-link">Rechercher</button>
      </div>
  </div>
</form>
@if (isset($results))
<table class="table mt-4 is fullwidth">
  <thead>
    <tr>
        <th>Image</th>
        <th>Titre</th>
        <th>Année de sortie</th>
        <th></th>
    </tr>
  </thead>
  <tbody>
      @foreach ($results as $result)
      <tr>
        <td style="width: 15%;"><img src="{{ $result['poster'] }}" class="image" /></td>
        <td>{{ $result['title'] }}</td>
        <td>{{ $result['release_date'] }}</td>
        <td><a href="{{ route('shows.create', ['betaseries_id' => $result['id']]) }}" class="button is-primary">Importer la série</a></td>
      </tr>
      @endforeach
  </tbody>
</table>
@endif
@endsection