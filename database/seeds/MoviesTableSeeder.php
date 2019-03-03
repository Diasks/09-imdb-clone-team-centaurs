<?php

use App\Models\Movie;
use Illuminate\Database\Seeder;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movieUrl = env('MOVIE_API_URL');
        $movieKey = env('MOVIE_API_KEY');

        $client = new Client(); // Guzzle client

        for($id = 0; $id < 10; $id++) {
            try {
                $res = $client->request('GET', $movieUrl . $id . '?api_key=' . $movieKey);
            }
            
            catch(Exception $e) {
                continue;
            }
    
            $resBody = json_decode($res->getBody(), true);
    
            $dataArr = [
                'id' => $resBody['id'],
                'title' => $resBody['title'],
                'genres' => array_map(function($genre) {
                    return $genre['id'];
                }, $resBody['genres']),
                'runtime' => $resBody['runtime'],
                'release_date' => $resBody['release_date'],
                'adult' => $resBody['adult'],
                'revenue' => $resBody['revenue'],
            ];
    
            $movie = Movie::create($dataArr);
        }
    }
}
