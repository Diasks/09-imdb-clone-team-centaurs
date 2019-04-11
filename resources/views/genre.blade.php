@extends('layouts.app')

@section('content')
    <h1 class="main-heading">{{ strtoupper($genre) }} MOVIES</h1>
    @include('partials.movie-list', ['movies' => $movies])
@endsection
