@extends('layouts.app')

@section('content')
    <h1 class="main-heading">FEATURED MOVIES</h1>
    @include('partials.movie-list', ['movies' => $movies])

    <h2>LATEST REVIEWS</h2>
    @foreach ($reviews as $review)
        <div class="card">
            <div class="card-header">
                <h5>User: {{ $review->author }}</h5>
            </div>
            <div class="card-body">
                <p class="card-text">
                <p> {{ $review->content }}</p>
            </div>
        </div>
    @endforeach
@endsection
