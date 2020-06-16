@extends('layouts.default')

@section('post')
<hr>
<h2>Control Panel</h2>
<h4>List Of Users</h4>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">User</th>
      <th scope="col">Editor</th>
      <th scope="col">Admin</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($users as $user)
  	<form method="post" action="{{ url('/add_role') }}">
  	@csrf
  	<input type="hidden" name="email" value="{{ $user->email }}">
    <tr>
      <th scope="row">{{ $user->id }}</th>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>
      	<input type="checkbox" name="role_user" onChange="this.form.submit()" {{ $user->hasRole('User') ? 'checked' : ' ' }}>
      </td>
      <td>
      	<input type="checkbox" name="role_editor" onChange="this.form.submit()" {{ $user->hasRole('Editor') ? 'checked' : ' ' }}>
      </td>
      <td>
      	<input type="checkbox" name="role_admin" onChange="this.form.submit()" {{ $user->hasRole('Admin') ? 'checked' : ' ' }}>
      </td>
    </tr>
    </form>
    @endforeach
  </tbody>
</table>	
        

@endsection