@extends('layouts.app')


       


        @section('content')
              
<div class="links">
                  
                   <a href="https://laracasts.com">Laracasts</a>
                   <a href="https://laravel-news.com">News</a>
                   <a href="https://forge.laravel.com">Forge</a>
                   <a href="https://github.com/laravel/laravel">GitHub</a>
               </div>

        <div class="content">
        <h1>FEATURED MOVIES</h1>
        @foreach ($movies as $movie)
    <a href="/movie/{{$movie->id}}"> 
    <img src="http://image.tmdb.org/t/p/w185//{{$movie->poster_path}}"/>
    </a>
    @endforeach


    <h2>REVIEWS SECTION</h2>
    </div>

      


               
    
      

@endsection

