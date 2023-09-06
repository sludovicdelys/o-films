@extends('layout.base')

@section('title', 'Series')

@section('content')
<thead>
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
            @auth
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
            @endauth
        </tr>
    @endforeach
</tbody>
@endsection