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
                <form class="form-horizontal" action="{{route('update.donation.data')}}" enctype="multipart/form-data" method="POST">
                    @csrf

                    <input type="hidden" value="{{$edit_donate_data->id}}" name="id">
                    <input type="hidden" value="{{$edit_donate_data->image}}" name="old_img">

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $edit_donate_data->title }}">
                    </div>
                    <div class="form-group">
                        <label>Bangla Title</label>
                        <input type="text" name="bangla_title" class="form-control" value="{{ $edit_donate_data->bangla_title }}">
                    </div>
                    <div class="form-group">
                        <label>Arabic Title</label>
                        <input type="text" name="arabic_title" class="form-control" value="{{ $edit_donate_data->arabic_title }}">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Video</label>
                        <textarea class="editor form-control" col="10" row="3" name="video_link" >{{$edit_donate_data->video_link}}</textarea>
                    </div>
                    <div class="form-group">
                        <img src="{{ asset($edit_donate_data->image ) ?? null }}" style="height: 100px;">
                    </div>
                     <div class="form-group">
                        <label>Short Description-1 English</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="short_des1" >
                            {!! $edit_donate_data->short_des1 !!}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Short  Description-2 English</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="short_des2" >
                            {!! $edit_donate_data->short_des2 !!}
                        </textarea>
                    </div>

                    <div class="form-group">
                        <label>Long Description-1 English</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="long_des1" >
                            {!! $edit_donate_data->long_des1 !!}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Long Description-2 English</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="long_des2" >
                            {!! $edit_donate_data->long_des2 !!}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Long Description-3 English</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="long_des3" >
                            {!! $edit_donate_data->long_des3 !!}
                        </textarea>
                    </div>

                    <div class="form-group">
                        <label>Short Description-1 Bangla</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="short_des_bangla1" >
                            {!! $edit_donate_data->short_des_bangla1 !!}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Short Description-2 Bangla</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="short_des_bangla2" >
                            {!! $edit_donate_data->short_des_bangla2 !!}
                        </textarea>
                    </div>

                    <div class="form-group">
                        <label>Long Description-1 Bangla</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="long_des_bangla1" >
                            {!! $edit_donate_data->long_des_bangla1 !!}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Long Description-2 Bangla</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="long_des_bangla2" >
                            {!! $edit_donate_data->long_des_bangla2 !!}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Long Description-3 Bangla</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="long_des_bangla3" >
                            {!! $edit_donate_data->long_des_bangla3 !!}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Short Description-1 Arabic</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="short_des_ab1" >
                            {!! $edit_donate_data->short_des_ab1 !!}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Short Description-2 Arabic</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="short_des_ab2" >
                            {!! $edit_donate_data->short_des_ab2 !!}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Long Description-1 Arabic</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="long_des_ab1" >
                            {!! $edit_donate_data->long_des_ab1 !!}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Long Description-2 Arabic</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="long_des_ab2" >
                            {!! $edit_donate_data->long_des_ab2 !!}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Long Description-3 Arabic</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="long_des_ab3" >
                            {!! $edit_donate_data->long_des_ab3 !!}
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.1.1/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript">
    tinymce.init({
        selector: 'textarea#default'
    });
</script>
@endsection
