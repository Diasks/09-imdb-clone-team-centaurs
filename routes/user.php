<?php

// List routes
Route::get('/{user_id}/lists', 'ListController@index');
Route::get('/{user_id}/list/{id}', 'ListController@show');
