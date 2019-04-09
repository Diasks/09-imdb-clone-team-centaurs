

@extends('layouts.app', ['container' => false])
@section('content')


<<<<<<< HEAD


<div class="headerTextContainer">
=======



<div class="jumbotron jumbotron-fluid bg-info">
  <div class="container">
    <h1 class="display-4">Trailer for: {{$trailers->title}}</h1>
    @forelse($trailerData['results'] as $trailer)
    <iframe width="320" height="240" controls
 src="{{ 'http://youtube.com/embed/'.$trailer['key'] }}" type="video/mp4">
</iframe>
@empty
<h2> No trailers were found for this movie </h2>
@endforelse
 
>>>>>>> develop

<h1>Trailer {{$trailers->title}}</h1>

</div>
<div class="movie-trailers-container">
   
   @forelse($trailerData['results'] as $trailer)
   <iframe width="100%" height="200" controls
src="{{ 'http://youtube.com/embed/'.$trailer['key'] }}" type="video/mp4">
</iframe>
@empty
<h2> No trailers were found for this movie </h2>
@endforelse

</div>



<div class="headerTextContainer">
<a href="/movie/{{$trailers->first()->id}}"><button class="btn btn-dark">Go back</button></a>

</div>  

@endsection