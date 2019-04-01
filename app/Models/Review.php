<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'author',
        'content',
        'movie_id',
        'user_id',
        'accepted',
    ];

    public function movie()
    {
        return $this->belongsTo('App\Models\Movie');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
