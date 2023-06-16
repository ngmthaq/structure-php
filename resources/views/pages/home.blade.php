@extends('layouts.main')

@section('title')
    Homepage
@endsection

@section('content')
    <h1>Hello {{ isset(auth()->user) ? auth()->user->name : 'Guest' }}</h1>
    @if (!auth()->authCheck())
        <a href="/login">Login</a>
    @else
        <form action="/logout" method="post">
            {{ csrfInputTag() }}
            <button type="submit" name="button" value="logout">Logout</button>
        </form>
    @endif
@endsection

@push('js')
    <script src="{{ assets('bundles/home.bundle.js') }}"></script>
@endpush
