
<!--loopa ut alla omdömen för denna specifika film-->

<h2>REVIEWS</h2>


@foreach ($reviews as $review)
   
   <h2> {{$review->author}}</h2>
   <p> {{$review->content}}</p>
    @endforeach
