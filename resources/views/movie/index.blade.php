@extends('layout.base')

@section('title', 'Films')

@section('content')
<div class="table-responsive w-75 m-auto border border-secondary border-1 rounded">
    <table class="table table-hover mb-0">
        <thead class="table-dark">
            <tr>
                <th class="align-middle" scope="col">Titre</th>
                <th class="align-middle" scope="col">Année</th>
                <th class="align-middle" scope="col">Moyenne</th>
                <th class="align-middle" scope="col">Resumé</th>
                <th class="align-middle" scope="col">Pays</th>
                <th class="align-middle" scope="col">Genre</th>
                @auth
                    <th scope="col"></th>
                @endauth
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ( $movies as $movie )
                <tr>
                    <td class="align-middle">{{ $movie->title }}</td>
                    <td class="align-middle">{{ $movie->year }}</td>
                    <td class="align-middle">{{ $movie->stars }}</td>
                    <td class="align-middle">{{ $movie->review }}</td>
                    <td class="align-middle">{{ $movie->country->name }}</td>
                    <td class="align-middle">{{ $movie->genre->name }}</td>
                    @auth
                    <td class="align-middle">
                        <div class="btn-group">
                            <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Choose an action">Actions</button>
                            <ul class="dropdown-menu" role="menu">
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
