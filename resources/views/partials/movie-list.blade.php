@if (count($movies) === 0)
    <p>No movies found.</p>
@elseif (count($movies) >= 1)
    <div class="movie-list-container">
        @foreach($movies as $movie)
            <a href="/movie/{{ $movie->id }}" class="movie-list-item" title="{{ $movie->title }}">
                <img src="http://image.tmdb.org/t/p/original/{{ $movie->poster_path }}" class="movie-list-item-poster"/>
                <img src="http://image.tmdb.org/t/p/original/{{ $movie->backdrop_path }}"
                     class="movie-list-item-backdrop"/>
                <div class="movie-list-item-info">
                    <h2>{{ $movie->title }}</h2>
                    <div class="genre-box">
                        {{ join(', ', array_map(function($g) {
                            return $g['name'];
                        }, $movie->genres)) }}
                    </div>
                    <div class="movie-list-item-rating">
                        <div>
                            <span class="fa fa-star" aria-hidden="true"></span>
                            {{ $movie->vote_average }}
                        </div>
                        <div class="date-container">
                            {{ explode("-", $movie->release_date)[0] }}
                        </div>
                    </div>
                </div>
            </a>
        @endforeach

    </div>
@endif

<div class="paginator flex-wrap">
    {{$movies->appends(request()->input())->links()}}
</div>
