@extends('layouts.app', ['container' => false])

@section('content')
    <div class="container text-center">
        <h1 class="main-heading mb-5">Photos - {{$images->title}}</h1>
    </div>
    <div class="containerPhotos"> 
        @forelse(array_merge($imageData['backdrops'], $imageData['posters']) as $images)
            <img class="photos" width="320" height="240" controls src="{{ 'http://image.tmdb.org/t/p/original/' .$images['file_path'] }}">
        @empty
            <h2> No photos were found for this movie </h2>
        @endforelse
    </div>
@endsection
