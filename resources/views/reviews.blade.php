@extends('layouts.app')

@section('content')
    <h1>Reviews for {{$movie->title}}</h1>    

    @forelse ($reviews as $review)
        <div class="card mb-3">
            <div class="card-header">
                <h5>User: {{ $review->author ? $review->author : $review->user->name }}</h5>
            </div>
            <div class="card-body">
                <p class="card-text">{{$review->content}}</p>
            </div>
        </div>
    @empty
        <h2>No reviews found for this movie</h2>
    @endforelse

    <a href="/movie/{{$movie->id}}"><button class="btn btn-dark">Go back</button></a>
@endsection
