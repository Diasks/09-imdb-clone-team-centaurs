
@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
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
    <form action="{{ action('MovieController@create')}}" method="post">
          <div class="form-group">
              @csrf
              <label for="title">Title</label>
              <input type="text" class="form-control" name="movie_title"/>
          </div>
          <div class="form-group">
              <label for="genres">Genres:</label>
              <input type="text" class="form-control" name="movie_genres"/>
          </div>
          <div class="form-group">
              <label for="runtime">Runtime :</label>
              <input type="text" class="form-control" name="movie_runtime"/>
          </div>
          <div class="form-group">
              <label for="release_date">Release:</label>
              <input type="text" class="form-control" name="movie_release"/>
          </div>
          <div class="form-group">
              <label for="adult">Adult:</label>
              <input type="text" class="form-control" name="movie_adult"/>
          </div>


          <div class="form-group">
              <label for="revenue">Revenue:</label>
              <input type="text" class="form-control" name="movie_revenue"/>
          </div>
          <div class="form-group">
              <label for="budget">Budget:</label>
              <input type="text" class="form-control" name="movie_budget"/>
          </div>
          <div class="form-group">
              <label for="status">Status:</label>
              <input type="text" class="form-control" name="movie_status"/>
          </div>
          <div class="form-group">
              <label for="tagline">Tagline:</label>
              <input type="text" class="form-control" name="movie_tagline"/>
          </div>
          <div class="form-group">
              <label for="poster">Poster path:</label>
              <input type="text" class="form-control" name="movie_poster"/>
          </div>
          <div class="form-group">
              <label for="backdrop">Backdrop path:</label>
              <input type="text" class="form-control" name="movie_backdrop"/>
          </div>
          <div class="form-group">
              <label for="video">Video:</label>
              <input type="text" class="form-control" name="movie_video"/>
          </div>


          <div class="form-group">
              <label for="vote_count">Vote count:</label>
              <input type="text" class="form-control" name="movie_vote"/>
          </div>

          <div class="form-group">
              <label for="vote_average">Vote average:</label>
              <input type="text" class="form-control" name="movie_average"/>
          </div>

          <div class="form-group">
              <label for="production_companies">Production companies:</label>
              <input type="text" class="form-control" name="movie_production"/>
          </div>


          <div class="form-group">
              <label for="cast">Cast :</label>
              <input type="text" class="form-control" name="movie_cast"/>
          </div>

          <div class="form-group">
              <label for="crew">Crew :</label>
              <input type="text" class="form-control" name="movie_crew"/>
          </div>

          <div class="form-group">
              <label for="overview">Overview:</label>
              <input type="text" class="form-control" name="movie_overview"/>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection