@extends('layouts.app')

@section('content')
<div class="container">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">type</th>
      <th scope="col">Subcription</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>


    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <th scope="row">{{$user->name}}</th>
      <td>{{$user->email}}</td>
      <td>{{$user->type}}</td>
      <td>{{$user->subcription}}</td>
      <td>{{$user->interval}}</td>
      <td><a href="{{  url('') }}/dashboard/{{$user->id}}">
          <button type="button" class="btn btn-primary">View Details</button>
      </a>
    </td>

     
    </tr>
   @endforeach  
  </tbody>
</table>
</div>
@endsection
