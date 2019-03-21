@extends('layouts.app')

@section('content')

<table class="table table-bordered table-sm">
<thead class="thead-dark">
<tr>
<th>Id</th>
<th>Title</th>
<th>Runtime</th>
<th>release_date</th>
<th>status</th>
<th>tagline</th>
<th>overview</th>
<th>action</th>
<th>action</th>
<th>action</th>
</tr>
</thead>
<tbody class="table-hover">
@foreach($allMovies as $movie)
<tr>
<td>{{$movie->id}}</td>
<td>{{$movie->title}}</td>
<td>{{$movie->runtime}}</td>
<td>{{$movie->release_date}}</td>
<td>{{$movie->status}}</td>
<td>{{$movie->tagline}}</td>
<td>{{$movie->overview}}</td>
<td>
<a href="{{ action('MovieController@create') }}" class="btn btn-success">Create</a>
</td>
<td>
<a href="{{ action('MovieController@edit', $movie->id) }}" class="btn btn-warning">Edit</a>
</td>
<td>
<form action="{{ action('MovieController@destroy', $movie->id)}}" method="post">
{{csrf_field()}}
<input name="_method" type="hidden" value="DELETE" />
<button class="btn btn-danger" type="submit">Delete</button>
</form>
</td>
</tr>
@endforeach

</tbody>
</table>
@endsection