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
            <th></th>
            <th></th>
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
                <td><a href="{{ route('series.edit', [
                    'series' => $serie->id
                ]) }}">Update</a></td>
                <td>
                    <form action="{{ route('series.destroy', ['series' => $serie->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button is-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection