@extends('layouts.app')

@section('content')
<div class="container">
<table class="table table-striped" id="users">
  <thead>
    <tr>
      <th scope="col" class="text-center">Name</th>
      <th scope="col" class="text-center">Email Address</th>
      <th scope="col" class="text-center">Subscription</th>
      <th scope="col" class="text-center">Time Log</th>
      <th scope="col" class="text-center">Action</th>


    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    @if($user->status==0)
    <tr class="table-warning">
    @elseif($user->status==1)
      @if(str_contains($user->interval, 'inactive'))
      <tr class="table-danger">
      @else
      <tr> 
      @endif     
    @else
    <tr class="table-danger">
    @endif
      <th scope="row">{{$user->name}}</th>
      <td>{{$user->email}}</td>
      <td>{{$user->subcription}}</td>
      <td class="text-danger">{{$user->interval}}</td>
      <td class="text-center"><a class="btn btn-outline-secondary center" href="{{  url('') }}/dashboard/{{$user->id}}">
         View Details
      </a>
    </td>


    </tr>
   @endforeach
  </tbody>
</table>
</div>
@endsection


