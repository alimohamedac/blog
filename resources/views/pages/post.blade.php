@extends('layouts.default')

@section('post')
        
        <h1 class="mt-4">{{ $post->title }}</h1>

        <hr>

        <!-- Date/Time -->
        <p>Posted on January 1, 2019 at 12:00 PM</p>

        <hr>

        <!-- Post Content -->
        <p class="lead">{{ $post->body }}</p>

        <hr>

@endsection('post')