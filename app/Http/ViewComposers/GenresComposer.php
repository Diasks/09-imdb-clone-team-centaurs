<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Storage;

class GenresComposer {
    public function compose(View $view) {
        $genreData = json_decode(Storage::get('genre.json'), true);
        $view->with('genreData', $genreData['genres']);
    }
}