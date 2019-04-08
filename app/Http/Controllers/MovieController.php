<?php

namespace App\Http\Controllers;
use View;
use Storage;
use App\Models\Movie;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::orderBy('release_date', 'desc')
            ->paginate(36);

        $reviews = Review::all()->take(4);

        return view('welcome', compact('movies', 'reviews'));
    }

    public function topchart() 
    {
        $movies = Movie::where([
            ['vote_average', '>', 8],
            ['vote_count', '>', 500]
        ])
            ->orderBy('vote_average', 'desc')
            ->paginate(36);

        return view('topchart', compact('movies'));
    }

    public function genre(Request $request, $genre) 
    {
        $movies = Movie::where('genres', 'LIKE', '%' . $genre . '%')
            ->orderBy('vote_count', 'desc')
            ->paginate(36);
        
        return view('genre', compact('movies', 'genre'));
    }

    /* implementera funktion för att visa specifik films trailer i trailer.blade.php som inte finns än */
    public function showTrailer($id)
    {
        $trailers = Movie::where('id', '=', $id)
        ->first();
       /* dd($trailers->id);
        $client = new \GuzzleHttp\Client();
        $request = new \GuzzleHttp\Psr7\Request('GET', 'https://api.themoviedb.org/3/movie/'.$trailers->id.'/videos?api_key=d21c743d52e4de7178e9b0e0d115e1c1&language=en-US');
        $promise = $client->sendAsync($request)->then(function ($response) {
            //dd($->getBody());
        });
        $promise->wait();

        $res = $client->request('GET', 'https://api.themoviedb.org/3/movie/'.$trailers->id.'/videos?api_key=d21c743d52e4de7178e9b0e0d115e1c1&language=en-US');
        dd($res->getBody());
        $trailerId = $res->getBody();
        $movieKey = env('MOVIE_API_KEY');*/
        $client = new Client();
        $res = $client->request('GET', 'https://api.themoviedb.org/3/movie/' . $trailers->id.'/videos' . '?api_key=d21c743d52e4de7178e9b0e0d115e1c1&language=en-US' );
        $trailerData = json_decode($res->getBody(), true);
        return view('trailer', compact('trailers', 'trailerData'));
    }

    /*implementera funktion för att visa specifik films foto/n i photo.blade.php som inte finns än */
    public function showPhoto($id) 
    {
        $photos = Movie::all()
        ->where('id', '=', $id)
        ->take(4);

        return view('photo', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-movie-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'movie_title'=>'required',
            'movie_genres'=> 'required',
            'movie_runtime' => 'required|integer',
            'movie_release'=> 'required',
            'movie_adult' => 'required|integer',
            'movie_revenue'=> 'required|integer',
            'movie_budget' => 'required|integer',
            'movie_status'=> 'required',
            'movie_tagline' => 'required',
            'movie_poster'=> 'required',
            'movie_backdrop' => 'required',
            'movie_video'=> 'required',
            'movie_vote' => 'required|integer',
            'movie_average'=> 'required|integer',
            'movie_production' => 'required',
            'movie_cast' => 'required',
            'movie_crew' => 'required', 
            'movie_overview' => 'required'
        ]);
        
        $movie = new Movie([
            'title'=> $validatedData['movie_title'],
            'genres'=> $validatedData['movie_genres'],
            'runtime' => $validatedData['movie_runtime'],
            'release_date'=> $validatedData['movie_release'],
            'adult' => $validatedData['movie_adult'],
            'revenue'=> $validatedData['movie_revenue'],
            'budget' => $validatedData['movie_budget'],
            'status'=> $validatedData['movie_status'],
            'tagline' => $validatedData['movie_tagline'],
            'poster_path'=> $validatedData['movie_poster'],
            'backdrop_path' => $validatedData['movie_backdrop'],
            'video'=> $validatedData['movie_video'],
            'vote_count' => $validatedData['movie_vote'],
            'vote_average'=> $validatedData['movie_average'],
            'production_companies' => $validatedData['movie_production'],
            'cast' => $validatedData['movie_cast'],
            'crew' => $validatedData['movie_crew'],
            'overview' => 'hjhghjgjhg'
        ]);

        $movie->save();
        return redirect('/admin/movies')->with('success', 'Movie has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::findOrFail($id);

        $user = Auth::user();
        
        $lists = null;
        if($user) {
            $lists = $user->movie_lists;
        }

        return view('movies', compact('movie', 'lists', 'user'));
    }


    public function search(Request $request)
    {
        $movie = Movie::all();

        $search = \Request::get('search');  
        $movies = Movie::where('title', 'like', '%' . $search . '%')
            ->orderBy('vote_count', 'desc')
            ->paginate(36);
    
        return view('search', ['movies' => $movies]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::find($id);
        // dd($movie);
        return view('admin-movie-edit', compact('movie'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'movie_title',
            'movie_genres',
            'movie_runtime',
            'movie_release',
            'movie_adult' ,
            'movie_revenue',
            'movie_budget' ,
            'movie_status',
            'movie_tagline' ,
            'movie_poster',
            'movie_backdrop' ,
            'movie_video',
            'movie_vote' ,
            'movie_average',
            'movie_production' ,
            'movie_cast' ,
            'movie_crew' ,
            'movie_overview' 
        ]);
        
        $movie = Movie::find($id);
        $movie->title= $request->get('movie_title');
        $movie->genres = $request->get('movie_genres');
        $movie->runtime = $request->get('movie_runtime');
        $movie->release_date = $request->get('movie_release');
        $movie->adult = $request->get('movie_adult');
        $movie->revenue = $request->get('movie_revenue');
        $movie->budget = $request->get('movie_budget');
        $movie->status = $request->get('movie_status');
        $movie->tagline = $request->get('movie_tagline');
        $movie->poster_path = $request->get('movie_poster');
        $movie->backdrop_path = $request->get('movie_backdrop');
        $movie->video = $request->get('movie_video');
        $movie->vote_count = $request->get('movie_vote');
        $movie->vote_average = $request->get('movie_average');
        $movie->production_companies = $request->get('movie_production');
        $movie->cast = $request->get('movie_cast');
        $movie->crew = $request->get('movie_crew');
        $movie->overview = $request->get('movie_overview');

        $movie->save();
        return redirect('/admin/movies')->with('success', 'Movie has been updated!');
    }

    public function get()
    {
        $allMovies = Movie::all();
        return view('admin-movie', compact('allMovies'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Movie::destroy($id);
        return redirect('admin/movies')->with('success', 'movie was removed successfully');
    }
}
