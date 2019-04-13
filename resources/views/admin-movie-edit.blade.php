@extends('layouts.app')

@section('content')
    <div class="card uper">
        <div class="card-header">
            Edit Movie
        </div>
        <div class="card-body">
            <form action="{{ action('MovieController@update', $movie->id) }}" method="post">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                <input type="text" class="form-control" name="title" value="{{ $movie->title }}">
                </div>
                <div class="form-group">
                    <label for="genres">Genres</label>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Select
                        </button>
                        <ul class="dropdown-menu checkbox-menu allow-focus">
                            @foreach ($genreData as $genre)
                                <li>
                                    <label>
                                        <input type="checkbox" name="genres[{{ json_encode($genre, true) }}]" {{ in_array($genre, $movie->genres) ? 'checked' : '' }}> {{ $genre['name'] }}
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="form-group">
                    <label for="runtime">Runtime</label>
                    <input type="text" class="form-control" name="runtime" value="{{ $movie->runtime }}">
                </div>
                <div class="form-group">
                    <label for="release_date">Release</label>
                    <input type="text" class="form-control" name="release_date" value="{{ $movie->release_date }}">
                </div>
                <div class="form-group">
                    <label for="adult">Adult</label>
                    <input type="text" class="form-control" name="adult" value="{{ $movie->adult }}">
                </div>


                <div class="form-group">
                    <label for="revenue">Revenue</label>
                    <input type="text" class="form-control" name="revenue" value="{{ $movie->revenue }}">
                </div>
                <div class="form-group">
                    <label for="budget">Budget</label>
                    <input type="text" class="form-control" name="budget" value="{{ $movie->budget }}">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" class="form-control" name="status" value="{{ $movie->status }}">
                </div>
                <div class="form-group">
                    <label for="tagline">Tagline</label>
                    <input type="text" class="form-control" name="tagline" value="{{ $movie->tagline }}">
                </div>
                <div class="form-group">
                    <label for="poster">Poster path</label>
                    <input type="text" class="form-control" name="poster_path" value="{{ $movie->poster_path }}">
                </div>
                <div class="form-group">
                    <label for="backdrop">Backdrop path</label>
                    <input type="text" class="form-control" name="backdrop_path" value="{{ $movie->backdrop_path }}">
                </div>
                <div class="form-group">
                    <label for="video">Video</label>
                    <input type="text" class="form-control" name="video" value="{{ $movie->video }}">
                </div>


                <div class="form-group">
                    <label for="vote_count">Vote count</label>
                    <input type="text" class="form-control" name="vote_count" value="{{ $movie->vote_count }}">
                </div>

                <div class="form-group">
                    <label for="vote_average">Vote average</label>
                    <input type="text" class="form-control" name="vote_average" value="{{ $movie->vote_average }}">
                </div>

                <div class="form-group">
                    <label for="production_companies">Production companies</label>
                    <input type="text" class="form-control" name="production_companies" value="{{ json_encode($movie->production_companies, true) }}">
                </div>


                <div class="form-group">
                    <label for="cast">Cast</label>
                    <textarea type="text" class="form-control" rows="10" name="cast">{{ json_encode($movie->cast, true) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="crew">Crew</label>
                    <textarea type="text" class="form-control" rows="10" name="crew">{{ json_encode($movie->crew, true) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="overview">Overview</label>
                    <textarea type="text" class="form-control" name="overview">{{ $movie->overview }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
