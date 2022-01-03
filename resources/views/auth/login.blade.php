@extends('layout.base')

@section('title', 'Login')

@section('content')
<div class="login-page">
    <div class="form">
        <form class="login-form">
            <input type="text" placeholder="username"/>
            <input type="password" placeholder="password"/>
            <button>login</button>
        </form>
    </div>
</div>
@endsection