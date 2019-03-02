<?php

use App\Models\Movie;
use Illuminate\Database\Seeder;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movie = Movie::create([
            'title' => "Fight Club",
            'genres' => [
                18,
            ],
            'runtime' => 139,
            'release_date' => "1999-10-12",
            'adult' => false,
            'revenue' => 100853753,
        ]);
    }
}
