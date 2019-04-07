@extends('layouts.app')

@section('content')
    <h1>Genre: {{ $genre }}</h1>
    @include('partials.movie-list', ['movies' => $movies])
@endsection
