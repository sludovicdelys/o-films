@extends('layout.base')

@section('title', 'Connexion')

@section('content')
<div class="columns  is-centered">
    <form action="/auth/login" method="POST" class="box column is-one-third">
        @foreach ($errors->all() as $error)
        <article class="message is-small is-danger">
            <div class="message-body">
                <p>{{ $error }}</p>
            </div>
        </article>
        @endforeach
        @csrf
        <div class="field">
            <label for="email" class="label">Email</label>
            <div class="control ">
                <input type="email" name="email" id="email" placeholder="Ex: nicole@oclock.io" class="input" value="{{ old('email') }}" required>
            </div>
        </div>
        <div class="field">
            <label for="password" class="label">Password</label>
            <div class="control">
                <input type="password" name="password" id="password" class="input" required>
            </div>
        </div>
        <div class="field">
            <button class="button is-success">
                Login
            </button>
        </div>
    </form>
</div>
@endsection