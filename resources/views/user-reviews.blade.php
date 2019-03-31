@extends('layouts.app')

@section('content')
    <h2>Reviews by {{ $user->name }}</h2>
    @forelse ($reviews as $review)
        <div class="card mb-3">
            <div class="card-header">
                <h5>Movie: {{ $review->movie->title }}</h5>
            </div>
            <div class="card-body">
                <p class="card-text">{{ $review->content }}</p>
            </div>
        </div>
    @empty
        <div class="p-3">No reviews found.</div>
    @endforelse
@endsection
