<?php

// List routes
Route::get('/{user_id}/lists', 'MovieListController@index');
Route::get('/{user_id}/lists/{id}', 'MovieListController@show');
