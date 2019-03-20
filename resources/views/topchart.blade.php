@extends('layouts.app')
@section('content')
<h1>TOP-CHART</h1>

@foreach ($movies as $topmovie)
<a href="/movie/{{$topmovie->id}}"> 
    <img src="http://image.tmdb.org/t/p/w185//{{$topmovie->poster_path}}"/>
    </a>
@endforeach
@endsection