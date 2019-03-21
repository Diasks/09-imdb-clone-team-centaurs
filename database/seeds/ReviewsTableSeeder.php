<?php

use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    // DB::table('reviews')->delete();
    // $data = json_decode(Storage::get('reviews.json'), true);
    // foreach ($data as $obj) {
    //     Review::create(array(
    //         'user_id' => $obj->user_id,
    //         'author' => $obj->author,
    //         'content' => $obj->content,
    //         'movie_id' => $obj->movie_id
    //     ));
    // }



        $reviewData = json_decode(Storage::get('reviews.json'), true);

        $currentItem;

        function reviewAdder($reviewItem)
        {
            global $currentItem;
            $currentItem = $reviewItem;

            array_map(function($result) {
                global $currentItem;

                try {
                    $dataArr = [
                        'author' => $result['author'],
                        'content' => $result['content'],
                        'movie_id' => $currentItem['id'],
                        'user_id' => null,
                    ];

        
                    $review = Review::create($dataArr);
                } catch(Exception $e) {}
            }, $reviewItem['results']);
        }

        array_map('reviewAdder', $reviewData);
    }
}
