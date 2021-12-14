@extends('layout.base')

@section('title', 'Films')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Année</th>
            <th>Moyenne</th>
            <th>Resumé</th>
            <th>Pays</th>
            <th>Genre</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $movies as $movie )
            <tr>
                <td>{{ $movie->title }}</td>
                <td>{{ $movie->year }}</td>
                <td>{{ $movie->stars }}</td>
                <td>{{ $movie->review }}</td>
                <td>{{ $movie->country->name }}</td>
                <td>{{ $movie->genre->name }}</td>
                <td><a href="{{ route('movies.edit', [
                    'movie' => $movie->id
                ]) }}">Update</a></td>
                <td>
                    <form action="{{ route('movies.destroy', ['movie' => $movie->id]) }}" method="POST">
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
