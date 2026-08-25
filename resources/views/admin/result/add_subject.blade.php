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
                    <form class="form-horizontal" action="{{route('store.subject')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Subject Name Engilsh</label>
                            <input type="text" class="form-control" rows="5" name="subject_name_english" id="subject_name_english" placeholder="Subject" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label>Subject Name Bangla</label>
                            <input type="text" class="form-control" rows="5" name="subject_name_bangla" id="subject_name_bangla" placeholder="বিষয়" autocomplete="off" required>
                        </div> 
                        <input type="hidden" class="form-control" rows="5" name="result_id" value="{{ $results->id }}" id="result_id" >                     
                       
                        <div class="table-responsive">
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="table-responsive m-t-40">
                    <table id="config-table" class="table display table-striped border no-wrap">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Subject</th>                           
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($subjects as $key=>$subject)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $subject->subject_name_english ?? null }}</td>
                               
                                <td>
                                    <a href="{{ route('edit.subject',['id'=>$subject->id]) }}" class="btn btn-primary btn-sm editProduct">Edit</a>

                                </td>
                            </tr>
                        @endforeach

                        </tbody>

                    </table>
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
