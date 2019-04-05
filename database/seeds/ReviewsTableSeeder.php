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

    DB::table('reviews')->delete();
    // lägga in hela json filen i en variabel
    $movies_with_reviews = json_decode(Storage::get('reviews.json'));
    // här gör jag en foreach loop som jag namnger movies
    foreach ($movies_with_reviews as $movie) {
    //  Här namnger jag en variabel $movieid som är movie -> id för att det inte finns movieid
        $movie_id = $movie->id;
    //  här gör jag som i javascript .length så att den inte skriver ut några results som inte har något över 0 bokstäver
        if (count($movie->results) > 0) {
    //  så loopar jag igenom varje movie result och döper om dom till review
            foreach($movie->results as $review) {
                Review::create(array(
                    'user_id' => null,
                    'author' => $review->author,
                    'content' => $review->content,
                    'movie_id' => $movie_id,
                    'audited' => 1,
                    'accepted' => 1
                ));
            }
        }
    }



        // $reviewData = json_decode(Storage::get('reviews.json'), true);

        // $currentItem;

        // function reviewAdder($reviewItem)
        // {
        //     global $currentItem;
        //     $currentItem = $reviewItem;

        //     array_map(function($result) {
        //         global $currentItem;

        //         try {
        //             $dataArr = [
        //                 'author' => $result['author'],
        //                 'content' => $result['content'],
        //                 'movie_id' => $currentItem['id'],
        //                 'user_id' => null,
        //             ];

        
        //             $review = Review::create($dataArr);
        //         } catch(Exception $e) {}
        //     }, $reviewItem['results']);
        // }

        // array_map('reviewAdder', $reviewData);
    }
}
