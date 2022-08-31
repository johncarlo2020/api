@extends('layouts.app')

@section('content')
<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-3">
                        <div class="profile-img">
                            <img class="img-fluid" src={{$users[0]->userImage}}  alt="..."/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head ">
                            <dl class="row">
                                <dt class="col-sm-3">Name:</dt>
                                <dd class="col-sm-9">{{$users[0]->name}}</dd>
                              
                                <dt class="col-sm-3">Email:</dt>
                                <dd class="col-sm-9">{{$users[0]->email}}</dd>
                              
                                <dt class="col-sm-3">User Type:</dt>
                                <dd class="col-sm-9">{{$users[0]->type}}</dd>
                              
                                <dt class="col-sm-3 text-truncate">Subscription:</dt>
                                <dd class="col-sm-9">{{$users[0]->subcription}}</dd>
                                
                                <dt class="col-sm-3 text-truncate">Contact Number:</dt>
                                <dd class="col-sm-9">{{$users[0]->contactNumber}}</dd>

                                <dt class="col-sm-3 text-truncate">Address</dt>
                                <dd class="col-sm-9">{{$users[0]->address}}</dd>
                              
                              </dl>                                    
                                    @if($users[0]->status==0)
                                    <a class="btn btn-primary" href="{{  url('') }}/dashboard/activate/{{$users[0]->id}}">
                                     Activate
                                    </a>
                                    @elseif ($users[0]->status==1)
                                    <a href="{{  url('') }}/dashboard/deactivate/{{$users[0]->id}}">
                                        <button type="button" class="btn btn-warning ">Deactivate</button>
                                    </a>                                    
                                    @else                                    
                                    <a class="btn btn-danger" onclick="return confirm('Are you sure to remove this user?')" href="{{  url('') }}/dashboard/deleteAccount/{{$users[0]->id}}">
                                    Delete Account
                                    </a>
                                    @endif    

                                    @if($users[0]->subcription=="free")                               
                                    <a class="btn btn-success" onclick="return confirm('Are you sure to activate subscription on this user?')" href="{{  url('') }}/dashboard/activateSubscription/{{$users[0]->id}}">
                                    Activate Subscription
                                    </a>
                                    @else
                                    <a class="btn btn-danger" onclick="return confirm('Are you sure to deactivate subscription on this user?')" href="{{  url('') }}/dashboard/deactivateSubscription/{{$users[0]->id}}">
                                    Unsubscribe
                                    </a>
                                    @endif

                                    <ul class="nav nav-tabs mt-3" id="myTab">
                                        <li class="nav-item">
                                            <a href="#home" class="nav-link active" data-bs-toggle="tab"><i class="fa-solid fa-book"></i> Notes</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#profile" class="nav-link" data-bs-toggle="tab"><i class="fa-solid fa-image"></i> Gallery</a>
                                        </li>
                                    </ul>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-8">
                    <div class=" tab-content mt-2">
                        <div class=" overflowContent tab-pane fade show active" id="home">

                            @foreach($notes as $note)
                            <div class="card mb-2">
                                    <div class="card-header cardHeader d-flex justify-content-between ">
                                       <p class="fs-5 p-0 m-0 fw-bold"><i class="fa-solid fa-book"></i> {{$note->title}}</p>
                                       <p class="fs-6 p-0 m-0"><small>{{$note->created_at}}</small></p>
                                    </div>
                                    <div class="card-body">
                                        <h5 class=" fs-6 p-0 m-0">{{ $note->body}}</h5>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div class="overflowContent tab-pane fade" id="profile">
                        <div class="row">
                            @foreach($imgs as $img)
                            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                                <img
                                src="{{  url('') }}/{{$img->title}}"
                                class="galleryImg w-100 shadow-1-strong rounded mb-4"
                                alt=""
                                />

                            </div>
                                @endforeach
                        </div>
                        </div>

                    </div>
                    </div>
                </div>
            </form>
        </div>
@endsection
