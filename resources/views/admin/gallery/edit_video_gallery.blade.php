@extends('admin.master')
@section('body')
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">

                @if(session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('message')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>                    
                @endif

                <div class="card-body">
                    <form class="form-horizontal" action="{{route('update.video.gallery')}}" enctype="multipart/form-data" method="POST">
                        @csrf

                        <input type="hidden" value="{{$edit_video->id}}" name="id">
                        <div class="form-group">
                            <label>Video</label>
                            <textarea class="editor form-control" col="10" row="3" name="video_link" >{{$edit_video->video_link}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Active/Deactive</label>
                            <select class="form-control" name="status">
                                <option value="1" @if ($edit_video->status == 1) selected @endif>Active</option>
                                <option value="0" @if ($edit_video->status == 0) selected @endif>Deactive</option>
                            </select>
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
