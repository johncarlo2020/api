@extends('layouts.app')

@section('content')
<div class="container">
<table class="table table-striped" id="users">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email Address</th>
      <th scope="col">Subscription</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>


    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <th scope="row">{{$user->name}}</th>
      <td>{{$user->email}}</td>
      <td>{{$user->subcription}}</td>
      <td class="text-danger">{{$user->interval}}</td>
      <td><a class="btn btn-outline-secondary center" href="{{  url('') }}/dashboard/{{$user->id}}">
         View Details
      </a>
    </td>


    </tr>
   @endforeach
  </tbody>
</table>
</div>
@endsection


