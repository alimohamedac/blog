@extends('layouts.default')

@section('post')
        
        @foreach ($posts as $post)
        <h1 class="mt-4">
          <a href="{{ route('Post', $post->id) }}">{{ $post->title }} </a>
        </h1>

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

        

@endsection

@section('sideBar')
        
 <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

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
          <h5 class="card-header">Extra</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
          </div>
        </div>

      </div>
@endsection