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
        $list = MovieList::create([
            'name' => 'Watchlist',
            'user_id' => 1,
        ]);
        $list->movies()->attach(1893);
        $list->movies()->attach(603);

        $list = MovieList::create([
            'name' => 'Testlista 2',
            'user_id' => 1,
        ]);
    }
}
