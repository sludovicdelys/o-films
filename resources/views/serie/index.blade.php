@extends('layout.base')

@section('title', 'Series')

@section('content')
<div class="table-responsive w-75 m-auto border border-secondary border-1 rounded">
    <table class="table table-hover mb-0">
        <thead class="table-dark">
            <tr>
                <th class="align-middle" scope="col"><p>Titre</p></th>
                <th class="align-middle" scope="col"><p>Année</p></th>
                <th class="align-middle" scope="col"><p> Nombre de saisons</p></th>
                <th class="align-middle" scope="col"><p>Nombre d'épisodes</p> </th>
                <th class="align-middle" scope="col"><p>Moyenne</p></th>
                <th class="align-middle" scope="col"><p>Resumé</p></th>
                <th class="align-middle" scope="col"><p>Pays</p></th>
                <th class="align-middle" scope="col"><p>Genre</p></th>
                @auth
                    <th scope="col"></th>
                @endauth
            </tr>
        </thead>
        <tbody>
            @foreach ( $series as $serie)
                <tr>
                    <td class="align-middle">{{ $serie->title }}</td>
                    <td class="align-middle">{{ $serie->year }}</td>
                    <td class="align-middle">{{ $serie->season }}</td>
                    <td class="align-middle">{{ $serie->episodesPerSeason }}</td>
                    <td class="align-middle">{{ $serie->stars }}</td>
                    <td class="align-middle">{{ $serie->review }}</td>
                    <td class="align-middle">{{ $serie->country->name }}</td>
                    <td class="align-middle">{{ $serie->genre->name }}</td>
                    @auth
                        <td class="align-middle">
                            <div class="btn-group">
                                <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Choose an action">Actions</button>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('series.edit', [
                                        'series' => $serie->id
                                    ]) }}" class="dropdown-item">Mettre à jour</a>
                                    </li>
                                    <li>
                                        <form action="{{ route('series.destroy', ['series' => $serie->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item" >Supprimer</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    @endauth
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection