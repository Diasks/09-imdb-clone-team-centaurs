@extends('layouts.app')

@section('content')
    <h1 class="main-heading">TOP RATED MOVIES</h1>
    @include('partials.movie-list', ['movies' => $movies])
@endsection
