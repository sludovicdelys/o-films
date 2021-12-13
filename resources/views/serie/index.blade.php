@extends('layout.base')

@section('title', 'Series')

@section('content')
    <div class="box is-centered">
        <h1 class="title has-text-centered">All my series!</h1>
        <div class="section">
            <a href="#" class="button is-primary">Sort By genre</a>
            <a href="#" class="button is-primary">Sort By country</a>
        </div>
        <table class="table is-bordered is-stripped is-hoverable">
            <thead class="table-header">
                <tr>
                    <th class="has-text-primary-dark">Title</th>
                    <th class="has-text-primary-dark">Year</th>
                    <th class="has-text-primary-dark">Seasons</th>
                    <th class="has-text-primary-dark">episodesPerSeason</th>
                    <th class="has-text-primary-dark">stars</th>
                    <th class="has-text-primary-dark">review</th>
                </tr>
            </thead>
            <tbody>
                @foreach($series as $serie)
                <tr>
                    <th>{{ $serie->title }}</th>
                    <th>{{ $serie->year }}</th>
                    <th>{{ $serie->seasons }}</th>
                    <th>{{ $serie->episodesPerSeason }}</th>
                    <th>{{ $serie->stars }}</th>
                    <th>{{ $serie->review }}</th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection