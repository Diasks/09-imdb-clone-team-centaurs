@extends('layouts.app')




@section('content')
<?php 
$choosenGenre = array_filter($movies, function($movie) use ($genre) {
   foreach ($movie['genres'] as $genreLocal) {
       if ($genreLocal['name'] == $genre) {
 
           return true;
       }
       return false;
   }

});

echo "<h1>" . $genre . "</h1>";

foreach ($choosenGenre as $genreMovie)
{
   
  echo "<a href='/movie/" . $genreMovie['id'] . "'>" . "<img src='http://image.tmdb.org/t/p/w185//" .$genreMovie['poster_path'] ."'/></a>" ;

}

?>
@endsection