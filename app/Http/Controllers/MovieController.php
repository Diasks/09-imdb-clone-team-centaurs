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
        return view('adminmoviecreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'movie_title'=>'required',
            'movie_genres'=> 'required',
            'movie_runtime' => 'required|integer',
            'movie_release'=> 'required|integer',
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
            'movie_title'=> $request->get('movie_title'),
            'movie_genres'=> $request->get('movie_genres'),
            'movie_runtime' => $request->get('movie_runtime'),
            'movie_release'=> $request->get('movie_release'),
            'movie_adult' => $request->get('movie_adult'),
            'movie_revenue'=> $request->get('movie_revenue'),
            'movie_budget' => $request->get('movie_budget'),
            'movie_status'=> $request->get('movie_status'),
            'movie_tagline' => $request->get('movie_tagline'),
            'movie_poster'=> $request->get('movie_poster'),
            'movie_backdrop' => $request->get('movie_backdrop'),
            'movie_video'=> $request->get('movie_video'),
            'movie_vote' => $request->get('movie_vote'),
            'movie_average'=> $request->get('movie_average'),
            'movie_production' => $request->get('movie_production'),
            'movie_cast' => $request->get('movie_cast'),
            'movie_crew' => $request->get('movie_crew'),
            'movie_overview' => $request->get('movie_overview'),


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
    public function edit($id)
    {
        $movie = Movie::find($id);
        
        return view('adminmovieedit', compact('movie'));
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
          $movie->genres= $request->get('movie_genres');
          $movie->runtime = $request->get('movie_runtime');
          $movie->release_date= $request->get('movie_release');
          $movie->adult = $request->get('movie_adult');
          $movie->revenue= $request->get('movie_revenue');
          $movie->budget = $request->get('movie_budget');
          $movie->status= $request->get('movie_status');
          $movie->tagline = $request->get('movie_tagline');
          $movie->poster_path= $request->get('movie_poster');
          $movie->backdrop_path = $request->get('movie_backdrop');
          $movie->video= $request->get('movie_video');
          $movie->vote_count =$request->get('movie_vote');
          $movie->vote_average= $request->get('movie_average');
          $movie->production_companies = $request->get('movie_production');
          $movie->cast = $request->get('movie_cast');
          $movie->crew = $request->get('movie_crew');
          $movie->overview = $request->get('movie_overview');


         
          $movie->save();
          return redirect('/admin/movies')->with('success', 'Movie has been updated!');
    }

    public function get ()
    {
        $allMovies = Movie::all();
        return view('adminmovie', compact('allMovies'));
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
