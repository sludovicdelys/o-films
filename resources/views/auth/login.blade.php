@extends('layout.base')

@section('title', 'Connexion')

@section('content')
<div class="w-25 m-auto">
    <form action="{{ route('auth.login.action') }}" method="POST" class="box column is-one-third">
        @foreach ($errors->all() as $error)
        <article class="message is-small is-danger">
            <div class="message-body">
                <p>{{ $error }}</p>
            </div>
        </article>
        @endforeach
        @csrf
        <h1 class="h3 mb-3 fw-normal">Connectez-vous</h1>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Ex: nicole@oclock.io" value="{{ old('email') }}" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" required>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Connexion</button>
        </div>
    </form>
</div>
@endsection