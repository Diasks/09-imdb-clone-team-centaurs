@extends('layouts.app')

@section('content')

<img src="http://image.tmdb.org/t/p/w185//{{$movie->poster_path}}"/>
<h1>{{$movie->title}}</h1>
<p>Speltid: {{$movie->runtime}} minuter</p>
<p>Release date: {{$movie->release_date}}</p>






@foreach ($movie->cast as $casts)
<p>{{$casts['name']}}</p>
@endforeach



@foreach ($movie->genres as $genre)

<p>{{$genre['name']}}</p>

@endforeach 

<a href="/movie/{{$movie->id}}/reviews">Reviews</a>
<a href="/movie/{{$movie->id}}/photos">Photos</a>
<a href="/movie/{{$movie->id}}/trailers">Trailers</a>
@endsection