@extends('layouts.main')

@section('title')
    Homepage
@endsection

@section('content')
    <form action="/login" method="post">
        {{ csrfInputTag() }}
        <input type="text" name="email" id="email" placeholder="Email" autocomplete="email">
        <input type="password" name="password" id="password" placeholder="Password" autocomplete="current-password">
        <button type="submit" name="login" value="login-button">Login</button>
    </form>
@endsection

@push('js')
    <script src="{{ assets('bundles/home.bundle.js') }}"></script>
@endpush
