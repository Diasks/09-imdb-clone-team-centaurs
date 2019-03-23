<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MovieList;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
        $user = User::find($userId);

        $list = null;
        $listExists = false;
        $movies = null;

        if($user) {
            $list = $user->movie_lists()->find($listId);
    
            $listExists = $list ? true : false;
    
            if($listExists) {
                $movies = $list->movies->toArray();
            }
        }

        return view('list', compact('listExists', 'user', 'list', 'movies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($userId, $listId)
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

        return redirect()->route('lists', ['user_id' => $userId]);
    }
}
