

<h1>Hej jag är genre!</h1>

<!-- ska användas i navbaren i dropdownen -->





<?php 
$choosenGenre = array_filter($movies, function($movie) use ($genre) {
   foreach ($movie['genres'] as $genreLocal) {
       if ($genreLocal['name'] == $genre) {
 
           return true;
       }
       return false;
   }

});

foreach ($choosenGenre as $genreMovie)
{
  echo "<a href='/movie/" . $genreMovie['id'] . "'>" . "<img src='http://image.tmdb.org/t/p/w185//" .$genreMovie['poster_path'] ."'/></a>" ;

}


