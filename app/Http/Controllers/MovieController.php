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
use \Exception;

class MovieController extends Controller
{
    private $genreProps = [
        'id',
        'name'
    ];

    private $productionCompaniesProps = [
        'id',
        'logo_path',
        'name',
        'origin_country'
    ];

    private $castProps = [
        'cast_id',
        'character',
        'credit_id',
        'gender',
        'id',
        'name',
        'order',
        'profile_path'
    ];

    private $crewProps = [
        'credit_id',
        'department',
        'gender',
        'id',
        'job',
        'name',
        'profile_path'
    ];
    
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
        $client = new Client();
        $res = $client->request('GET', 'https://api.themoviedb.org/3/movie/' . $trailers->id.'/videos' . '?api_key=d21c743d52e4de7178e9b0e0d115e1c1&language=en-US' );
        $trailerData = json_decode($res->getBody(), true);
        return view('trailer', compact('trailers', 'trailerData'));
    }

    /*implementera funktion för att visa specifik films foto/n i photo.blade.php som inte finns än */
    public function showPhoto($id) 
    {
        $images = Movie::where('id', '=', $id)
        ->first();
        $client = new Client();
        $res = $client->request('GET', 'https://api.themoviedb.org/3/movie/' . $images->id.'/images' . '?api_key=d21c743d52e4de7178e9b0e0d115e1c1&language=en-US&include_image_language=en,null' );
        $imageData = json_decode($res->getBody(), true);
        return view('photo', compact('images', 'imageData'));
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
        try {
            $params = $request->all();
                
            $parsedGenres = $this->parseGenres($request->genres);
            
            $params['genres'] = $parsedGenres;
            
            $request->replace($params);
            
            if(!$this->isMovieValid($request)) {
                throw new Exception();
            }

            $params['genres'] = json_decode($params['genres']);
            $params['production_companies'] = json_decode($params['production_companies']);
            $params['cast'] = json_decode($params['cast']);
            $params['crew'] = json_decode($params['crew']);

            $request->replace($params);
            
            $movie = new Movie($request->all());
    
            $movie->save();
        } catch(Exception $e) {
            return redirect()->back()->with('error', 'Invalid input');
        }

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
        
        return view('admin-movie-edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $params = $request->all();
            
            $parsedGenres = $this->parseGenres($request->genres);
            
            $params['genres'] = $parsedGenres;
            $params['production_companies'] = $params['production_companies'];
            $params['cast'] = $params['cast'];
            $params['crew'] = $params['crew'];
            
            $request->replace($params);
            
            if(!$this->isMovieValid($request)) {
                throw new Exception();
            }
        
            $movie = Movie::find($id);
            $movie->title = $request->title;
            $movie->genres = json_decode($request->genres);
            $movie->runtime = $request->runtime;
            $movie->release_date = $request->release_date;
            $movie->adult = $request->adult;
            $movie->revenue = $request->revenue;
            $movie->budget = $request->budget;
            $movie->status = $request->status;
            $movie->tagline = $request->tagline;
            $movie->poster_path = $request->poster_path;
            $movie->backdrop_path = $request->backdrop_path;
            $movie->video = $request->video;
            $movie->vote_count = $request->vote_count;
            $movie->vote_average = $request->vote_average;
            $movie->production_companies = json_decode($request->production_companies);
            $movie->cast = json_decode($request->cast);
            $movie->crew = json_decode($request->crew);
            $movie->overview = $request->overview;
            
            $movie->save();
        } catch(Exception $e) {
            return redirect()->back()->with('error', 'Invalid input');
        }

        return redirect('/admin/movies')->with('success', 'Movie has been updated!');
    }

    public function get()
    {
        $allMovies = Movie::orderBy('release_date', 'desc')
            ->paginate(36);

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

    private function isJson($string) {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }

    private function listHasProps($objList, $props) {
        foreach($objList as $obj) {
            foreach($props as $prop) {
                if(!property_exists($obj, $prop)) {
                    return false;
                }
            }
        }

        return true;
    }

    private function isMovieValid($request) {
        $request->validate([
            'title' => 'required',
            'genres' => 'required',
            'runtime' => 'required',
            'release_date' => 'required',
            'adult' => 'required',
            'revenue' => 'required',
            'budget' => 'required',
            'status' => 'required',
            'tagline' => 'required',
            'poster_path' => 'required',
            'backdrop_path' => 'required',
            'video' => 'required',
            'vote_count' => 'required',
            'vote_average' => 'required',
            'production_companies' => 'required|json',
            'cast' => 'required|json',
            'crew' => 'required|json',
            'overview' => 'required'
        ]);

        try {
            if(!$this->listHasProps(json_decode($request->genres), $this->genreProps) ||
                !$this->listHasProps(json_decode($request->production_companies), $this->productionCompaniesProps) ||
                !$this->listHasProps(json_decode($request->cast), $this->castProps) ||
                !$this->listHasProps(json_decode($request->crew), $this->crewProps)
            ) {
                throw new Exception();
            }
        } catch(Exception $e) {
            return false;
        }

        return true;
    }

    private function parseGenres($genres) {
        $newGenres = array_map(function($g) {
            return json_decode($g);
        }, array_keys($genres));

        return stripslashes(json_encode($newGenres));
    }
}
