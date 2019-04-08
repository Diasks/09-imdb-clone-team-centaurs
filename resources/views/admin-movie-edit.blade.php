
@extends('layouts.app')


@section('content')

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
        @method('PATCH')
        @csrf
        {{-- <input name="_method" type="hidden" value="PATCH"   >
        <div class="form-group">
          <label for="title">Title:</label>
          <input type="text" class="form-control" name="movie_title" value={{ $movie->title }} >
        </div>
        <div class="form-group">
          <label for="runtime">Runtime :</label>
          <input type="text" class="form-control" name="movie_runtime" value={{ $movie->runtime }} >
        </div>
        <div class="form-group">
          <label for="release">Release Date :</label>
          <input type="text" class="form-control" name="movie_release" value={{ $movie->release_date }} >
        </div>
        <div class="form-group">
          <label for="genre">Genres :</label>
          <input type="text" class="form-control" name="movie_genres" value={{ json_encode($movie->genres, true) }} >
        </div>
        <div class="form-group">
          <label for="status">Status:</label>
          <input type="text" class="form-control" name="movie_status" value={{ $movie->status}} >
        </div>
        <div class="form-group">
          <label for="tagline">Tagline:</label>
          <input type="text" class="form-control" name="movie_tagline" value={{ $movie->tagline }} >
        </div>
        <div class="form-group">
          <label for="overview">Overview:</label>
          <input type="text" class="form-control" name="movie_overview" value={{ $movie->overview }} >
        </div> --}}

        <div class="form-group">
            @csrf
            <label for="title">Title</label>
        <input type="text" class="form-control" name="movie_title" value={{ $movie->title}}>
        </div>
        <div class="form-group">
            <label for="genres">Genres:</label>
            <input type="text" class="form-control" name="movie_genres" value={{ json_encode($movie->genres, true) }}>
        </div>
        <div class="form-group">
            <label for="runtime">Runtime :</label>
            <input type="text" class="form-control" name="movie_runtime" value={{ $movie->runtime}} >
        </div>
        <div class="form-group">
            <label for="release_date">Release:</label>
            <input type="text" class="form-control" name="movie_release" value={{ $movie->release_date}} >
        </div>
        <div class="form-group">
            <label for="adult">Adult:</label>
            <input type="text" class="form-control" name="movie_adult" value={{ $movie->adult}} >
        </div>


        <div class="form-group">
            <label for="revenue">Revenue:</label>
            <input type="text" class="form-control" name="movie_revenue" value={{ $movie->revenue}} >
        </div>
        <div class="form-group">
            <label for="budget">Budget:</label>
            <input type="text" class="form-control" name="movie_budget" value={{ $movie->budget}} >
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <input type="text" class="form-control" name="movie_status" value={{ $movie->status}} >
        </div>
        <div class="form-group">
            <label for="tagline">Tagline:</label>
            <input type="text" class="form-control" name="movie_tagline" value={{ $movie->tagline}} >
        </div>
        <div class="form-group">
            <label for="poster">Poster path:</label>
            <input type="text" class="form-control" name="movie_poster" value={{ $movie->poster_path}} >
        </div>
        <div class="form-group">
            <label for="backdrop">Backdrop path:</label>
            <input type="text" class="form-control" name="movie_backdrop" value={{ $movie->backdrop_path}} >
        </div>
        <div class="form-group">
            <label for="video">Video:</label>
            <input type="text" class="form-control" name="movie_video" value={{ $movie->video}} >
        </div>


        <div class="form-group">
            <label for="vote_count">Vote count:</label>
            <input type="text" class="form-control" name="movie_vote" value={{ $movie->vote_count}} />
        </div>

        <div class="form-group">
            <label for="vote_average">Vote average:</label>
            <input type="text" class="form-control" name="movie_average" value={{ $movie->vote_average}} />
        </div>

        <div class="form-group">
            <label for="production_companies">Production companies:</label>
            <input type="text" class="form-control" name="movie_production" value={{ json_encode($movie->production_companies, true)}} />
        </div>


        <div class="form-group">
            <label for="cast">Cast :</label>

            <textarea type="text" class="form-control" rows="10" name="movie_cast" >{{ json_encode($movie->cast, true)}}
            </textarea>
        </div>

        <div class="form-group">
            <label for="crew">Crew :</label>
            <textarea type="text" class="form-control" rows="10" name="movie_crew"  >{{ json_encode($movie->crew, true)}}
            </textarea>
        </div>

        <div class="form-group">
            <label for="overview">Overview:</label>
            <textarea type="text" class="form-control" name="movie_overview" >{{ $movie->overview}} </textarea>
        </div>



        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection

