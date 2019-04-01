<?php

namespace App\Http\Controllers;
use App\Models\Review;
use Illuminate\Http\Request;
use View;
use Storage;
use App\Models\Movie;


class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


/* i denna funktion ska du hämta omdömen för en specifik film */

   
    public function index($id)
    {   

        // $reviews =db::table('reviews')where('ID', $id)->get(8);
        // return view('reviews', compact('reviews'));
        // $reviews = Review::table('reviews')->where('id', = 'id');
        $reviews = Review::all()
        ->where('id', '=', $id)
        ->take(4);
        // dd($reviews);
        $movie = Movie::findOrFail($id);
        return view('reviews', compact('reviews', 'movie'));
        // dd($reviews);
        // $reviews = Review::all()->take(8);
        // dd($reviews); 
        // return view('reviews', compact('reviews'));
        // return view('movies', compact('movie'));
        // dd($movie);
        // $reviews = Review::('reviews')->where()


        // $reviews = Review::all()->take(100);
        // dd($reviews);
        // return view('reviews', compact('reviews'));
        
  
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
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }


 
}
