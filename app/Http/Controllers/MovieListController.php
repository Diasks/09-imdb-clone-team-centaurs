<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MovieList;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class MovieListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $currentUserId = Auth::id();

        $userId = $request['user_id'];

        $user = User::find($userId);

        $userExists = $user ? true : false;
        
        $lists = null;
        $isUserOwner = false;
        if($userExists) {
            $lists = $user->movie_lists;
            $isUserOwner = $currentUserId === $user->id;
        }

        return view('lists', compact('userExists', 'user', 'lists', 'isUserOwner'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $userId)
    {
        $user = Auth::user();
        
        if($user && $userId == $user->id) {
            $validatedData = $request->validate([
                'name' => 'required|max:50',
            ]);

            $list = new MovieList;

            $list->name = $validatedData['name'];
            $list->user_id = $user->id;

            $list->save();
        }

        return redirect()->route('lists', ['user_id' => $userId]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($userId, $listId)
    {
        $currentUserId = Auth::id();

        $user = User::find($userId);

        $list = null;
        $listExists = false;
        $movies = null;
        $isUserOwner = false;
        if($user) {
            $list = $user->movie_lists()->find($listId);
    
            $listExists = $list ? true : false;
    
            if($listExists) {
                $movies = $list->movies->toArray();
            }

            $isUserOwner = $userId == $currentUserId;
        }

        return view('list', compact('listExists', 'user', 'list', 'movies', 'isUserOwner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $userId, $listId)
    {
        $validatedData = $request->validate([
            'movie_id' => 'required',
            'action' => [
                'required',
                Rule::in(['add', 'remove']),
            ]
        ]);

        $movieId = $validatedData['movie_id'];
        $action = $validatedData['action'];

        $user = Auth::user();

        if($user && $userId == $user->id) {
            $list = $user->movie_lists()->find($listId);

            switch ($action) {
                case 'add':
                    if($list->movies->contains($movieId)) {
                        //$request->session()->flash('error', 'That list already contains this movie');
                    }
        
                    else {
                        $list->movies()->attach($movieId);
                        //$request->session()->flash('success', 'Movie added');
                    }

                    return redirect()->route('movie', ['movie_id' => $movieId]);
                case 'remove':
                    if($list->movies->contains($movieId)) {
                        $list->movies()->detach($movieId);
                        $request->session()->flash('success', 'Movie removed');
                    }
        
                    else {
                        $request->session()->flash('error', 'That movie is not in this list');
                    }

                    break;
            }
        }

        return redirect()->route('list', ['user_id' => $userId, 'list_id' => $listId]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $userId, $listId)
    {
        $user = Auth::user();

        $list = false;
        if($user && $userId == $user->id) {
            $list = $user->movie_lists()->find($listId);
        }

        if(!$list) {
            return redirect()->route('list', ['user_id' => $userId, 'list_id' => $listId]);
        }

        $list->delete();

        $request->session()->flash('success', 'List removed');

        return redirect()->route('lists', ['user_id' => $userId]);
    }
}
