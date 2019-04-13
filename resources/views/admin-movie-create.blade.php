
@extends('layouts.app')

@section('content')
    <div class="card uper">
        <div class="card-header">
            Add New Movie
        </div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
            @endif
            <form action="{{ action('MovieController@store')}}" method="post">
                @method('POST')
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                <input type="text" class="form-control" name="title">
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
                                        <input type="checkbox" name="genres[{{ json_encode($genre, true) }}]"> {{ $genre['name'] }}
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="form-group">
                    <label for="runtime">Runtime</label>
                    <input type="text" class="form-control" name="runtime">
                </div>
                <div class="form-group">
                    <label for="release_date">Release</label>
                    <input type="text" class="form-control" name="release_date">
                </div>
                <div class="form-group">
                    <label for="adult">Adult</label>
                    <input type="text" class="form-control" name="adult">
                </div>


                <div class="form-group">
                    <label for="revenue">Revenue</label>
                    <input type="text" class="form-control" name="revenue">
                </div>
                <div class="form-group">
                    <label for="budget">Budget</label>
                    <input type="text" class="form-control" name="budget">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" class="form-control" name="status">
                </div>
                <div class="form-group">
                    <label for="tagline">Tagline</label>
                    <input type="text" class="form-control" name="tagline">
                </div>
                <div class="form-group">
                    <label for="poster">Poster path</label>
                    <input type="text" class="form-control" name="poster_path">
                </div>
                <div class="form-group">
                    <label for="backdrop">Backdrop path</label>
                    <input type="text" class="form-control" name="backdrop_path">
                </div>
                <div class="form-group">
                    <label for="video">Video</label>
                    <input type="text" class="form-control" name="video">
                </div>


                <div class="form-group">
                    <label for="vote_count">Vote count</label>
                    <input type="text" class="form-control" name="vote_count">
                </div>

                <div class="form-group">
                    <label for="vote_average">Vote average</label>
                    <input type="text" class="form-control" name="vote_average">
                </div>

                <div class="form-group">
                    <label for="production_companies">Production companies</label>
                    <input type="text" class="form-control" name="production_companies">
                </div>


                <div class="form-group">
                    <label for="cast">Cast</label>
                    <textarea type="text" class="form-control" rows="10" name="cast"></textarea>
                </div>

                <div class="form-group">
                    <label for="crew">Crew</label>
                    <textarea type="text" class="form-control" rows="10" name="crew"></textarea>
                </div>

                <div class="form-group">
                    <label for="overview">Overview</label>
                    <textarea type="text" class="form-control" name="overview"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
@endsection
