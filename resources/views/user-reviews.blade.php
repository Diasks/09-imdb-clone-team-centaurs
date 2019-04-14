@extends('layouts.app')

@section('content')
    <h1 class="main-heading">Reviews by {{ $user->name }}</h1>
    @include('partials.review-list', ['reviews' => $reviews])
@endsection
