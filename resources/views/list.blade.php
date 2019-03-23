@extends('layouts.app')

@section('content')
    <div class="card">
        @if ($listExists)
            <h2 class="card-header">{{ $list->name }} <small>by {{ $user->name }}</small></h2>
            <div class="card-body p-0">
                <div class="list-group list-group-flush bg-light">
                    @forelse ($movies as $movie)
                        <div class="list-group-item list-group-item-action d-flex justify-content-between py-0 h5">
                            <a class="text-dark col py-2" href="/movie/{{ $movie['id'] }}">
                                <img src="http://image.tmdb.org/t/p/w185/{{ $movie['poster_path'] }}" class="col-1" />
                                {{ $movie['title'] }}
                            </a>
                            @if ($isUserOwner)
                                <div class="d-flex flex-column justify-content-around">
                                    <form action="" method="POST">
                                        @method('PATCH')
                                        @csrf
                                        <input type="hidden" name="action" value="remove" />
                                        <input type="hidden" name="movie_id" value="{{ $movie['id'] }}" />
                                        <button class="btn btn-danger">X</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    @empty
                        <div class="p-3">List is empty.</div>
                    @endforelse
                </div>
            </div>
        @else
            <h2 class="card-header">This list does not exist.</h2>
        @endif
    </div>
@endsection
