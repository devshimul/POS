@extends('master.app')
@section('main-content')
<h2 class="text-center my-md-4">All Register Users</h2>
<hr width="50%" class=" mb-5 mx-auto">
<table id="datatables" class="table table-striped table-hover">

 
  <thead>
    <tr>
      <th>User ID </th>
      <th>Name</th>
      <th>Email</th>
  
    </tr>
  </thead>
  <tbody>
    @forelse($data as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
    </tr>
    @empty
    <tr>
      <th colspan="4" scope="row">No Register User Found</th>
    </tr>
    @endforelse  
  </tbody>
</table>
 

@endsection 