<?php

namespace App\Http\Controllers;
use App\Models\Review;
use Illuminate\Http\Request;
use View;
use Storage;
use App\Models\User;
use App\Models\Movie;
use Illuminate\Support\Facades\Auth;

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
        $movie = Movie::findOrFail($id);
        $reviews = $movie->reviews;

        return view('reviews', compact('reviews', 'movie'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $movie = Movie::findOrFail($id);

        return view('create-review', compact('movie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $movieId)
    {
        $user = Auth::user();
        
        if($user) {
            $validatedData = $request->validate([
                'content' => 'required|max:20000',
            ]);

            $review = new Review;

            $review->content = $validatedData['content'];
            $review->movie_id = $movieId;
            $review->user_id = $user->id;

            $review->save();

            $request->session()->flash('success', 'Review posted');
        }

        return redirect()->route('reviews', ['movie_id' => $movieId]);
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

    /**
     * Display a listing of the resource from a specific user.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function userReviews($userId)
    {
        $user = User::find($userId);

        if($user) {
            $reviews = $user->reviews;
            
            return view('user-reviews', compact('reviews', 'user'));
        }
        
        return redirect('/');
    }
}
