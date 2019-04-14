@extends('layouts.app')

@section('content')
    <h1 class="main-heading">REVIEWS FOR {{ strtoupper($movie->title) }}</h1>

    @include('partials.review-list', ['reviews' => $reviews])

    <a href="/movie/{{ $movie->id }}">
        <button class="btn btn-dark">Go back</button>
    </a>
@endsection
