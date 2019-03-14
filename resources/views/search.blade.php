@extends('layouts.app')

@section('content')

@if (count($movie) === 0)
<h2>... No movie found</h2>
@elseif (count($movie) >= 1)
<div class="container">
    @foreach($movie as $mov)
    <a href="/movie/{{$mov->id}}"> 
    <img src="http://image.tmdb.org/t/p/w185//{{$mov->poster_path}}"/>
    </a>
    @endforeach
    </div>
@endif

{{$movie->render()}}




               
                   
                  
@endsection

             

             
   