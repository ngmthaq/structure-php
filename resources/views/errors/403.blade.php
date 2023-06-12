@extends('layouts.error')

@section('title')
    Forbidden
@endsection

@section('content')
    <div class="error-context">
        <h1>403</h1>
        <p>You are not authorized to access this link</p>
    </div>
@endsection

@push('js')
    <script src="{{ assets('bundles/error.bundle.js') }}"></script>
@endpush
