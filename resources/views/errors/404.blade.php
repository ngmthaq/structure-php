@extends('layouts.error')

@section('title')
    Not Found
@endsection

@section('content')
    <div class="error-context">
        <h1>404</h1>
        <p>Not Found</p>
    </div>
@endsection

@push('js')
    <script src="{{ assets('bundles/error.bundle.js') }}"></script>
@endpush
