@extends('layout.base')

@section('title', 'Connexion')

@section('content')
<div class="w-75 m-auto">
    <form action="{{ route('auth.login.action') }}" method="POST">
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <span>{{ $error }}</span>
        </div>
        @endforeach
        @csrf
        <h1 class="h3 mb-3 fw-normal">Connectez-vous</h1>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" value="{{ old('email') }}" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Connexion</button>
        </div>
    </form>
</div>
@endsection