@extends('layouts.app', ['container' => false])

@section('content')
    <div class="movie-bg"></div>
    <div class="movie-wrapper">
        <div class="movie-backdrop-container w-100">
            <img src="http://image.tmdb.org/t/p/original/{{ $movie->backdrop_path }}" class="w-100 movie-backdrop"/>
        </div>
        <div>
            <div class="container col-12 col-sm-12 col-md-10 col-lg-8 movie-details p-4">
                <div class="movie-head-info">
                    <img src="http://image.tmdb.org/t/p/w185/{{ $movie->poster_path }}" class="movie-poster"/>

                    <div class="movie-head-info-text">
                        <div>
                            <h1 class="movie-title">{{ $movie->title }}</h1>
                            <div class="pt-2">
                                <a href="/movie/{{$movie->id}}/reviews" class="badge badge-dark">Reviews</a>
                                <a href="/movie/{{$movie->id}}/photos" class="badge badge-dark">Photos</a>
                                <a href="/movie/{{$movie->id}}/trailers" class="badge badge-dark">Trailers</a>
                            </div>
                        </div>
                        <p class="lead mt-3">{{$movie->overview}}</p>
                    </div>
                </div>
                <p class="movie-mobile-overview">{{$movie->overview}}</p>
                <div class="my-3">
                    <a href="/movie/{{ $movie->id }}/reviews/create" class="btn btn-dark">Write a review...</a>
                    @if ($lists)
                        <button class="btn btn-dark dropdown-toggle ml-3" id="listDropdownButton"
                                data-toggle="dropdown">Add to list
                        </button>
                        <div class="dropdown-menu" aria-labelledby="listDropdownButton">
                            @forelse ($lists as $list)
                                <form action="/user/{{ $user->id }}/lists/{{ $list->id }}" method="POST">
                                    @method('PATCH')
                                    @csrf
                                    <input type="hidden" name="action" value="add"/>
                                    <input type="hidden" name="movie_id" value="{{ $movie->id }}"/>
                                    <div class="input-group">
                                        <button class="dropdown-item">{{ $list->name }}</button>
                                    </div>
                                </form>
                            @empty
                                <div class="dropdown-item">You don't have any lists</div>
                            @endforelse
                        </div>
                    @endif
                </div>
                <div>
                </div>

                <p>Rating: <i class="fa fa-star" aria-hidden="true"></i> {{$movie->vote_average}}</p>
                <p>Runtime: {{$movie->runtime}} minutes</p>
                <p>Release date: {{$movie->release_date}}</p>

                <p>Genre: @foreach ($movie->genres as $genre) {{$genre['name']}}
                    @endforeach </p>
                <p>Production Company: @foreach ($movie->production_companies as $production)
                        {{$production['name']}}
                    @endforeach</p>

                <h2 class="movie-sub-title">Top Billed Cast</h2>
                <div class="cast-list">
                    @foreach (array_slice($movie->cast, 0, 5) as $person)
                        <div class="cast-list-item">
                            <div class="cast-list-item-image-container">
                                @if ($person['profile_path'] != '')
                                    <img class="cast-list-item-image"
                                         src="http://image.tmdb.org/t/p/w185/{{ $person['profile_path'] }}"/>
                                @else
                                    <img class="cast-list-item-image" src="{{ asset('images/unknown.jpg') }}"/>
                                @endif
                            </div>
                            <div class="cast-list-item-info">
                                <h3 class="cast-list-item-name">{{ $person['name'] }}</h3>
                                <div class="cast-list-item-character">{{ $person['character'] }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <button class="btn btn-dark" type="button" data-toggle="collapse" data-target="#collapseExample2"
                        aria-expanded="false" aria-controls="collapseExample">
                    Crew
                </button>
                <div class="collapse" id="collapseExample2">
                    <div class="card card-body">
                        @foreach ($movie->crew as $crews)
                            <p> {{$crews['job']}}: {{$crews['name']}} <p>
                        @endforeach
                    </div>
                </div>
            </div>
@endsection
