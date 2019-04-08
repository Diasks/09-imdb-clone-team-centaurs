

@extends('layouts.app')
@section('content')





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
 






  </div>
  <a href="/movie/{{$trailers->first()->id}}"><button class="btn btn-dark">Go back</button></a>

</div>

@endsection