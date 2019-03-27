@extends('layouts.app')

@section('content')
    <div class="jumbotron jumbotron-fluid  bg-info">
        <div class="container">
            <h1 class="display-4">{{$movie->title}}</h1>
            <img src="http://image.tmdb.org/t/p/w185//{{$movie->poster_path}}"/>   

            @if ($lists)
                <button class="btn btn-dark dropdown-toggle ml-3" id="listDropdownButton" data-toggle="dropdown">Add to list</button>
                <div class="dropdown-menu" aria-labelledby="listDropdownButton">
                    @forelse ($lists as $list)
                        <form action="/user/{{ $user->id }}/lists/{{ $list->id }}" method="POST">
                            @method('PATCH')
                            @csrf
                            <input type="hidden" name="action" value="add" />
                            <input type="hidden" name="movie_id" value="{{ $movie->id }}" />
                            <div class="input-group">
                                <button class="dropdown-item">{{ $list->name }}</button>
                            </div>
                        </form>
                    @empty
                        <div class="dropdown-item">You don't have any lists</div>
                    @endforelse
                </div>
            @endif
        <div>
        <a href="/movie/{{$movie->id}}/reviews" class="badge badge-dark">Reviews</a>
        <a href="/movie/{{$movie->id}}/photos" class="badge badge-dark">Photos</a>
        <a href="/movie/{{$movie->id}}/trailers" class="badge badge-dark">Trailers</a>
    </div>

    <p class="lead"> {{$movie->overview}}   </p>
<p>Rating: <i class="fa fa-star" aria-hidden="true"></i>{{$movie->vote_average}}</p>
    <p>Runtime: {{$movie->runtime}} minuter</p>
    <p>Release date: {{$movie->release_date}}</p>
    @foreach ($movie->genres as $genre)
    <p>Genre: {{$genre['name']}}</p>
    @endforeach 
    <p>Production Company: @foreach ($movie->production_companies as $production)
    {{$production['name']}} 
    @endforeach</p>

    <button class="btn btn-dark" type="button" data-toggle="collapse" data-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample">
        Actors
    </button>
    <div class="collapse" id="collapseExample1">
        <div class="card card-body">
            @foreach ($movie->cast as $casts)
                <p>Character: {{$casts['character']}} Played by: {{$casts['name']}}</p>
            @endforeach
        </div>
    </div>

    <button class="btn btn-dark" type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
        Crew
    </button>
    <div class="collapse" id="collapseExample2">
        <div class="card card-body">
            @foreach ($movie->crew as $crews)
            <p> {{$crews['job']}}: {{$crews['name']}} <p> 
            @endforeach
        </div>
    </div>
@endsection
