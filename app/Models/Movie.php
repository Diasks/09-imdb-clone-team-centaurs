<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'id',
        'title',
        'genres',
        'runtime',
        'release_date',
        'adult',
        'revenue',
        'budget',
        'status',
        'tagline',
        'poster_path',
        'backdrop_path',
        'video',
        'vote_count',
        'vote_average',
        'production_companies',
        'cast',
        'crew',
    ];

    protected $casts = [
        'genres' => 'array',
        'production_companies' => 'array',
        'cast' => 'array',
        'crew' => 'array',
    ];

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    public function accepted_reviews()
    {
        return $this->reviews()->where('accepted', '=', 1);
    }

    public function movie_lists()
    {
        return $this->belongsToMany('App\Models\MovieList');
    }
}
