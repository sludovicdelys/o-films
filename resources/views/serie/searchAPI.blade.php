@extends('layout.base')

@section('title', 'Importer une série depuis BetaSeries')

@section('content')
<div class="py-5 text-center">
  <h2>Importer une série depuis BetaSeries</h2> 
</div>
<div class="w-50 m-auto">
  <form action="" method="GET" class="row needs-validation" novalidate>
    <div class="mb-3">
      <label for="name" class="form-label">Nom de la série</label>
      <input class="form-control" type="text" name="name" placeholder="Nom de la série" autocomplete="off" required>
      <div class="invalid-feedback">Veuillez fournir un titre.</div>
    </div>
    <div class="mb-3">
      <button type="submit" class="btn btn-secondary">Rechercher</button>
    </div>
  </form>
</div>
@if (isset($results))
  <div class="table-responsive w-75 m-auto border border-secondary border-1 rounded">
    <form action="" class="action">
    <table class="table table-hover mb-0">
      <thead class="table-dark">
        <tr>
          <th class="align-middle" scope="col">Image</th>
          <th class="align-middle" scope="col">Titre</th>
          <th class="align-middle" scope="col">Année de sortie</th>
          <th class="align-middle" scope="col"></th>
        </tr>
      </thead>
      <tbody>
          @foreach ($results as $result)
          <tr>
            <td class="align-middle"><img src="{{ $result['poster'] }}" class="img-fluid" style="width: 120px;" /></td>
            <td class="align-middle">{{ $result['title'] }}</td>
            <td class="align-middle">{{ $result['release_date'] }}</td>
            <td class="align-middle">
                <a href="{{ route('series.create', ['betaseries_id' => $result['id']]) }}" class="btn btn-secondary" role="button">Importer la série</a>
            </td>
          </tr>
          @endforeach
      </tbody>
    </table>
    </form>
  </div>
@endif
@endsection

