
@extends('layouts.app')
@section('content')





<div class="jumbotron jumbotron-fluid bg-info">
  <div class="container">
    <h1 class="display-4">Photos from movie</h1>
    @if (count($photos) === 0)
    <h2>... No photos found</h2>

    @elseif (count($photos) >= 1)
    @foreach ($photos as $photo)

<img src="http://image.tmdb.org/t/p/w185//{{$photo->backdrop_path}}" alt="photo from movie" class="shadow p-3 mb-5 bg-white rounded">
    
@endforeach

  </div>
  <a href="/movie/{{$photo->id}}"><button class="btn btn-dark">Go back</button></a>

</div>
@endif
@endsection