@extends('layouts.global-layout')

@section('title', 'Dashboard')
    
@push('scripts')
    <script src="/example.js"></script>
@endpush

@push('styles')
    <link rel="stylesheet" type="text/css" href="/example.css">
@endpush

    
@section('content')

<h1>Portolan - Dashboard</h1>

@if (session('message'))
    <p>{{ session('message') }}</p>
@endif

<p>Connection name: {{ $connectionName }}</p>

<h2>Schemas in connection</h2>
<ul>
    @foreach ($schemas as $schema)
        <li><a href="{{ route('dashboard.get-set-current-schema', ['schema' => $schema->Database]) }}">{{ $schema->Database }}</a></li>
    @endforeach
</ul>
    
<h2>Current schema</h2>
[{{ $currentSchema }}]

@endsection