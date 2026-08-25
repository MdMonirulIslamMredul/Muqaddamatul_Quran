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
                    <form class="form-horizontal" action="{{route('update.subject')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$edit_subject->id}}">
                        <div class="form-group">
                            <label>Subject Name Engilsh</label>
                            <input type="text" class="form-control" rows="5" name="subject_name_english" id="subject_name_english" value="{{ $edit_subject->subject_name_english }}">
                        </div>
                        <div class="form-group">
                            <label>Subject Name Bangla</label>
                            <input type="text" class="form-control" rows="5" name="subject_name_bangla" id="subject_name_bangla" placeholder="বিষয়" value="{{ $edit_subject->subject_name_bangla }}">
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
