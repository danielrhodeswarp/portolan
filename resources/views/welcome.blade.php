@extends('layouts.global-layout')

@section('title', 'Connect')
    
@push('scripts')
    <script src="/example.js"></script>
@endpush

@push('styles')
    <link rel="stylesheet" type="text/css" href="/example.css">
@endpush

    
@section('content')

<h1>Portolan - Connect</h1>

@if (session('message'))
    <p>{{ session('message') }}</p>
@endif

<form method="post" action="{{ route('connect.post-connect') }}">

<div class="row column small-12 medium-6 large-6">

<div class="row">
  <div class="large-12 columns">
    <label>Host</label>
    <input type="text" name="host" value="localhost" />
  </div>
</div>
<div class="row">
  <div class="large-12 columns">
    <label>Type</label>
    <select name="driver">
      <option value="mysql">MySQL</option>
      <option value="pgsql">PostgreSQL</option>
      
    </select>
  </div>
</div>
<div class="row">
  <div class="large-12 columns">
    <label>User</label>
    <input type="text" name="username" value="homestead" />
  </div>
</div>
<div class="row">
  <div class="large-12 columns">
    <label>Password</label>
    <input type="text" name="password" value="secret" />
  </div>
</div>
<div class="row">
  <div class="large-12 columns">
    <label>Schema</label>
    <input type="text" name="database" />
  </div>
</div>
<div class="row">
    <div class="large-12 columns">
        {{ csrf_field() }}
        <button type="submit" class="button float-right">Connect</button>
    </div>
</div>
</div>
    
</form>

@endsection