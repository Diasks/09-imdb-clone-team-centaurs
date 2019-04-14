@extends('layouts.app')

@section('content')
    <h1 class="main-heading">FEATURED MOVIES</h1>
    @include('partials.movie-list', ['movies' => $movies])

    <h2>LATEST REVIEWS</h2>
    @include('partials.review-list', ['reviews' => $reviews])
@endsection
