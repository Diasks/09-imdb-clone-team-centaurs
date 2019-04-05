<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reviews(Request $request)
    {
        $reviews = Review::where('accepted', 0)->get();

        return view('admin-reviews', compact('reviews'));
    }

    public function reviewAccept($reviewId)
    {
        $review = Review::find($reviewId);

        if($review) {
            $review->accepted = 1;
            $review->save();
        }

        return redirect()->route('audit-reviews');
    }

    public function reviewReject($reviewId)
    {

    }
}
