@extends('layout.base')

@section('title', 'Films')

@section('content')
<div class="table-responsive border border-secondary border-1 rounded p-5">
    <table class="table">
        <thead class="table-light">
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
        <tbody class="table-group-divider">
            @foreach ( $movies as $movie )
                <tr>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->year }}</td>
                    <td>{{ $movie->stars }}</td>
                    <td>{{ $movie->review }}</td>
                    <td>{{ $movie->country->name }}</td>
                    <td>{{ $movie->genre->name }}</td>
                    @auth
                    <td>
                        <div class="dropwdown">
                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Choose an action">Choisir une action</button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('movies.edit', [
                                    'movie' => $movie->id
                                    ]) }}" class="dropdown-item">Mettre à jour</a>
                                </li>
                                <li>
                                    <form action="{{ route('movies.destroy', ['movie' => $movie->id]) }}" method="POST">
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
