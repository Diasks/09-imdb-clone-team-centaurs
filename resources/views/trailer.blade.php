

@extends('layouts.app')
@section('content')





<div class="jumbotron jumbotron-fluid bg-info">
  <div class="container">
    <h1 class="display-4">Trailer for: {{$trailers->first()->title}}</h1>
    @if (($trailers->first()->video) > 0)
    <video width="320" height="240" controls >
<source src={{ $trailers->first()->video }} type="video/mp4">
</video>
@else 

<h2>No trailer availabe for this movie!</h2>

@endif

  </div>
  <a href="/movie/{{$trailers->first()->id}}"><button class="btn btn-dark">Go back</button></a>

</div>

@endsection