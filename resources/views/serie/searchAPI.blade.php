@extends('layout.base')

@section('title', 'Importer une série depuis BetaSeries')

@section('content')
<div class="py-5 text-center">
  <h2>Importer une série depuis BetaSeries</h2> 
</div>
<div class="row">
  <div class="col-md-7 col-lg-8 m-auto">
    <form action="" method="GET" class="row needs-validation" novalidate>
      <div class="col-12 mb-3">
        <label for="title" class="form-label">Nom de la série</label>
        <input class="form-control" type="text" name="title" autocomplete="off" required>
        <div class="invalid-feedback">Veuillez fournir un titre.</div>
      </div>
      <div class="col-12 mb-3">
        <button type="submit" class="btn btn-secondary">Rechercher</button>
      </div>
    </form>
  </div>
  <div class="col-md-7 col-lg-8 m-auto">
      @if (isset($results))
      <table class="table mb-0">
        <thead class="table-dark">
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
                <td><a href="{{ route('series.create', ['betaseries_id' => $result['id']]) }}" class="button is-primary">Importer la série</a></td>
              </tr>
            @endforeach
        </tbody>
      </table>
      @endif
    </div>
</div>
@endsection

