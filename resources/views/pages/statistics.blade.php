@extends('layouts.default')

@section('post')
<hr>
<h1 class="page-header">
  Statistics
  <small>website statistics</small>
</h1>

<table class="table table-dark">
    <tr>
      <th scope="col">All Users</th>
      <th scope="col">{{ $users }}</th>
    </tr>
    <tr>
      <th scope="col">All Posts</th>
      <th scope="col">{{ $posts }}</th>
    </tr>
    <tr>
      <th scope="col">All Comments</th>
      <th scope="col">{{ $comments }}</th>
    </tr>
</table>

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