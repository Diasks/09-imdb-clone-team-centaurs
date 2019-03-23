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

echo "<div class='jumbotron jumbotron-fluid bg-info'>"; 

echo "<h1>Genre: " . $genre . "</h1>";

foreach ($choosenGenre as $genreMovie)
{
   
  echo " <a href='/movie/" . $genreMovie['id'] . "'>" . "<img src='http://image.tmdb.org/t/p/w185//" .$genreMovie['poster_path'] ."' class='shadow p-3 mb-5 bg-white rounded'/></a>" ;

}
echo "</div>";
?>
@endsection