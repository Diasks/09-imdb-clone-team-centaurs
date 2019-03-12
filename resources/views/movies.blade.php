@extends('layouts.app')



@section('content')
<img src="http://image.tmdb.org/t/p/w185//{{$movie->poster_path}}"/>
<h1>{{$movie->title}}</h1>
<p>Speltid: {{$movie->runtime}} minuter</p>
<p>Release date: {{$movie->release_date}}</p>




<a href="/movie/{{$movie->id}}/reviews">Reviews</a>
<a href="/movie/{{$movie->id}}/photos">Photos</a>
<a href="/movie/{{$movie->id}}/trailers">Trailers</a>


@endsection