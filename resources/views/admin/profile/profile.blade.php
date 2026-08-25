@extends('admin.master')
@section('title')
    Management
@endsection
@section('body')
    <div class="row mt-2">
        <div class="col-lg-12 ">
            <div class="card mt-3">
                @if(session('message'))
                    <div class="alert alert-success" role="alert">
                        {{session('message')}}
                    </div>
                @endif
                <div class="card-body">
                    <h3 class="text-center">Update Information</h3>
                    <form class="form-horizontal" action="{{route('update.profile')}}" enctype="multipart/form-data" method="POST">
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
                            <img src="{{$user->image??null}}" height="100" width="100" alt="">
                        </div>
                        <div class="table-responsive">
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea#default'
        });
    </script>
@endsection
