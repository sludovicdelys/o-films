@extends('layout.base')

@section('title', 'Movies')

@section('content')
    <div class="box is-centered">
        <h1 class="title has-text-centered">All my movies!</h1>
        <div class="section">
            <a href="#" class="button is-primary">Sort By genre</a>
            <a href="#" class="button is-primary">Sort By country</a>
        </div>
        <table class="table is-bordered is-stripped is-hoverable">
            <thead class="table-header">
                <tr>
                    <th class="has-text-primary-dark">Title</th>
                    <th class="has-text-primary-dark">Year</th>
                    <th class="has-text-primary-dark">Stars</th>
                    <th class="has-text-primary-dark">Review</th>
                </tr>
            </thead>
            <tbody>
                @foreach($movies as $movie)
                <tr>
                    <th>{{ $movie->title }}</th>
                    <th>{{ $movie->year }}</th>
                    <th>{{ $movie->stars }}</th>
                    <th>{{ $movie->review }}</th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection