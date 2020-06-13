@extends('layouts.default')

@section('post')
        
        <h1 class="mt-4">{{ $post->title }}</h1>

        <hr>
        @if ($post->featured)
        <p><img src="uploads/posts/{{ $post->featured }}"></p>
        @endif

        <!-- Date/Time -->
        <p>Posted on January 1, 2019 at 12:00 PM</p>

        <hr>

        <!-- Post Content -->
        <p class="lead">{{ $post->body }}</p>

        <hr>
          <!-- Single Comment -->
        <div class="media mb-4">
          <div class="media-body">
            	@foreach($post->comments as $comment)
            		<p>{{ $comment->body }}</p>
            	@endforeach

          </div>
          </div>

         <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form action="{{ route('Add_Comment', $post->id) }}" method="post">
            	@csrf
              <div class="form-group">
                <textarea class="form-control" rows="3" name ="body" id="body" placeholder="Write Something" ></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Add Comment</button>
            </form>
          </div>
        </div>

      

        

@endsection('post')