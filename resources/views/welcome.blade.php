@extends('layouts.app')
       

    
@section('content')  
<div class="links">
                  
                   <a href="https://laracasts.com">Laracasts</a>
                   <a href="https://laravel-news.com">News</a>
                   <a href="https://forge.laravel.com">Forge</a>
                   <a href="https://github.com/laravel/laravel">GitHub</a>
               </div>

       <h1>FEATURED MOVIES</h1>
        @foreach ($movies as $movie)
    <a href="/movie/{{$movie->id}}"> 
    <img src="http://image.tmdb.org/t/p/w185//{{$movie->poster_path}}"/>
    </a>

    @endforeach
  
   
    @foreach ($reviews as $review)
   
   <h2> {{$review->author}}</h2>
   <p> {{$review->content}}</p>
   
    @endforeach


    @endsection

  





