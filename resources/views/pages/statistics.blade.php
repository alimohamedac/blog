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
        
 <!-- Sidebar Widgets Column 
<div style="float:right">
     ali aaa
     <hr>
     alllllii
   </div>
 -->
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
          <h5 class="card-header">Extra</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
          </div>
        </div>

      </div>
@endsection