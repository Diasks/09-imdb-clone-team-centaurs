@extends('layouts.app')

@section('content')
    <h1 class="display-4">TOP CHART</h1>
    @include('partials.movie-list', ['movies' => $movies])
@endsection
