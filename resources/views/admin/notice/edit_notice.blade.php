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
                    <form class="form-horizontal" action="{{route('update.notice')}}" enctype="multipart/form-data" method="POST">
                        @csrf

                        <input type="hidden" name="id" value="{{$edit_notice->id}}">
                        <input type="hidden" name="old_file" value="{{$edit_notice->id}}">

                        <div class="form-group">
                            <label class="mb-2">Upload PDF</label>
                            <input type="file" name="pdf_file" class="form-control" value="{{ $edit_notice->pdf_file }}">
                            
                        </div>

                        <div class="form-group">
                            <label class="mb-2">Short Description</label>
                            <textarea id="tinymce" class="editor form-control" row="3" name="short_des">
                                {!! $edit_notice->short_des !!}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Long Description</label>
                            <textarea id="tinymce" class="editor form-control" row="3" name="long_des">
                                {!! $edit_notice->long_des !!}
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
