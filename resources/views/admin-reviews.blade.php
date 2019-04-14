@extends('layouts.app')

@section('content')

    <h1 class="main-heading">AUDIT REVIEWS</h1>

    @forelse ($reviews as $review)
        <div class="card mb-3">
            <div class="card-header">
                <h5>Movie: {{ $review->movie->title }}</h5>
                <h5>User: {{ $review->author ? $review->author : $review->user->name }}</h5>
            </div>
            <div class="card-body">
                <p class="card-text">{{ $review->content }}</p>
                <div class="d-flex">
                    <form action="/admin/reviews/{{ $review->id }}/accept" method="POST">
                        @method('PATCH')
                        @csrf
                        <button title="Accept" class="btn btn-success">✓</button>
                    </form>
                    <form action="/admin/reviews/{{ $review->id }}/reject" method="POST">
                        @method('PATCH')
                        @csrf
                        <button title="Reject" class="btn btn-danger ml-2">✕</button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <p>No reviews to audit.</p>
    @endforelse

@endsection
