@extends('frontend.master')
@section('title')
    Profile Settings
@endsection
@section('content')
    <!-- Main content Start -->
    <div class="main-content">
        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs breadcrumbs-overlay">
            <div class="breadcrumbs-img">

                <img src="{{asset($banner->image??null)}}" alt="Breadcrumbs Image">
            </div>
            <div class="breadcrumbs-text white-color">
                <h1 class="page-title">Profile Settings</h1>
                <ul>
                    <li>
                        <a class="active" href="{{route('front.page')}}">@if(session()->get('language')=='bangla') হোম @elseif (session()->get('language')=='arabic') بيت @else Home @endif</a>
                    </li>
                    <li>Profile Settings</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Shop Single Start -->
        <div class="container my-5">
            <div class="row mt-2">
                <div class="col-lg-12 ">
                    <div class="card mt-3">
                        @if(session('message'))
                            <div class="alert alert-success" role="alert">
                                {{session('message')}}
                            </div>
                        @endif
                        <div class="card-body">
                            <h3 class="text-center">@if(session()->get('language')=='bangla') তথ্য নবায়ন করুন @else Update Information @endif </h3>
                            <form class="form-horizontal" action="{{route('user.update.profile')}}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{$user->id}}">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" rows="5" name="name" value="{{$user->name}}" id="name" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" rows="5" name="email" value="{{$user->email}}" id="email" placeholder="Email">
                                </div>

                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="text" class="form-control" rows="5" name="new_password" id="youtube" placeholder="new password">
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="image"  class="form-control">
                                    <img src="{{$user->image??null}}" class="my-4" height="100" width="100" alt="">
                                </div>
                                <div class="table-responsive">
                                    <button type="submit" class="btn btn-info">@if(session()->get('language')=='bangla') নবায়ন করুন @else Update @endif </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- Main content End -->
@endsection
