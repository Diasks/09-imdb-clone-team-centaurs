@extends('layouts.app')

@section('content')
    <div class="card">
        @if ($listExists)
            <h2 class="card-header">{{ $list->name }} by {{ $user->name }}</h2>
            <div class="card-body p-0">
                <div class="list-group list-group-flush bg-light">
                    @forelse ($movies as $movie)
                        <a class="list-group-item list-group-item-action h5" href="/movie/{{ $movie['id'] }}">
                            <img src="http://image.tmdb.org/t/p/w185/{{ $movie['poster_path'] }}" class="col-1" />
                            {{ $movie['title'] }}
                        </a>
                    @empty
                        <div>List is empty.</div>
                    @endforelse
                </div>
            </div>
        @else
            <h2 class="card-header">This list does not exist.</h2>
        @endif
    </div>
@endsection
