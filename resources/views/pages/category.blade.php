@extends('layouts.default')

@section('post')
        
        @foreach ($posts as $post)
        <h1 class="mt-4">{{ $post->title }}</h1>

        <hr>
        @if ($post->featured)
        <p><img src="../uploads/posts/{{ $post->featured }}"></p>
        @endif

        <!-- Date/Time -->
        <p>Posted on {{ $post->created_at }} - <strong>Category:</strong>
        
          
       
        </p>

        <hr>

        <!-- Post Content -->
        <p class="lead">{{ $post->body }}</p>

        <hr>
        @endforeach

        

@endsection('post')