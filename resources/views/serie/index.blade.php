@extends('layout.base')

@section('title', 'Series')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Année</th>
            <th>Saisons</th>
            <th>Episode par saison</th>
            <th>Moyenne</th>
            <th>Resumé</th>
            <th>Pays</th>
            <th>Genre</th>
        </tr>
    </thead>
    <tbody>
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
            </tr>
        @endforeach
    </tbody>
</table>
@endsection