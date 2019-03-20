<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovieList extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function movies()
    {
        return $this->belongsToMany('App\Models\Movie');
    }
}
