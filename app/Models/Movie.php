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
    ];

    protected $casts = [
        'genres' => 'array',
    ];
}
