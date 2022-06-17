@extends('layouts.app')

@section('content')
<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head ">
                                    <h5>
                                        {{$users[0]->name}}
                                    </h5>
                                    <h6>
                                    {{$users[0]->email}}
                                    </h6>
                                    <h6>
                                    {{$users[0]->type}}
                                    </h6>
                                    <h6>
                                    {{$users[0]->subcription}}
                                    </h6>

                                    @if($users[0]->status==0)
                                    <a class="btn btn-primary" href="{{  url('') }}/dashboard/activate/{{$users[0]->id}}">
                                     Activate
                                    </a>
                                    @else
                                    <a href="{{  url('') }}/dashboard/deactivate/{{$users[0]->id}}">
                                        <button type="button" class="btn btn-danger ">Deactivate</button>
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
