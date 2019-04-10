@extends('layouts.app')

@section('content')
    <h1 class="genre">{{ $genre }}</h1>
    @include('partials.movie-list', ['movies' => $movies])
@endsection
