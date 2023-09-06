@extends('layout.base')

@section('title', 'Films')

@section('content')
<thead>
    <tr>
        <th scope="col">Titre</th>
        <th scope="col">Année</th>
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
    @foreach ( $movies as $movie )
        <tr>
            <td>{{ $movie->title }}</td>
            <td>{{ $movie->year }}</td>
            <td>{{ $movie->stars }}</td>
            <td>{{ $movie->review }}</td>
            <td>{{ $movie->country->name }}</td>
            <td>{{ $movie->genre->name }}</td>
            @auth
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
            @endauth
        </tr>
    @endforeach
</tbody>
@endsection
