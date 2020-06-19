@extends('layouts.default')

@section('post')
<br>
	<form action="{{ route('Update', $post->id) }}" method="POST" name="update"  enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name ="title" value="{{ $post->title }}" id="title" placeholder="Enter title">
              </div>

              <div class="form-group">
                <label>Body</label>
                <textarea type="text" class="form-control" name ="body" id="body" placeholder="Content(body)">{{ $post->body }}</textarea>
              </div>
              
              <div class="form-group">
                <label for="featured">Image</label>
                <input type="file" class="form-control" name ="featured" value="{{ $post->featured }}" >
              </div>

              <div class="form-group">
              <label for="exampleFormControlSelect1">Category</label>
              <select class="form-control" name="category_id" id="category_id">
               
               @foreach($categories as $category)
                <option value="{{$category->id}}" >{{ $category->name }}</option>
               @endforeach
              </select>
            </div>
              
              <button type="submit" class="btn btn-primary">Edit Post</button>
        </form>
<hr>
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