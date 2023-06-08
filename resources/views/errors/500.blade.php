@extends('layouts.error')

@section('title')
    Server Internal Error
@endsection

@section('content')
    <code id="error_message" data-message="{{ $message }}"></code>
    <h1>500</h1>
    <p>Server Internal Error</p>
@endsection

@push('js')
    <script src="{{ assets('bundles/error.bundle.js') }}"></script>
@endpush
