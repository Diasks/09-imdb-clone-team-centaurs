@extends('layouts.app')

@section('content')
    @if (count($movies) === 0)
        <h2>... No movie found</h2>
    @elseif (count($movies) >= 1)
        <div class="movie-list-container">
            @foreach($movies as $movie)
                <a href="/movie/{{ $movie->id }}" class="movie-list-item" title="{{ $movie->title }}"> 
                    <img src="http://image.tmdb.org/t/p/w185/{{ $movie->poster_path }}" class="movie-list-item-poster" />
                    <img src="http://image.tmdb.org/t/p/original/{{ $movie->backdrop_path }}" class="movie-list-item-backdrop" />
                    <div class="movie-list-item-info">
                        <h2>{{ $movie->title }}</h2>
                        <div class="genre-box">
                            {{ join(', ', array_map(function($g) {
                                return $g['name'];
                            }, $movie->genres)) }}
                        </div>
                        <div class="movie-list-item-rating">
                            <span class="fa fa-star" aria-hidden="true"></span>
                            {{ $movie->vote_average }}
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    @endif

    {{$movies->onEachSide(0)->appends(request()->input())->links()}}
@endsection
