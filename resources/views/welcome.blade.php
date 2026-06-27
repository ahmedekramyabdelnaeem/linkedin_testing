@extends('layouts.app')

@section('content')

<div class="text-center mt-5">

    <h1 class="mb-3">Welcome to Job Platform</h1>

    <p class="text-muted mb-4">
        Find your dream job or hire the best talent.
    </p>

    <a href="{{ route('login') }}" class="btn btn-primary me-2">
        Login
    </a>

    <a href="{{ route('register') }}" class="btn btn-outline-primary">
        Create Account
    </a>

</div>

@endsection