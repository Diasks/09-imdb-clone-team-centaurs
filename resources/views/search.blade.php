@extends('layouts.app')

@section('content')
    @if (count($movies) === 0)
        <h2>... No movie found</h2>
    @elseif (count($movies) >= 1)
        <div class="jumbotron jumbotron-fluid bg-info">
            <div class="container">
                @foreach($movies as $movie)
                    <a href="/movie/{{$movie->id}}"> 
                        <img src="http://image.tmdb.org/t/p/w185//{{$movie->poster_path}}" class="shadow p-3 mb-5 bg-white rounded"/>
                    </a>
                @endforeach
            </div>
        </div>
    @endif

    {{$movies->appends(request()->input())->links()}}
@endsection
