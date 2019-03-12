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
        $movieData = json_decode(Storage::get('movies.json'), true);

        function movieAdder($movieItem)
        {
            try {
                $dataArr = [
                    'id' => $movieItem['id'],
                    'title' => $movieItem['title'],
                    'genres' => array_map(function($genre) {
                        return $genre['id'];
                    }, $movieItem['genres']),
                    'runtime' => $movieItem['runtime'],
                    'release_date' => $movieItem['release_date'],
                    'adult' => $movieItem['adult'],
                    'revenue' => $movieItem['revenue'],
                    'budget' => $movieItem['budget'],
                    'status' => $movieItem['status'],
                    'tagline' => $movieItem['tagline'],
                    'poster_path' => $movieItem['poster_path'],
                    'video' => $movieItem['video'],
                    'vote_count' => $movieItem['vote_count'],
                    'vote_average' => $movieItem['vote_average'],
                    'production_companies' => array_map(function($company) {
                        return $company['id'];
                    }, $movieItem['production_companies']),
                ];
    
                $movie = Movie::create($dataArr);
            } catch(Exception $e) {}
        }

        array_map('movieAdder', $movieData);
    }
}
