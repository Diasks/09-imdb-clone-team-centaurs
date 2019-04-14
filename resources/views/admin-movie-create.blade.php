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
                    <label for="runtime">Runtime (minutes)</label>
                    <input type="text" class="form-control" name="runtime">
                </div>
                <div class="form-group">
                    <label for="release_date">Release date</label>
                    <input type="text" placeholder="e.g. 2019-01-01" class="form-control" name="release_date">
                </div>
                <div class="form-group">
                    <label for="adult">Adult</label>
                    <input type="text" placeholder="0 or 1" class="form-control" name="adult">
                </div>


                <div class="form-group">
                    <label for="revenue">Revenue (USD)</label>
                    <input type="text" placeholder="e.g. 10000000" class="form-control" name="revenue">
                </div>
                <div class="form-group">
                    <label for="budget">Budget (USD)</label>
                    <input type="text" placeholder="e.g. 10000000" class="form-control" name="budget">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" placeholder="e.g. Released" class="form-control" name="status">
                </div>
                <div class="form-group">
                    <label for="tagline">Tagline</label>
                    <input type="text" class="form-control" name="tagline">
                </div>
                <div class="form-group">
                    <label for="poster">Poster path</label>
                    <input type="text" placeholder="e.g. /nBNZadXqJSdt05SHLqgT0HuC5Gm.jpg" class="form-control" name="poster_path">
                </div>
                <div class="form-group">
                    <label for="backdrop">Backdrop path</label>
                    <input type="text" placeholder="e.g. /xu9zaAevzQ5nnrsXN6JcahLnG4i.jpg" class="form-control" name="backdrop_path">
                </div>
                <div class="form-group">
                    <label for="video">Video</label>
                    <input type="text" placeholder="0 or 1" class="form-control" name="video">
                </div>


                <div class="form-group">
                    <label for="vote_count">Vote count</label>
                    <input type="text" placeholder="e.g. 10000" class="form-control" name="vote_count">
                </div>

                <div class="form-group">
                    <label for="vote_average">Vote average</label>
                    <input type="text" placeholder="e.g. 6.3" class="form-control" name="vote_average">
                </div>

                <div class="form-group">
                    <label for="production_companies">Production companies (JSON)</label>
                    <textarea type="text" placeholder='e.g. [{"id": 923, "logo_path": "/5UQsZrfbfG2dYJbx8DxfoTr2Bvu.png", "name": "Legendary Entertainment", "origin_country": "US"}]' class="form-control" name="production_companies" rows="5"></textarea>
                </div>


                <div class="form-group">
                    <label for="cast">Cast (JSON)</label>
                    <textarea type="text" class="form-control" rows="10" name="cast" placeholder='e.g. [{"cast_id":5,"character":"Prince Dastan","credit_id":"52fe4507c3a36847f80b80e5","gender":2,"id":131,"name":"Jake Gyllenhaal","order":0,"profile_path":"\/rRQVMj5ojWVvpmfqnzzspQ0Wrlh.jpg"}]'></textarea>
                </div>

                <div class="form-group">
                    <label for="crew">Crew (JSON)</label>
                    <textarea type="text" class="form-control" rows="10" name="crew" placeholder='e.g. [{"credit_id":"52fe4507c3a36847f80b80d3","department":"Directing","gender":2,"id":10723,"job":"Director","name":"Mike Newell","profile_path":"\/aE6M4LhrTqtQ8i3WI5QeZAFN4pO.jpg"}]'></textarea>
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
