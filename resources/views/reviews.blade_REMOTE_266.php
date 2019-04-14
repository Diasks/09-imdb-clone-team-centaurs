@extends('layouts.app')

@section('content')


<h1>Reviews for {{$movie->title}}</h1>
@if (count($reviews) === 0)
<h2> No reviews found for this movie</h2>
@elseif (count($reviews) >= 1)


@foreach ($reviews as $review)
<div class="card">
    <div class="card-header">
        <h5>User: {{$review->author}}</h5>
    </div>
    <div class="card-body">
        <p class="card-text">
        <p> {{$review->content}}</p>
    </div>
</div>
@endforeach
@endif
<a href="/movie/{{$movie->id}}">
    <button class="btn btn-dark">Go back</button>
</a>


@endsection




