@extends('layouts.error')

@section('title')
    Server Internal Error
@endsection

@section('content')
    <div class="error-context">
        <code id="error_message" data-message="{{ $message }}"></code>
        <h1>500</h1>
        <p>Server Internal Error</p>
    </div>
@endsection

@push('js')
    <script src="{{ assets('bundles/error.bundle.js') }}"></script>
@endpush
