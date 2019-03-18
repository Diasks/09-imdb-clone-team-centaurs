<?php

namespace App\Http\Controllers;
use View;
use Storage;
use App\Models\Movie;
use Illuminate\Http\Request;
use App\Models\Review;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $movies = Movie::all()->take(8);
       $reviews = Review::all()->take(8);
       return view('welcome',compact('movies', 'reviews'));
 
       
    }


public function topchart() 
{
  $movies = Movie::where('vote_average', '>', 8)->paginate(15);
  return view('topchart', compact('movies'));
}

public function genre(Request $request, $genre) 
{
    $name = $request->fullUrl();
    $genreData = json_decode(Storage::get('genre.json'), true)['genres'];
    $genreNames = array_map(function($genre)
{
    
return $genre['name'];

}, $genreData
);

    $movies = Movie::all()->toArray();
    return view('genre', compact('genreData', 'movies', 'genreNames', 'genre'));
 
    
}



/* implementera funktion för att visa specifik films trailer i trailer.blade.php som inte finns än */

public function showtrailer ()
{

}


/*implementera funktion för att visa specifik films foto/n i photo.blade.php som inte finns än */
public function showphoto () 
{

}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
// dd($movie);
return view('movies', compact('movie'));

    }


    public function search(Request $request)
    {
        $movie = Movie::all();

        $search = \Request::get('search');  
        $movies = Movie::where('title', 'like', '%'.$search.'%')
        ->orderBy('title')
        ->paginate(12);
    
        return view('search',compact('movies'))->withmovie($movies);
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
