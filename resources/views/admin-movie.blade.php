@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <a href="{{ action('MovieController@create') }}" class="btn btn-success my-2 ml-auto">Add a movie</a>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Runtime</th>
                        <th scope="col">release_date</th>
                        <th scope="col">status</th>
                        <th scope="col">tagline</th>
                        <th scope="col">overview</th>
                        <th scope="col" colspan="2">Actions</th>
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
                                <a href="{{ action('MovieController@edit', $movie->id) }}"
                                   class="btn btn-warning">Edit</a>
                            </td>
                            <td>
                                <form action="{{ action('MovieController@destroy', $movie->id)}}" method="post">
                                    {{csrf_field()}}
                                    <input name="_method" type="hidden" value="DELETE"/>
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{$allMovies->onEachSide(0)->appends(request()->input())->links()}}

@endsection
