@extends('layouts.default')

@section('post')
        
        <h1 class="mt-4">{{ $post->title }}</h1>
        @if(Auth::check())
          @if(Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Editor'))
        <form action="{{ route('Destroy', $post->id) }}" method="Post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
        </form>
          @endif
        @endif

        <hr>
        @if ($post->featured)
        <p><img src="../uploads/posts/{{ $post->featured }}"></p>
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
          <!-- Single Comment -->
        <div class="media mb-4">
          <div class="media-body">
            	@foreach($post->comments as $comment)
            		<span style="background: gray"> {{ Auth::user()->name }} </span> <p>{{ $comment->body }}</p>
            	@endforeach

          </div>
          </div>

        @if($stop_comment == 1)
          <h3>Oops Comnments are closed !!!</h3>
        @else
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
        @endif

@endsection

@section('sideBar')
      
      <div class="col-md-12">

        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>

        <!-- Categories Widget -->

<!--        <div class="card my-4">
          <h5 class="card-header">Categories</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                 //foreach
                </ul>
              </div>
              
               
            </div>
          </div>
        </div>   -->
                                         
        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Advertisement</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to advertise!
          </div>
        </div>
        <br>

      </div>
@endsection