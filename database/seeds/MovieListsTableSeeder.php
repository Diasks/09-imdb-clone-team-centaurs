<?php

use App\Models\MovieList;
use Illuminate\Database\Seeder;

class MovieListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataArr = [
            'name' => 'Favoriter!!!',
            'user_id' => 1,
        ];

        $movie = MovieList::create($dataArr);
    }
}
