@extends('layouts.app')

@section('content')
    <div class="create-review-container">
        <h1>{{ $movie->title }}</h1>
        <form action="/movie/{{ $movie->id }}/reviews" method="POST">
            @method('POST')
            @csrf
            <input type="hidden" name="movie_id" value="{{ $movie->id }}"/>
            <textarea name="content" cols="30" rows="10" class="form-control"
                      placeholder="Write your review here"></textarea>
            <button class="btn btn-dark mt-3">Post</button>
        </form>
    </div>
@endsection
