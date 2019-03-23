@extends('layouts.app')

@section('content')

<div class="jumbotron jumbotron-fluid  bg-info">
  <div class="container">


    <h1 class="display-4">{{$movie->title}}</h1>
    <img src="http://image.tmdb.org/t/p/w185//{{$movie->poster_path}}"/>
    <div>
    <a href="/movie/{{$movie->id}}/reviews" class="badge badge-dark">Reviews</a>
<a href="/movie/{{$movie->id}}/photos" class="badge badge-dark">Photos</a>
<a href="/movie/{{$movie->id}}/trailers" class="badge badge-dark">Trailers</a>
</div>
    <p class="lead"> {{$movie->overview}}   </p>


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

  </div>
</div>













@endsection