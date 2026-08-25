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
                <form class="form-horizontal" action="{{route('update.activities')}}" enctype="multipart/form-data" method="POST">
                    @csrf

                    <input type="hidden" value="{{$edit_activity->id}}" name="id">
                    <input type="hidden" value="{{$edit_activity->image}}" name="old_img">

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $edit_activity->title }}">
                    </div>

                    <div class="form-group">
                        <label>Bangla Title</label>
                        <input type="text" name="bangla_title" class="form-control" value="{{ $edit_activity->bangla_title }}">
                    </div>
                    <div class="form-group">
                        <label>Arabic Title</label>
                        <input type="text" name="arabic_title" class="form-control"  value="{{ $edit_activity->arabic_title }}">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" placeholder="Image">
                    </div>
                    <div>
                       <img src="{{ asset($edit_activity->image) }}" alt="" style="height: 100px">
                    </div>

                    <div class="form-group">
                        <label>Description English</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="short_des_eng">
                            {!! $edit_activity->short_des_eng !!}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Description Bangla</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="short_des_bangla">
                            {!! $edit_activity->short_des_bangla !!}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Description Arabic</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="short_des_arabic" >
                            {!! $edit_activity->short_des_arabic !!}
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
