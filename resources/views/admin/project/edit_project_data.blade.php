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
                <form class="form-horizontal" action="{{route('update.project.data')}}" enctype="multipart/form-data" method="POST">
                    @csrf

                    <input type="hidden" value="{{$edit_project_data->id}}" name="id">
                    <input type="hidden" value="{{$edit_project_data->image}}" name="old_img">

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $edit_project_data->title }}">
                    </div>
                    <div class="form-group">
                        <label>Bangla Title</label>
                        <input type="text" name="title_bangla" class="form-control" value="{{ $edit_project_data->title_bangla }}">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <img src="{{ asset($edit_project_data->image ) ?? null }}" style="height: 100px;">
                    </div>
                    <div class="form-group">
                        <label>Description English</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="short_des_eng">
                            {!! $edit_project_data->short_des_eng !!}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Description Bangla</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="short_des_bangla">
                            {!! $edit_project_data->short_des_bangla !!}
                        </textarea>
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
