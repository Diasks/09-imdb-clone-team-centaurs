@extends('layouts.app')

@section('content')
    @include('partials.movie-list', ['movies' => $movies])
@endsection
