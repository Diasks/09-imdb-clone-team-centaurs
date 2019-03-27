

<h1>Trailer for: {{$trailers->first()->title}}</h1>


@if (($trailers->first()->video) > 0)
<video width="320" height="240" controls >
<source src={{ $trailers->first()->video }} type="video/mp4">
</video>
@else 

<h1>No trailer availabe!</h1>

@endif



