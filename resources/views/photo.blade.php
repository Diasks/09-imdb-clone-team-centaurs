
@extends('layouts.app')
@section('content')


<div class="jumbotron jumbotron-fluid bg-info">
  <div class="container">
    <h1 class="display-4">Photos for: {{$images->title}}</h1>
    @foreach($imageData['backdrops'] as $images)
    <img width="320" height="240" controls src="{{ 'http://image.tmdb.org/t/p/original/' .$images['file_path'] }}">
 

@endforeach
@foreach($imageData['posters'] as $images)
    <img width="320" height="240" controls src="{{ 'http://image.tmdb.org/t/p/original/' .$images['file_path'] }}">
 

@endforeach








@endsection

