
@extends('layouts.app')


@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Movie
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
    <form action="{{ action('MovieController@update', $movie->id)}}" method="post">
      
    {{csrf_field()}}
        <input name="_method" type="hidden" value="PATCH" />
        <div class="form-group">
          <label for="title">Title:</label>
          <input type="text" class="form-control" name="movie_title" value={{ $movie->movie_title }} />
        </div>
        <div class="form-group">
          <label for="runtime">Runtime :</label>
          <input type="text" class="form-control" name="movie_runtime" value={{ $movie->movie_runtime }} />
        </div>
        <div class="form-group">
          <label for="release">Release Date :</label>
          <input type="text" class="form-control" name="movie_release" value={{ $movie->movie_release }} />
        </div>
        <div class="form-group">
          <label for="genre">Genres :</label>
          <input type="text" class="form-control" name="movie_genre" value={{ $movie->movie_genre }} />
        </div>
        <div class="form-group">
          <label for="status">Status:</label>
          <input type="text" class="form-control" name="movie_status" value={{ $movie->movie_status}} />
        </div>
        <div class="form-group">
          <label for="tagline">Tagline:</label>
          <input type="text" class="form-control" name="movie_tagline" value={{ $movie->movie_tagline }} />
        </div>
        <div class="form-group">
          <label for="overview">Overview:</label>
          <input type="text" class="form-control" name="movie_overview" value={{ $movie->movie_overview }} />
        </div>



        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection

