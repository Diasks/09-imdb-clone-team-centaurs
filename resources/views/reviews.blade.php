
<!--loopa ut alla omdömen för denna specifika film-->

<h2>REVIEWS</h2>


{{-- @foreach ($reviews as $review)
   
   <h2> {{$review->author}}</h2>
   <p> {{$review->content}}</p>

    @endforeach --}}


@foreach ($reviews as $review)

<h2>{{ $review->content }}</h2>

@endforeach

{{-- @foreach ($reviews as $review)

   <p> {{ $review->review }} </p>
   <p> {{ $review->author }}</p>
   <p> {{ $review->movie_id }}</p>
   <p> {{ $review->user_id }}</p>
   @endforeach --}}