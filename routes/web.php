<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
| Middleware options can be located in `app/Http/Kernel.php`
|
*/

// Homepage Route
Route::get('/', 'WelcomeController@welcome')->name('welcome');

Route::get('/', 'MovieController@index');


//REVIEW
Route::get('/reviews', 'ReviewController@index');


/*ROUTES FÖR MOVIE*/

Route::get('/movie/{movie_id}', 'MovieController@show')->name('movie');

Route::get('/movie/{movie_id}/reviews', 'ReviewController@index')->name('reviews');

Route::get('/movie/{movie_id}/photos', 'MovieController@showPhoto');
Route::get('/movie/{movie_id}/trailers', 'MovieController@showTrailer');

//ROUTE FÖR GENRE
Route::get('/genre/{genre}', 'MovieController@genre');

// ROUTE FÖR CHART-TOP
Route::get('/chart/top', 'MovieController@topchart');

Route::get('/search', 'MovieController@search');

// Authentication Routes
Auth::routes(['verify' => true]);

// Public Routes
Route::group(['middleware' => ['web', 'activity']], function () {

    // Activation Routes
    Route::get('/activate', ['as' => 'activate', 'uses' => 'Auth\ActivateController@initial']);

    Route::get('/activate/{token}', ['as' => 'authenticated.activate', 'uses' => 'Auth\ActivateController@activate']);
    Route::get('/activation', ['as' => 'authenticated.activation-resend', 'uses' => 'Auth\ActivateController@resend']);
    Route::get('/exceeded', ['as' => 'exceeded', 'uses' => 'Auth\ActivateController@exceeded']);

    // Route to for user to reactivate their user deleted account.
    Route::get('/re-activate/{token}', ['as' => 'user.reactivate', 'uses' => 'RestoreUserController@userReActivate']);

    // List routes
    Route::get('user/{user_id}/lists', 'MovieListController@index')->name('lists');
    Route::get('user/{user_id}/lists/{list_id}', 'MovieListController@show')->name('list');
    Route::delete('user/{user_id}/lists/{list_id}', 'MovieListController@destroy');
    Route::post('user/{user_id}/lists', 'MovieListController@store');
    Route::patch('user/{user_id}/lists/{list_id}', 'MovieListController@update');
});

// Registered and Activated User Routes
Route::group(['middleware' => ['auth', 'activated', 'activity']], function () {
    //Review routes
    Route::get('/movie/{movie_id}/reviews/create', 'ReviewController@create');
    Route::post('/movie/{movie_id}/reviews', 'ReviewController@store');

    // Activation Routes
    Route::get('/activation-required',
        ['uses' => 'Auth\ActivateController@activationRequired'])->name('activation-required');
    Route::get('/logout', ['uses' => 'Auth\LoginController@logout'])->name('logout');
});

// Registered and Activated User Routes
Route::group(['middleware' => ['auth', 'activated', 'activity', 'twostep']], function () {

    //  Homepage Route - Redirect based on user role is in controller.
    Route::get('/home', ['as' => 'public.home', 'uses' => 'UserController@index']);

    // Show users profile - viewable by other users.
    Route::get('profile/{username}', [
        'as' => '{username}',
        'uses' => 'ProfilesController@show',
    ]);

    // Show users reviews
    Route::get('/user/{user_id}/reviews', 'ReviewController@userReviews');
});

// Registered, activated, and is current user routes.
Route::group(['middleware' => ['auth', 'activated', 'currentUser', 'activity', 'twostep']], function () {

    // User Profile and Account Routes
    Route::resource(
        'profile',
        'ProfilesController', [
            'only' => [
                'show',
                'edit',
                'update',
                'create',
            ],
        ]
    );
    Route::put('profile/{username}/updateUserAccount', [
        'as' => '{username}',
        'uses' => 'ProfilesController@updateUserAccount',
    ]);
    Route::put('profile/{username}/updateUserPassword', [
        'as' => '{username}',
        'uses' => 'ProfilesController@updateUserPassword',
    ]);
    Route::delete('profile/{username}/deleteUserAccount', [
        'as' => '{username}',
        'uses' => 'ProfilesController@deleteUserAccount',
    ]);

    // Route to show user avatar
    Route::get('images/profile/{id}/avatar/{image}', [
        'uses' => 'ProfilesController@userProfileAvatar',
    ]);

    // Route to upload user avatar.
    Route::post('avatar/upload', ['as' => 'avatar.upload', 'uses' => 'ProfilesController@upload']);
});

// Registered, activated, and is admin routes.
Route::group(['middleware' => ['auth', 'activated', 'role:admin', 'activity', 'twostep']], function () {
    Route::resource('/users/deleted', 'SoftDeletesController', [
        'only' => [
            'index',
            'show',
            'update',
            'destroy',
        ],
    ]);

    Route::resource('users', 'UsersManagementController', [
        'names' => [
            'index' => 'users',
            'destroy' => 'user.destroy',
        ],
        'except' => [
            'deleted',
        ],
    ]);
    Route::post('search-users', 'UsersManagementController@search')->name('search-users');

    Route::resource('themes', 'ThemesManagementController', [
        'names' => [
            'index' => 'themes',
            'destroy' => 'themes.destroy',
        ],
    ]);

    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
    Route::get('routes', 'AdminDetailsController@listRoutes');
    Route::get('active-users', 'AdminDetailsController@activeUsers');

    Route::get('/admin/movies', 'MovieController@get');
    Route::get('/admin/movies/create', 'MovieController@create');
    Route::post('/admin/movies/store', 'MovieController@store');
    Route::get('/admin/{movies}/edit', 'MovieController@edit');
    Route::patch('/admin/{movies}/update', 'MovieController@update');
    Route::delete('/admin/{movies}/destroy', 'MovieController@destroy');
    Route::get('/admin/reviews', 'AdminController@reviews')->name('audit-reviews');
    Route::patch('/admin/reviews/{review_id}/accept', 'AdminController@reviewAccept');
    Route::patch('/admin/reviews/{review_id}/reject', 'AdminController@reviewReject');
});

Route::redirect('/php', '/phpinfo', 301);
