

@extends('layouts.app')
@section('content')


'http://youtube.com/watch?v=' 


<div class="jumbotron jumbotron-fluid bg-info">
  <div class="container">
    <h1 class="display-4">Trailer for: {{$trailers->first()->title}}</h1>
    @foreach($trailerData['results'] as $trailer)
    <iframe width="320" height="240" controls
 src="{{ 'http://youtube.com/embed/'.$trailer['key'] }}" type="video/mp4">
</iframe>
@endforeach
 






  </div>
  <a href="/movie/{{$trailers->first()->id}}"><button class="btn btn-dark">Go back</button></a>

</div>

@endsection