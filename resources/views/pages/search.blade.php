@extends('layouts.default')

@section('post')
    @if( count($posts) )
        @foreach ($posts as $post)
        <h1 >
          <a href="{{ route('Post', $post->id) }}">{{ $post->title }} </a>

          </h1>

        <hr>
        @if ($post->featured)
        <p><img src="uploads/posts/{{ $post->featured }}"></p>
        @endif
        <!-- Date/Time -->
        <p>Posted on {{ $post->created_at }} - <strong>Category:</strong>
        <a href="{{ route('Category', $post->category->name) }}">
          {{ $post->category->name }}
        </a>
        </p>
 
        <hr>

        <!-- Post Content -->
        <p class="lead">{{ $post->body }}</p>

        <hr>
        @endforeach

        <!-- pagination -->
        <div class="clearfix">
            {!! $posts->links() !!}
        </div>
    @else
        <div class="alert alert-danger">
                لا توجد نتائج مطابقة لبحثك
            </div>
        @endif

@endsection