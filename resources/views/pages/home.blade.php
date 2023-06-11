@extends('layouts.main')

@section('title')
    Homepage
@endsection

@section('content')
    <h1>Homepage <i class="bi bi-1-circle"></i></h1>
@endsection

@push('js')
    <script src="{{ assets('bundles/home.bundle.js') }}"></script>
@endpush
