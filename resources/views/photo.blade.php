@extends('layouts.app', ['container' => false])
@section('content')



    <h1 class="display-4">Photos for: {{$images->title}}</h1>
    <div class="containerPhotos">

        @forelse(array_merge($imageData['backdrops'], $imageData['posters']) as $images)
            <img class="photos" width="320" height="240" controls
                 src="{{ 'http://image.tmdb.org/t/p/original/' .$images['file_path'] }}">
        @empty
            <h2> No photos were found for this movie </h2>
        @endforelse

    </div>








@endsection

