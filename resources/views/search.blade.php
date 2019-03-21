@extends('layouts.app')

@section('content')

@if (count($movie) === 0)
<h2>... No movie found</h2>
@elseif (count($movie) >= 1)

<div class="jumbotron jumbotron-fluid bg-info">
<div class="container">
    @foreach($movie as $mov)
    <a href="/movie/{{$mov->id}}"> 
    <img src="http://image.tmdb.org/t/p/w185//{{$mov->poster_path}}" class="shadow p-3 mb-5 bg-white rounded"/>
    </a>
    @endforeach
    </div>
    </div>
@endif

{{$movie->render()}}

      
                  
@endsection

             

             
   