@extends('layouts.default')

@section('post')
        
        @foreach ($posts as $post)
        <h1 >
          <a href="{{ route('Post', $post->id) }}">{{ $post->title }} </a>

          </h1>

        <hr>
        @if ($post->featured)
        <p><img src="uploads/posts/{{ $post->featured }}" style="width: 300px" class="img-thumbnail"></p>
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

        @if(Auth::check())
          @if(Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Editor'))

        <form action="{{ route('Add_Post') }}" method="post" name="Add_Post"  enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name ="title" value="{{ old('title') }}" id="title" placeholder="Enter title">
              </div>

              <div class="form-group">
                <label>Body</label>
                <textarea type="text" class="form-control" name ="body" value="{{ old('body') }}" id="body" placeholder="Content(body)"></textarea>
              </div>
              
              <div class="form-group">
                <label for="featured">Image</label>
                <input type="file" class="form-control" name ="featured" value="{{ old('featured') }}" >
              </div>

              <div class="form-group">
              <label for="exampleFormControlSelect1">Category</label>
              <select class="form-control" name="category_id" id="category_id">
               
               @foreach($categories as $category)
                <option value="{{$category->id}}" >{{ $category->name }}</option>
               @endforeach
              </select>
            </div>
              
              <button type="submit" class="btn btn-primary">Add Post</button>
        </form>
          @endif
        @endif    

        @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
        @endif

       
@endsection

@section('sideBar')

      
      <div class="col-md-12">

        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Search On Posts</h5>
          <div class="card-body">

            <form action="{{ route('Search') }}" method="get">
              <div class="input-group">
                <input type="text" class="form-control" name="q" value="{{ old('q') }}" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="submit">Go!</button>
                </span>
              </div>

            </form>
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