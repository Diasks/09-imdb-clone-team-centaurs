@extends('layouts.app')

@section('content')

@forelse ($reviews as $review)
    <div class="card mb-3">
        <div class="card-header">
            <h5>Movie: {{ $review->movie->title }}</h5>
            <h5>User: {{ $review->author ? $review->author : $review->user->name }}</h5>
        </div>
        <div class="card-body">
            <p class="card-text">{{ $review->content }}</p>
            <button title="Accept" class="btn btn-success">✓</button>
            <button title="Reject" class="btn btn-danger">✕</button>
        </div>
    </div>
@empty
    <div class="dropdown-item">No reviews to audit.</div>
@endforelse

@endsection
