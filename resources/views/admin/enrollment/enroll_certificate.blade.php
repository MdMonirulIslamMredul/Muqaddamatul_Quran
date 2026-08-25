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
                    <form class="form-horizontal" action="{{route('store.enrollment.certificate')}}" enctype="multipart/form-data" method="POST">
                        @csrf

                        <div class="form-group">
                            <label>Upload Enrollment Certificate</label>
                            <input type="file" class="form-control" rows="5" name="enroll_certificate" id="enroll_certificate">
                            <input type="hidden" class="form-control" rows="5" name="personal_mobile" value="{{ $enroll_data->personal_mobile }}" id="personal_mobile">
                            <input type="hidden" class="form-control" rows="5" name="user_id" value="{{ $enroll_data->user_id }}" id="user_id">
                            <input type="hidden" class="form-control" rows="5" name="service_id" value="{{ $enroll_data->service_id }}" id="service_id">
                        </div>
                        

                        <div class="table-responsive">
                            <button type="submit" class="btn btn-info">Submit</button>
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
