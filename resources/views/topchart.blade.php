@extends('layouts.app')
@section('content')





<div class="jumbotron jumbotron-fluid bg-info">
  <div class="container">
    <h1 class="display-4">TOP-CHART</h1>
    @foreach ($movies as $topmovie)
<a href="/movie/{{$topmovie->id}}"> 
    <img src="http://image.tmdb.org/t/p/w185//{{$topmovie->poster_path}}" class="shadow p-3 mb-5 bg-white rounded"/>
    </a>
@endforeach
<a href="/"><button class="btn btn-dark">Go back</button></a>
  </div>
</div>

@endsection