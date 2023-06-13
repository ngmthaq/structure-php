@extends('layouts.main')

@section('title')
    Homepage
@endsection

@section('content')
    <h1>Hello {{ isset(auth()->user) ? auth()->user->name : 'Guest' }}</h1>
    @if (!auth()->authCheck())
        <a href="/login">Login</a>
    @else
        <a href="/logout">Logout</a>
    @endif
@endsection

@push('js')
    <script src="{{ assets('bundles/home.bundle.js') }}"></script>
@endpush
