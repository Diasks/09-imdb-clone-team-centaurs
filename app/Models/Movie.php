<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'id',
        'genres',
        'runtime',
        'release_date',
        'adult',
        'revenue',
        'budget',
        'status',
        'tagline',
        'poster_path',
        'video',
    ];

    protected $casts = [
        'genres' => 'array',
        'production_companies' => 'array',
    ];
}
