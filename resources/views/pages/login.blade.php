@extends('layouts.main')

@section('title')
    Homepage
@endsection

@section('content')
    <form action="/login" method="post">
        {{ csrfInputTag() }}
        <input type="text" name="email" id="email" placeholder="Email" autocomplete="email"><br>
        <input type="password" name="password" id="password" placeholder="Password" autocomplete="current-password"><br>
        <button type="submit" name="button" value="login-button">Login</button><br>
        <span>{{ $flashMessage['loginError'] }}</span>
    </form>
    <br>
    <a href="/">Homepage</a>
@endsection

@push('js')
    <script src="{{ assets('bundles/home.bundle.js') }}"></script>
@endpush
