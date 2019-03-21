@extends('layouts.app')
       

    
@section('content')  



               <div class="jumbotron jumbotron-fluid bg-info">
  <div class="container">
    <h1 class="display-4">FEATURED MOVIES</h1>
    @foreach ($movies as $movie)

    <a href="/movie/{{$movie->id}}"> 
    <img src="http://image.tmdb.org/t/p/w185//{{$movie->poster_path}}" class="shadow p-3 mb-5 bg-white rounded"/>
 
    </a> 

    @endforeach
  </div>
</div>
      
     


  <h2>LATEST REVIEWS</h2>
 
   @foreach ($reviews as $review)
   <div class="card">
  <div class="card-header">
  <h5>User:  {{$review->author}}</h5>
  </div>
  <div class="card-body">
    <p class="card-text"> <p> {{$review->content}}</p>
  </div>
</div>
@endforeach
 


    @endsection

  





