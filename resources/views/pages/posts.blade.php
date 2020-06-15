@extends('layouts.default')

@section('post')
        
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
            

        @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
        @endif

       

        

@endsection('post')