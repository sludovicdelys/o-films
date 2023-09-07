@extends('layout.base')

@section('title', 'Series')

@section('content')
<div class="table-responsive border border-secondary border-1 rounded p-5">
    <table class="table">
        <thead class="table-light">
            <tr>
                <th scope="col">Titre</th>
                <th scope="col">Année</th>
                <th scope="col">Saisons</th>
                <th scope="col">Episode par saison</th>
                <th scope="col">Moyenne</th>
                <th scope="col">Resumé</th>
                <th scope="col">Pays</th>
                <th scope="col">Genre</th>
                @auth
                    <th scope="col"></th>
                    <th scope="col"></th>
                @endauth
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ( $series as $serie)
                <tr>
                    <td>{{ $serie->title }}</td>
                    <td>{{ $serie->year }}</td>
                    <td>{{ $serie->season }}</td>
                    <td>{{ $serie->episodesPerSeason }}</td>
                    <td>{{ $serie->stars }}</td>
                    <td>{{ $serie->review }}</td>
                    <td>{{ $serie->country->name }}</td>
                    <td>{{ $serie->genre->name }}</td>
                    @auth
                        <td>
                            <div class="dropwdown">
                                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Choose an action">Choisir une action</button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('series.edit', [
                                        'series' => $serie->id
                                    ]) }}" class="dropdown-item">Mettre à jour</a>
                                    </li>
                                    <li>
                                        <form action="{{ route('series.destroy', ['series' => $serie->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a class="dropdown-item" >Supprimer</a>
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